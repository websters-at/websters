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
  --single-transaction --quick --routines --triggers \
  -u"$MYSQL_USER" -p"$MYSQL_PASSWORD" "$MYSQL_DATABASE" \
  | gzip > "$OUT"

# Verify the dump is restorable SQL, not an error page.
if ! gzip -dc "$OUT" | head -c 200 | grep -q "MariaDB dump\|MySQL dump"; then
  echo "ERROR: dump header check failed for $OUT" >&2
  rm -f "$OUT"
  exit 1
fi

find "$BACKUP_DIR" -name 'webstersdb-*.sql.gz' -mtime +"$RETENTION_DAYS" -delete
echo "OK: $OUT ($(du -h "$OUT" | cut -f1))"
