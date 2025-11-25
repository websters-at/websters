#!/bin/sh
set -e

echo "Database is ready! Running migrations..."

# Run migrations
php artisan migrate --force

php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "Starting FrankenPHP server..."

exec php artisan octane:frankenphp --host=0.0.0.0 --port=69 --workers=4 --watch
