#!/bin/sh
set -e

# Initialize storage directory if empty
# -----------------------------------------------------------
# If the storage directory is empty, copy the initial contents
# and set the correct permissions.
# -----------------------------------------------------------
if [ ! "$(ls -A /var/www/storage)" ]; then
  echo "Initializing storage directory..."
  cp -R /var/www/storage-init/. /var/www/storage
  chown -R www-data:www-data /var/www/storage
fi

# Remove storage-init directory
rm -rf /var/www/storage-init

# Run Laravel migrations
# -----------------------------------------------------------
# Ensure the database schema is up to date.
# We bump memory_limit for CLI here to avoid OOM on heavy apps.
# -----------------------------------------------------------
php -d memory_limit=256M artisan migrate --force

# Clear and cache configurations
# -----------------------------------------------------------
# Improves performance by caching config and routes.
# -----------------------------------------------------------
php -d memory_limit=256M artisan config:cache
php -d memory_limit=256M artisan route:cache

# Run the default command
exec "$@"
