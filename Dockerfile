# === Composer Dependencies Stage === #
FROM dunglas/frankenphp:1 AS base

RUN install-php-extensions \
	pdo_mysql \
	redis \
	zip \
	gd \
	intl \
	pcntl \
	opcache

# === Composer Dependencies Stage === #
FROM base AS composer

COPY --from=composer:2.9.2 /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY composer.json composer.lock ./

RUN composer install \
    #--no-dev \
    --optimize-autoloader \
    --no-interaction \
    --no-progress \
    --no-scripts


# === Frontend Assets Stage === #
FROM node:22-alpine AS assets

WORKDIR /app

COPY package*.json ./
RUN npm ci

COPY vite.config.js ./
COPY resources/ ./resources/
RUN npm run build

# === Production Stage === #
FROM base AS production

RUN apt-get update && apt-get install -y wait-for-it && \
    rm -rf /var/lib/apt/lists/*

# Switch to PHP production configuration
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini" && \
    echo 'memory_limit = 256M' >> "$PHP_INI_DIR/php.ini"

WORKDIR /app

COPY --from=composer /app/vendor/ /app/vendor/
COPY . /app
# Ensure only the fresh Vite build remains (host's stale public/build is ignored via .dockerignore,
# but clean anyway to remove orphaned hashed files from previous layers)
RUN rm -rf /app/public/build && mkdir -p /app/public/build
COPY --from=assets /app/public/build/ /app/public/build/

# Create storage directories, set permissions, and run cache commands in single layer
RUN mkdir -p /app/storage/framework/cache/data \
    /app/storage/framework/views \
    /app/storage/framework/sessions \
    /app/storage/framework/testing \
    /app/storage/logs && \
    chown -R www-data:www-data /app/storage /app/bootstrap/cache && \
    chmod -R 775 /app/storage /app/bootstrap/cache

# Cache policy: hashed build assets are immutable (1y); other static assets
# (non-hashed logos/images/favicons) get 1 day; HTML is never cached, so
# stale pages referencing deleted asset hashes can't linger in browsers.
RUN printf ':80 {\n    root * /app/public\n    encode zstd gzip\n    php_server\n\n    @build path /build/*\n    @static path /assets/* /favicon.png /apple-touch.png\n    header Cache-Control "no-store"\n    header @build Cache-Control "public, max-age=31536000, immutable"\n    header @static Cache-Control "public, max-age=86400"\n}\n' > /etc/caddy/Caddyfile

COPY entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

ENTRYPOINT ["entrypoint.sh"]
