#!/usr/bin/env bash
# Versioned MySQL backup for websters.at. Safe to run any time (read-only).
# Proposed cron (host, as ubuntu): 0 3 * * * /home/ubuntu/websters/websters-at/scripts/mysql-backup.sh >> /home/ubuntu/websters/mysql-backup.log 2>&1
# Restore (verified procedure): NEW empty DB -> mysql < latest dump -> php artisan migrate --force
set -euo pipefail
cd "$(dirname "$0")/.."

BACKUP_DIR="${MYSQL_BACKUP_DIR:-/home/ubuntu/websters/backups}"
RETENTION_DAYS="${MYSQL_BACKUP_RETENTION_DAYS:-14}"
STAMP="$(date +%Y%m%d-%H%M%S)"

MYSQL_CONTAINER="${MYSQL_CONTAINER:-mysql}"
MYSQL_DATABASE="${MYSQL_DATABASE:?set MYSQL_DATABASE}"
MYSQL_USER="${MYSQL_USER:?set MYSQL_USER}"
MYSQL_PASSWORD="${MYSQL_PASSWORD:?set MYSQL_PASSWORD}"

mkdir -p "$BACKUP_DIR"
OUT="$BACKUP_DIR/webstersdb-$STAMP.sql.gz"

docker exec "$MYSQL_CONTAINER" mysqldump \
  --single-transaction --quick --skip-lock-tables --skip-masking-policies \
  -u"$MYSQL_USER" -p"$MYSQL_PASSWORD" "$MYSQL_DATABASE" \
  | gzip > "$OUT"
# NOTE: no --routines/--triggers: webstersdb has none, and MySQL 9's masking-policy
# dump requires privileges we deliberately don't grant the backup user.

# Verify the dump is restorable SQL, not an error page (via temp file to
# avoid SIGPIPE tripping pipefail).
HDR="$(mktemp)"
gzip -dc "$OUT" | head -c 300 > "$HDR" || true
if ! grep -q "MariaDB dump\|MySQL dump" "$HDR"; then
  echo "ERROR: dump header check failed for $OUT" >&2
  rm -f "$HDR" "$OUT"
  exit 1
fi
rm -f "$HDR"

find "$BACKUP_DIR" -name 'webstersdb-*.sql.gz' -mtime +"$RETENTION_DAYS" -delete
echo "OK: $OUT ($(du -h "$OUT" | cut -f1))"
