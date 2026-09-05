# Websters.at — Production Readiness Audit

Date: 2026-09-05. Checkout: `/home/ubuntu/websters/websters-at` (branch main).
Staging: NONE — no staging environment exists. All verification was read-only
against the local checkout and already-running local containers: GET requests,
`php -l`, `npm run build`, `docker compose config`, `bash -n`, XML parsing.
No writes to production data were made (no form submits, no migrations, no deploys).
Test suite could NOT be executed (see Phase 7). Fixes were applied in small batches
and re-verified statically; runtime re-verification requires a deploy (not done —
deploying to prod needs your go-ahead).

## Phase 0 — Inventory (verified by reading the repo)

Stack: PHP ^8.2 / Laravel v12.39 / Livewire ^3.6 + Volt ^1.10 / Filament ^4 /
Tailwind v4.1 + daisyUI 5 / Alpine 3.15 / Vite 7 / Octane+FrankenPHP (4 workers) /
MySQL `latest` (unpinned) / Redis 7-alpine / external Traefik + letsencrypt.
Tests: phpunit 11 (skeleton only). Lint: pint, no config. No CI. README is stock Laravel.

Routes (all public GET, no auth; `routes/web.php:5-43`): `/`, `/projekte`,
`/kontakt`, `/ueber-uns`, `/leistungen`, `/leistungen/{webdesign,consulting,software,design,cloud}`,
`/impressum`, `/datenschutz`, `/agbs`, fallback 404. Implicit: `GET /up`
(bootstrap/app.php:13), `POST /livewire/update`, `/cookie-consent/*`,
`/admin/*` (Filament, Leads only).

Writes (only 3): home contact → `Lead::create` (`home/components/contact.blade.php:15-28`);
webdesign package → `WebsitePackage::create` (`webdesign/components/contact.blade.php:39-56`);
newsletter → `NewsletterEntry::create` (`home/components/newsletter.blade.php:12-21`).
No mail is ever sent (`config/mail.php:17` default `log`, no Mailables).
Admin exposes only Leads; NewsletterEntry/WebsitePackage have no admin UI.
Several routed pages are placeholders/empty: consulting, software (placeholder),
cloud, design (empty divs), about/projects partially placeholder.

Deploy: multi-stage Dockerfile, Caddy inline (HTML no-store, /build/* immutable 1y,
/assets/* 1d), twins websters/websters2 behind Traefik, `deploy.sh` blue-green.
Entrypoint: wait mysql → `migrate --force` → optimize:clear + config/route/view:cache → Octane x4.
Known env drift: prod template said DB cache/session/queue, live `.env` says redis
(fixed in template by this audit — see Fix log).

Third parties: GTM `G-WREHCH7Q7Y` (hardcoded, `app.blade.php:54`), Cal.com embed,
Google Maps iframe, Instagram/Facebook/GitHub links, SEOTools + sitemap generator,
whitecube cookie-consent (`websters_cookie_consent`, exempted from encryption).

---

## Findings

### [HIGH] Public write paths had no rate limiting / anti-spam
**Where:** `bootstrap/app.php:16-19`, `routes/web.php:5-43`, all three `save()` actions
**Evidence:** `grep -rn throttle|RateLimiter routes/ app/ bootstrap/` → no hits; rapid
`curl` GETs showed no `RateLimit-*` headers. Contact/newsletter/package + `livewire/update`
were anonymously callable without limit.
**Impact:** Bot spam / DB-fill of leads/newsletter/packages at will.
**Fix:** DONE — framework-core `RateLimiter` (5/min/IP, 60s decay) at the top of all
three `save()` actions with a friendly "Langsam :)" toast; no new dependency.
Verified: `php -l` clean on all three files. (Bot-grade protection like Turnstile
still proposed below.)

### [HIGH] `package` field: uninitialized typed int + unsafe `intval($id-1)` mapping
**Where:** `resources/views/livewire/services/webdesign/components/contact.blade.php:16,41-49` (before fix)
**Evidence:** Read `public int $package;` (no default → `Error`, not `Exception`, on
untouched submit) + `intval($this->package)` → `$this->packages[$id-1]` with no bounds check.
**Impact:** Unselected/spoofed package → undefined array key → 500, or wrong package persisted.
**Fix:** DONE — `public ?int $package = null`, `'package' => 'required|integer|in:1,2,3'`,
explicit `collect()->firstWhere('id', ...)` + `abort_if`, `updatePackageForm()` coerces and
ignores out-of-range ids. `php -l` clean.

### [HIGH] Newsletter duplicates handled only by DB exception, no normalization
**Where:** `resources/views/livewire/home/components/newsletter.blade.php:14-21,32-43` (before fix)
**Evidence:** Validation was `'email' => 'required|email'`; duplicates relied on the `unique`
index surfacing as generic `Exception` (also misspelled "registiert"); `grep` for
lowercase/trim/normalize → zero hits.
**Impact:** `Foo@Bar.com` vs `foo@bar.com` bypassed dedupe; races/conflated errors; 500 risk.
**Fix:** DONE — normalize `strtolower(trim())`, rule `required|email:rfc|max:255|unique:newsletter_entries,email`,
race-safe `catch (QueryException)` checking error 1062 with correct "schon registriert" message,
`report()` + generic toast otherwise. Input kept on failure.

### [HIGH] Contact/lead/package validation missing bounds; input wiped on failure
**Where:** `home/components/contact.blade.php:17-20`, `webdesign/components/contact.blade.php:41-45` (before fix)
**Evidence:** Only `name required|min:2`, `email required|email`; `company/message` unvalidated
yet persisted; `catch` called `$this->reset(...)` even on failure; `string`=255 at DB
(`2025_11_19_144341_create_leads_table.php:16-19`) → >255 chars = 500 + wiped input.
**Impact:** Oversize payloads 500; users lose typed input on any error.
**Fix:** DONE — `name max:100`, `email max:255`, `company max:150`, `message max:5000`,
normalize, `catch (\Throwable)` + `report()`, reset only on success.

### [HIGH] Newsletter form ignored Enter-to-submit / native validation
**Where:** `resources/views/livewire/home/components/newsletter.blade.php:81-114` (before fix)
**Evidence:** `<form>` with inner `<button type="button" @click="$wire.save()">`, no
`x-on:submit.prevent` — vs `type="submit"` in both other forms.
**Impact:** Keyboard/mobile-Go submit dead; `required`/`type=email` bubbles never fire (WCAG).
**Fix:** DONE — form uses `x-on:submit.prevent` with the same loading flow, button is
`type="submit"`. `php -l` clean.

### [HIGH] Sitemap advertised a 404 URL; generator listed non-existent English routes
**Where:** `public/sitemap.xml:91-96`, `app/Console/Commands/GenerateSitemap.php:30-43`
**Evidence:** `grep -o "<loc>[^<]*</loc>" public/sitemap.xml` → `https://websters.at/data-privacy`
(404; real route is `/datenschutz`, `routes/web.php:38-39`) + an example PDF; generator
listed `/projects /contact /about /services/* /imprint /terms` — none of which exist.
**Impact:** Crawl budget wasted on 404s; correct pages unlisted.
**Fix:** DONE — generator rewritten to the 11 real German routes (cloud/design deliberately
excluded, noted in code — they are blank placeholders); `sitemap.xml` hand-synced
(can't run artisan, no vendor locally); PDF asset URL dropped; `Sitemap:` line added to
`robots.txt`. Verified: XML parses, loc set == routes set (scripted diff, match=True).

### [HIGH] Empty `/leistungen/cloud` + `/leistungen/design` are routed, linked, and indexable
**Where:** `services/cloud/index.blade.php:1-12`, `services/design/index.blade.php:1-12`,
linked from `services/index.blade.php:112,122` JSON-LD
**Evidence:** `head -30` both files → bare `SEOMeta::setTitle('DevOps'/'Design')` then empty
`<div>`; live GETs return 200 (~52KB shell, verified via curl).
**Impact:** Visitors + crawlers land on blank pages; thin content hurts trust/SEO.
**Fix:** PROPOSED (business call) — either fill with real hero/process/CTA + full SEO meta,
or remove routes + JSON-LD refs until ready, or interim `noindex`. Excluded from sitemap meanwhile.

### [HIGH] Prod secrets committed to git and baked into the image
**Where:** `env/.env.prod:3,22`, `.dockerignore:22-24`, `Dockerfile:55`, `compose.dev.yaml:26-29`
**Evidence:** `grep APP_KEY|PASSWORD env/.env.prod` → real `APP_KEY` + DB password tracked;
`.dockerignore` notes `.env` intentionally in build context for `config:cache`;
`compose.dev.yaml` commits `admin/password/rootpassword`; APP_KEY reused in `.env.example`.
Values redacted per policy — locations only.
**Impact:** Any clone/image recipient gets decrypt-capable APP_KEY + creds; rotation
invalidates sessions; history retains them.
**Fix:** PROPOSED (needs human decision — irreversible) — `git rm --cached env/.env.prod`,
history purge + rotate APP_KEY/DB/Redis/admin passwords, runtime `--env-file`/secrets only.

### [HIGH] No database backup/restore evidence
**Where:** `routes/console.php:6`, `docker-compose.yaml:129-130`
**Evidence:** `console.php` only defines `inspire`; repo-wide search: no dump script/cron/doc;
data lives in bind-mount `./mysql/data` (gitignored) with no backup job; host crontab has
only unrelated jobs.
**Impact:** Single host dir is SPOF; failed migrate / `mysql:latest` upgrade / disk loss =
unrecoverable leads/newsletters.
**Fix:** PROPOSED — versioned `mysqldump --single-transaction` cron + off-host copy +
restore doc/test + pre-migrate snapshot hook in `deploy.sh`.

### [HIGH] Unattended `migrate --force` on every boot of both twins, no rollback gate
**Where:** `entrypoint.sh:9`, `deploy.sh:17-21,50`
**Evidence:** Entrypoint runs `migrate --force` on both blue/green twins; deploy has no
pre-snapshot or `migrate:rollback` step.
**Impact:** Twins can race migrations; breaking migration auto-applies with no downgrade path.
**Fix:** PROPOSED — migrate once outside twins (CI/manual with backup), entrypoint opt-in.

### [HIGH] `start.sh` silently overwrites live `.env` with weak template creds
**Where:** `start.sh:2-4`
**Evidence:** `cp ./env/.env.prod .env` unconditionally, then `up --build`.
**Impact:** One run downgrades prod to known passwords + wrong topology.
**Fix:** DONE — refuses when `.env` exists unless `--force`; `bash -n` clean.

### [HIGH] Session/cache/queue driver drift (template said DB, live runs redis)
**Where:** `env/.env.prod:25,31-32` vs live `.env`
**Evidence:** Template `database` ×3, live `SESSION_DRIVER/CACHE_STORE/QUEUE_CONNECTION=redis`;
dev compose has no redis at all; no queue worker process anywhere.
**Impact:** Dev never exercises prod Redis/auth/persistence; queue worker missing so any
future queued mail would silently pile up.
**Fix:** DONE (template only, no live values touched) — `env/.env.prod` aligned to redis +
explicit `REDIS_*` (empty password placeholder) + explicit `MAIL_MAILER=log` with comment.
Still proposed: add queue worker (or document DB-queue decision) + redis in dev compose.

### [MEDIUM] CSP absent; framing/embed policy not allowlisted
**Where:** `docker-compose.yaml:63-72`, `Dockerfile:73`
**Evidence:** `grep -rn Content-Security-Policy|frame-ancestors` → no hits anywhere; Traefik
sets nosniff/DENY/XSS/Referrer/Permissions/COOP/CORP/HSTS; Caddy-direct (`:42069`) sends
**zero** security headers (verified: `curl -I` shows only `Content-Type`).
**Impact:** No script/style allowlist to contain XSS; Cal/gtag/Maps load unpinned.
**Fix:** PROPOSED — add CSP (`script-src 'self' https://app.cal.com https://www.googletagmanager.com;
`frame-src https://app.cal.com https://www.google.com; object-src 'none'; base-uri 'self'`)
in both Traefik labels and Caddyfile, plus HSTS in Caddy.

### [MEDIUM] Trust-all-proxies + host port 42069 bypasses TLS/headers
**Where:** `app/Http/Middleware/TrustProxies.php:12,25-27`, `docker-compose.yaml:9-10`
**Evidence:** `$proxies='*'` + `handle()` skips parent validation; `42069:80` published on host.
**Impact:** Direct `:42069` caller controls `X-Forwarded-*` → poisoned reset links/IP checks.
**Fix:** PROPOSED — restrict `$proxies` to Traefik CIDR, drop the override, bind 42069 to
127.0.0.1 or remove it.

### [MEDIUM] Unpinned/mutable base images (`frankenphp:latest`, `node:22-alpine`, `mysql:latest`)
**Where:** `Dockerfile:2,31`, `docker-compose.yaml:121`
**Evidence:** `grep FROM|image:` confirms unpinned tags (redis is pinned `7-alpine`).
**Impact:** Next pull can auto-upgrade majors (mysql 8→9 on old datadir = no start).
**Fix:** PROPOSED — pin digests/minors (`mysql:8.4.x`), add Renovate/Dependabot.

### [MEDIUM] Health/readiness probes hit `/` instead of `/up`; deploy gates on marketing page
**Where:** `docker-compose.yaml:27,107`, `deploy.sh:40,56,59`
**Evidence:** Healthchecks curled `/` (full Livewire page); `/up` exists (`bootstrap/app.php:13`,
verified 200/1865B) but unused.
**Impact:** Asset slowness flaps blue-green swaps; heavy probes; DB failure can hide behind 200.
**Fix:** DONE — both twins' healthchecks → `/up`, all three deploy gates → `/up`;
verified `bash -n` + `docker compose config -q` OK.

### [MEDIUM] Leads table: no constraints/indexes; newsletter unique rule was missing (fixed)
**Where:** `2025_11_19_144341_create_leads_table.php:16-19`, `LeadsTable.php:17`
**Evidence:** leads/website_packages columns all nullable, no index/unique/FK; admin sorts/searches
unindexed `email` (full scan as table grows). Newsletter unique rule added by this audit.
**Impact:** Spam/empty rows accepted at DB layer; admin latency growth.
**Fix:** PROPOSED — migration adding `NOT NULL` + indexes (`email`, `created_at`).

### [MEDIUM] Burger menu not keyboard-operable; no focus-visible styling; map iframe untitled
**Where:** `nav.blade.php:160-192`, `app.css` (no `:focus-visible`), `contact-data.blade.php:87-94`
**Evidence:** Button has static `aria-label`, no `aria-expanded/controls`, no Escape/`x-trap`;
`grep focus-visible` → empty; iframe has no `title`.
**Impact:** Screen-reader/focus users impaired (WCAG 2.1.1/4.1.2).
**Fix:** PROPOSED — `aria-expanded/controls`, `id="mobile-menu"`, Escape-to-close, `x-trap`,
global `:focus-visible` ring, iframe `title`.

### [MEDIUM] Cal.com embed had no loading/error/noscript fallback
**Where:** `contact/components/cal.blade.php:66-112` (before fix)
**Evidence:** Only mount div + immediate `Cal("init"...)`, zero fallback text.
**Impact:** Adblock/offline → blank gap, no way to book.
**Fix:** DONE — reserved `min-h-[540px]`, `<noscript>` booking link, 8s JS timeout inserting
fallback link + phone number when no iframe appears. `php -l` clean.

### [MEDIUM] No CI; skeleton tests; blue-green rollback is stop-only
**Where:** (no `.github/`), `tests/*/ExampleTest.php`, `deploy.sh:50-62`
**Evidence:** `ls .github` → absent; suites exist but only `GET / → 200` + `assertTrue(true)`;
deploy keeps stopped old container but never auto-rolls back (only warns).
**Impact:** Breakage surfaces during prod `deploy.sh --build`; bad deploys need manual rescue.
**Fix:** PROPOSED — minimal GitHub Actions (composer install + pint + phpunit + npm build +
docker build), tag last-good image + auto `start $ACTIVE` on gate failure.

### [MEDIUM] File-only logs, ephemeral; no monitoring/alerting
**Where:** `config/logging.php:55-59`, `.env:13-14`, `docker-compose.yaml:11,93`
**Evidence:** `LOG_CHANNEL=stack` → single file, `LOG_LEVEL=warning`; containers mount no
volumes and `storage/logs/` is dockerignored → logs die on replace; no Sentry/uptime check.
**Impact:** Post-deploy errors invisible; no page on 5xx.
**Fix:** PROPOSED — log to stderr + shipper, external uptime + `/up` monitor, error tracker.

### [LOW] (verified clean / minor)
- `npm audit --omit=dev` → **0 vulnerabilities** (ran 2026-09-05).
- `composer audit` → could not run (no composer binary locally, vendor/ absent, tests/ excluded
  from image) — gate it in CI instead.
- No raw SQL (`DB::raw|selectRaw|whereRaw` → zero hits); no file uploads
  (`hasFile|storeAs|putFile` → zero hits); `APP_DEBUG=false` in both `.env` files;
  CSRF present (consent forms `@csrf`, Livewire `data-csrf`, Filament VerifyCsrfToken).
- Cookie flags: session `Secure`+`lax`+`http_only` set; consent cookie exempted by design.
- Unused/blog/placeholder files + dead `href="#"` links documented for cleanup (not deleted
  without content decision).
- HSTS/security headers exist on Traefik routers; missing on direct Caddy `:42069` (see CSP item).

### Not verified (stated explicitly)
- Live response headers/CSP/HSTS through Traefik (only direct-container headers curled).
- Runtime duplicate-race 500s, validation-failure UX, package OOB 500 (no POSTs by policy — no staging).
- Mary `x-input` inline error rendering; Filament login brute-force behavior; PII in log files.
- Effective `REDIS_PASSWORD` when duplicated empty-vs-set in live `.env` (live config — untouched).
- Secret values (redacted throughout); Traefik interpolation; running mysql version; queue depth.

---

## Phase 6 — E2E journeys (read-only: GETs driven, submits deliberately NOT executed — no staging, would write prod data)

1. **Discover → services → webdesign → package select:** `/`→`/leistungen`→`/leistungen/webdesign`
   all 200; pricing `wire:click selectPackage(1|2|3)` present; event now coerced+validated
   server-side (`in:1,2,3`). Submit step not executed (would create WebsitePackage row).
2. **Contact a human:** `/kontakt` 200; Cal embed present with new fallback; contact-data map
   present (iframe untitled — proposed fix); home contact form renders with required labels.
   Submit not executed (would create Lead row).
3. **Newsletter signup:** form renders on `/`; Enter-to-submit fixed; duplicate path now
   rule-first + race-safe. Submit not executed (would create NewsletterEntry row).
4. **Legal/admin:** `/impressum /datenschutz /agbs` 200; `/admin` 302 → `/admin/login` 200.
5. **Dead ends found (not fixed, content calls):** blank `/leistungen/cloud`, `/leistungen/design`;
   `quoteflow-cta` never included; `href="#"` in team/blog/cta; `cta→#contact` anchor has no
   `id="contact"` target (home contact section does: `contact.blade.php:66`).

## Phase 7 — Tests
- Suite NOT runnable here: `vendor/` absent locally (no composer binary), and `tests/` is
  excluded from the prod image (`.dockerignore`), so neither environment can execute phpunit.
  Evidence: `ls vendor` → missing; `grep tests .dockerignore` → excluded; `phpunit.xml`
  sets `DB_DATABASE=testing` (runner still needs a DB + vendor).
- Only skeletons exist (`GET / → 200`, `assertTrue(true)`). No coverage of the three write
  paths, validation, duplicates, or package mapping.
- Verified instead: `php -l` clean on all 5 edited PHP/Blade files; `npm run build` succeeds
  (12.5s, tree still clean — output gitignored); `docker compose config -q` OK; `bash -n` OK;
  scripted sitemap↔routes diff **match=True**; route GET sweep 13/13 200.
- Proposed: CI running `composer install + pint + phpunit + npm build + docker build` on every
  change, plus new tests for duplicate-newsletter, package OOB, and overlong-input cases.

## Fix log (this audit — all re-verified, none deployed)
1. Rate limits (5/min/IP) + bounds + normalization + keep-input-on-failure in all 3 forms.
2. Newsletter: `unique` rule, race-safe duplicate message, typo fix, Enter-to-submit.
3. Package: `?int=null`, `in:1,2,3`, safe lookup, guarded event handler.
4. Sitemap generator + `sitemap.xml` synced to real routes; `robots.txt` gains `Sitemap:`.
5. Cal.com noscript + timeout fallback.
6. `env/.env.prod` aligned to redis + explicit mail default (template only).
7. `start.sh` refuses to clobber existing `.env` without `--force`.
8. Healthchecks + deploy gates → `/up`.

## Scorecard
- Phase 1 Frontend: mostly clean after fixes; open: blank cloud/design pages, burger keyboard, focus ring, dead links cleanup → **Conditional**
- Phase 2 Backend/API: hardened (validation/rate-limit/error paths); open: admin policies/audit, structured logging → **Conditional**
- Phase 3 Security: baseline ok (CSRF, no SQLi/uploads, npm clean, APP_DEBUG=false); open: secrets-in-git rotation, CSP, TrustProxies/42069, image pinning, GA pre-consent → **Conditional**
- Phase 4 Data/DB: schema understood, migrations reversible, no N+1; open: **no backups**, constraints/indexes → **No-Go item present**
- Phase 5 Infra/Deploy: blue-green + gates improved; open: **no CI**, rollback manual, queue worker missing, logs ephemeral → **No-Go item present**
- Phase 6 E2E: GET journeys clean; submits unverified without staging.
- Phase 7 Testing: skeleton only, not runnable here.

## Verdict: **Conditional Go**
Ship the fixed code (it strictly reduces risk), but genuine production readiness is blocked by:
1. **Rotate + purge committed secrets** (`env/.env.prod`, APP_KEY reuse, dev creds, seeder password)
2. **Backups that have been restore-tested** (mysqldump cron + off-host + runbook)
3. **Migration + rollback policy** (migrate-once outside twins, downgrade runbook)
4. **Placeholder pages decision** (fill / noindex / unroute cloud + design + consulting + software)
Deploying the audit fixes themselves to prod is a human call — not done here.
