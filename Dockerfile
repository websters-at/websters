# === Composer Dependencies Stage === #
FROM dunglas/frankenphp AS base

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
    --no-dev \
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
COPY --from=assets /app/public/build/ /app/public/build/

# Create storage directories, set permissions, and run cache commands in single layer
RUN mkdir -p /app/storage/framework/cache/data \
    /app/storage/framework/views \
    /app/storage/framework/sessions \
    /app/storage/framework/testing \
    /app/storage/logs && \
    chown -R www-data:www-data /app/storage /app/bootstrap/cache && \
    chmod -R 775 /app/storage /app/bootstrap/cache


COPY entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

ENV SERVER_NAME=:80
ENV APP_ENV=production
ENV APP_DEBUG=false
ENV OCTANE_SERVER=frankenphp

ENTRYPOINT ["entrypoint.sh"]
