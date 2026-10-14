#!/usr/bin/env bash
# Blue-green deploy: build/start the idle twin, wait until it is healthy,
# then stop the old container. Traefik load-balances across both healthy
# containers, so there is no downtime.
set -euo pipefail
cd "$(dirname "$0")"

if [ "$(docker inspect -f '{{.State.Running}}' websters2 2>/dev/null || echo false)" = "true" ]; then
  ACTIVE=websters2
  NEW=websters
else
  ACTIVE=websters
  NEW=websters2
fi

echo "==> deploying new code into '$NEW' (active: '$ACTIVE')"
if [ "$NEW" = "websters2" ]; then
  sudo docker compose --profile green up -d --build "$NEW"
else
  sudo docker compose up -d --build "$NEW"
fi

echo "==> waiting for '$NEW' healthcheck..."
st="starting"
for i in $(seq 1 90); do
  st=$(docker inspect -f '{{.State.Health.Status}}' "$NEW" 2>/dev/null || echo starting)
  [ "$st" = "healthy" ] && break
  sleep 1
done

if [ "$st" != "healthy" ]; then
  echo "ERROR: '$NEW' never became healthy (status: $st). Keeping '$ACTIVE' running." >&2
  exit 1
fi

echo "==> smoke-testing '$NEW' directly (bypasses traefik: /up alone can't catch broken Blade)..."
SMOKE_OK=true
for path in / /projekte /kontakt /leistungen /leistungen/webdesign /leistungen/software /leistungen/consulting /leistungen/design /leistungen/cloud /webdesign-linz /webdesign-wels /webdesign-steyr /tools /tools/domain-check /tools/preis-rechner /tools/seo-check /tools/cookie-check /ratgeber/website-kosten-oesterreich /ratgeber/webdesign-angebot-vergleich /impressum /datenschutz /agbs /sitemap.xml /llms.txt /up; do
  code=$(docker exec "$NEW" curl -s -o /dev/null -w '%{http_code}' --max-time 10 "http://localhost:80$path" 2>/dev/null || echo 000)
  if [ "$code" != "200" ]; then
    echo "SMOKE-FAIL: $path -> $code" >&2
    SMOKE_OK=false
  fi
done
if [ "$SMOKE_OK" != "true" ]; then
  echo "ERROR: smoke test failed on '$NEW'. Old '$ACTIVE' untouched and still live; stopping '$NEW'." >&2
  sudo docker compose stop "$NEW" || true
  exit 1
fi
echo "==> smoke test passed (15 routes, all 200 directly on '$NEW')."

echo "==> '$NEW' healthy; stopping old container '$ACTIVE' BEFORE the traefik gate."
echo "    (Both twins share the same router names: while old+new run with"
echo "    DIFFERENT labels, Traefik drops the routers entirely -> full 404"
echo "    outage. Stopping first keeps exactly one router config alive, so the"
echo "    only window is traefik's ~2s reconfig. Same-label deploys stay at"
echo "    true zero downtime.)"
sudo docker compose stop "$ACTIVE"
sleep 5 # let traefik converge on the single remaining router config

rollback() {
  echo "ROLLBACK: gate failed, restarting '$ACTIVE'..." >&2
  sudo docker compose start "$ACTIVE"
  sleep 5
  sudo docker compose stop "$NEW" || true
}

# Gate on the lightweight /up readiness probe, not the marketing page,
# so asset slowness can't fail an otherwise good deploy.
code=""
for i in $(seq 1 15); do
  code=$(curl -s -o /dev/null -w '%{http_code}' --max-time 10 https://websters.at/up || true)
  [ "$code" = "200" ] && break
  sleep 2
done
if [ "$code" != "200" ]; then
  echo "ERROR: site not serving 200 (got '$code')." >&2
  rollback
  exit 1
fi

echo "==> site serving 200 via traefik on '$NEW' (old '$ACTIVE' already stopped)"
code=""
for i in $(seq 1 10); do
  sleep 2
  code=$(curl -s -o /dev/null -w '%{http_code}' --max-time 10 https://websters.at/up || true)
  [ "$code" = "200" ] && break
done
curl -s -o /dev/null -w "site status: %{http_code}\n" https://websters.at/up || true
if [ "$code" != "200" ]; then
  echo "ERROR: site unstable after swap (got '$code')." >&2
  rollback
  exit 1
fi
echo "==> deploy done, '$NEW' is live."
