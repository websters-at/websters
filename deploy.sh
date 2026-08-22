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

echo "==> '$NEW' healthy; letting traefik probe it (2 x 3s interval)..."
sleep 8
code=""
for i in $(seq 1 15); do
  code=$(curl -s -o /dev/null -w '%{http_code}' --max-time 10 https://websters.at/ || true)
  [ "$code" = "200" ] && break
  sleep 2
done
if [ "$code" != "200" ]; then
  echo "ERROR: site not serving 200 (got '$code'). Keeping '$ACTIVE' running." >&2
  exit 1
fi

echo "==> site serving 200 via traefik, stopping old container '$ACTIVE'"
sudo docker compose stop "$ACTIVE"

echo "==> waiting for traefik to drop '$ACTIVE' (rechecking until stable 200)..."
code=""
for i in $(seq 1 10); do
  sleep 2
  code=$(curl -s -o /dev/null -w '%{http_code}' --max-time 10 https://websters.at/ || true)
  [ "$code" = "200" ] && break
done
curl -s -o /dev/null -w "site status: %{http_code}\n" https://websters.at/ || true
if [ "$code" != "200" ]; then
  echo "WARNING: site returned '$code' after swap; re-running deploy may be needed." >&2
  exit 1
fi
