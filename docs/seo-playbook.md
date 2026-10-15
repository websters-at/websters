# Websters Brain-DB — gemeinsame Wissensbasis für Mensch + Laptop-KI

> **Anweisung an die KI:** Dies ist eure geteilte Datenbank. Lies sie zu Beginn
> jeder Session. Arbeite Checkpoints strikt der Reihe nach ab, hake Erledigtes
> im Kopf ab und melde dem Menschen nur, was IHN braucht (Logins, Klicks,
> Entscheidungen). Alles mit `[MENSCH]` braucht den Menschen, alles mit `[KI]`
> kannst du vorbereiten. Nichts überspringen, nichts erfinden.

## 1. Projekt-Steckbrief

- **Firma:** Websters (e.U., Solo, Sitz Engerwitzdorf, Libellenweg 13, 4209)
- **Site:** `https://websters.at` (Laravel 12 + Livewire + FrankenPHP, Docker blue-green)
- **Repo:** `/home/ubuntu/websters/websters-at` (Branch `main`, Conventional Commits)
- **Deploy:** `./deploy.sh` (baut idle Twin, 32-Routen-Smoke-Gate direkt am Container,
  stoppt erst dann den alten → de-facto Zero-Downtime; bei Gate-Fehler Rollback)
- **Logs:** Traefik Access-Log `/home/ubuntu/websters/traefik/logs/access.log` (JSON, 7-Tage-Rotation),
  Laravel-Log im Container `storage/logs/laravel.log`
- **Admin:** `https://websters.at/admin` (Filament: Anfragen, Newsletter, Dashboard-Stats, CSV-Export)
- **Analytics:** Umami auf `stats.websters.at`, Tracking via Same-Origin `/stats/*`
- **Mail:** `office@websters.at` (Purelymail). Formular-Mails aktiv nach SMTP-Eintrag (TODO unten).
- **Telefon:** +43 677 63177763

## 2. Technische Konventionen (für Code-Arbeit)

- Labels ändern = Deploy-Reihenfolge beachten (deploy.sh regelt: neu healthy → alt stoppen → Gate).
- Blade + JSON-LD: **niemals rohe `"@…"`-Keys** (Laravel 12 kompiliert `@context` als Direktive!)
  → Schemas immer als `$pageSchema`-Array + `@json` rendern (siehe Layout + FAQ-Pattern).
- `SEO::generate()` liest NICHT die `JsonLd`-Facade (nur `JsonLdMulti`) → Facade nicht nutzen.
- Neue Seite = Route + Sitemap-Eintrag + `deploy.sh`-Gate-Liste + Footer/llms bei Bedarf.
- Keine erfundenen Personen/Fakten (Solo-e.U.!). Preise nur wie auf /leistungen.
- Vor jedem Deploy: `php -l` auf geänderte PHP-Dateien.

## 3. Was live ist (nicht erneut prüfen)

- Security-Header + CSP, HSTS, OCSP-Hinweis dokumentiert, EC256 ab Renewal Dez 2026
- SEO: 1 H1/Seite, dynamische Sitemap (30+ URLs), llms.txt, deterministische Schemas
  (Organization, Service, Article, FAQPage, ItemList, LocalBusiness, WebApplication)
- 8 Stadtseiten (Linz, Wels, Steyr, Wien, Graz, Salzburg, Innsbruck, Klagenfurt)
- 8 Tools (/tools: Domain-Check, Preis-Rechner, SEO-Check, Cookie-Check,
  Passwort-Generator, UTM-Builder, Kontrast-Checker) + 2 Ratgeber
- Consent-Gating (Cal.com, Google Maps), Cookie-Banner, Datenschutz mit Prozessoren
- Footer-Backlinks auf eigenen Properties (lebe-gesund.at, miracle, PriceMatters,
  SpaceRunner, BeBetter); NightCrown/deal-radar ohne Frontend → bewusst ohne
- Admin mit Leads/Newsletter/Stats/CSV; Kontakt- + Newsletter-Formular mit
  Rate-Limit, DB-Speicherung, Mail-Versand (wartet auf SMTP)

## 4. Offene Tasks für den MENSCHEN (mit KI zusammen)

### 4.1 Search Console (45 Min einmalig) [MENSCH + KI]
1. `https://search.google.com/search-console` → **Property hinzufügen → Domain** → `websters.at`.
2. TXT-Record bei Cloudflare setzen (`dash.cloudflare.com → websters.at → DNS → Add record`,
   Typ TXT, Name `@`, Inhalt aus Schritt 1) → in Console **Bestätigen**. Checkpoint: grüner Haken.
3. **Sitemaps → `sitemap.xml` senden.** Checkpoint: „Erfolgreich, 30+ URLs".
4. **URL-Prüfung** je URL: testen → **Indexierung beantragen**:
   `/`, `/leistungen/webdesign`, `/leistungen/software`, `/leistungen/consulting`,
   alle `/webdesign-*`, alle `/tools/*`, beide `/ratgeber/*`, `/kontakt`, `/projekte`.
5. **Bing Webmaster** (`bing.com/webmasters`): Import aus Search Console (1 Klick).
   **IndexNow läuft bereits:** Key-File `public/3c44….txt` deployed, Push per
   `docker exec <websters-container> php artisan seo:indexnow` (40 URLs, HTTP 202
   bestätigt 15.10.). Nach neuen Seiten erneut ausführen.
6. Wöchentlich 15 Min: Leistung (neue Queries = Content-Ideen), Abdeckung (Fehler = 0),
   Core Web Vitals grün, Links (Footer-Backlinks angekommen?).

### 4.2 Unternehmensprofil (60 Min + Verifizierung) [MENSCH + KI]
1. `google.com/business` → Firma exakt **`Websters`** (KEINE Keywords im Namen!).
2. Primärkategorie **`Webdesigner`** + `Softwareunternehmen` + `Internetmarketingdienst`.
3. Adresse exakt wie Impressum. **Anzahl Mitarbeiter: „Nur ich"** (Solo-e.U.).
4. Verifizierung (Video/Postkarte) abschließen. Checkpoint: Status „Verifiziert".
5. Dienste aus `docs/`-Liste eintragen (alle echten; **keine Mobile Apps**).
6. Öffnungszeiten, 10+ Fotos (Dateinamen mit Keywords), Produkte
   (Starter 990€, Komplett 1.990€, Software ab 3.490€) mit Links.
7. 5 ehrliche Bewertungen organisieren (niemals kaufen), alle beantworten.
8. Laufend: 1 Beitrag/Woche, Q&A pflegen, monatlich Fotos.

### 4.3 SMTP-Zugang [MENSCH liefert, Code-KI trägt ein]
- In Purelymail-Dashboard SMTP-Zugang anlegen → Host, Port, User, Passwort hier
  ablegen (sicher, nicht in Git): `MAIL_HOST`, `MAIL_PORT`, `MAIL_USERNAME`,
  `MAIL_PASSWORD`. Code-KI trägt in Live-`.env` ein, restartet, sendet Testmail.

### 4.4 Fortinet Re-Rating [MENSCH]
- `fortiguard.com → Web Filter Rating Submit`: URL `websters.at` einreichen,
  Re-Rating auf Business-Kategorie beantragen (Agentur-Website, kein Phishing/Malware).
  Dauer typ. 1–3 Tage. Danach Re-Scan prüfen.

### 4.5 Backlinks & Citations (laufend) [MENSCH + KI]
- Kunden/Angebote mit „von Websters"-Link anfragen; Profile: Herold, FirmenABC,
  Trustpilot/Clutch; GitHub-Org pflegen; Presse/Projekte verlinken lassen.

### 4.6 Rote Linien (nie!)
- Keine Fake-Bewertungen, keine gekauften Links/Farmen, kein Keyword-Stuffing
  im Profilnamen, keine erfundenen Personen/Fakten auf der Website.

## 6. Video-Trick: „Das weiß niemand über Google" (Edward Sturm)

- **Video:** `https://youtube.com/shorts/XhVnZjyQQZA` („Nobody knows this about Google")
- **Verifizierter Hook aus der Beschreibung:** „Öffnen Sie die Google Search Console: …"
  (Volltext war bot-geschützt nicht lesbar — exakten Trick bitte in 1 Satz bestätigen!)
- **Wahrscheinlichster Inhalt** (Sturm-Themen 2026 + Kommentar-Hinweis auf „Generative AI"-Tab):
  In der Search Console unter **Leistung** nach Queries filtern, bei denen man auf
  **Position 4–20 bei vielen Impressionen** steht, und genau diese Seiten pushen
  (Titel schärfen, FAQ dazu, interne Links) — plus Sichtbarkeit in **AI Overviews**
  beobachten. Unsere Seiten sind dafür bereits vorbereitet (FAQ-Schemas, llms.txt,
  zitierfähige Definitionen).
- **Workflow (wöchentlich, 10 Min, [MENSCH + KI]):**
  1. Search Console → Leistung → Zeitraum 28 Tage → nach Impressionen sortieren.
  2. Queries mit Position 4–20 notieren (das sind die „fast oben"-Chancen).
  3. Pro Query **eine** Aktion: Titel/Description schärfen ODER FAQ-Absatz ergänzen
     ODER internen Link von einer starken Seite setzen (Änderungen mir/Code-KI geben,
     ich baue sie ein + deploye).
  4. Unter „Suchdarstellung" prüfen, ob **AI Overviews / Generative AI** auftauchen —
     sobald ja: exakt diese Queries mit Definitions-Absätzen (40–60 Wörter) füttern.

## 7. Zeitplan realistisch

- Woche 1–2: Indexierung, erste Impressionen. Monat 1–3: Long-Tail (Städte, Preise,
  FAQs, Tools) + erste KI-Zitate. Monat 3–6: kompetitive Keywords angreifbar
  (mit Profil + Bewertungen + Backlinks).
