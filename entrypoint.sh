#!/bin/sh
set -e

echo "Database is ready! Running migrations..."

wait-for-it mysql:3306 -t 30

# Run migrations
php artisan migrate:fresh --seed --force

php artisan config:cache
php artisan route:cache
php artisan view:cache

php artisan websters:generate-sitemap

echo "Starting FrankenPHP server..."

exec php artisan octane:frankenphp --host=0.0.0.0 --port=80 --workers=4 --watch
