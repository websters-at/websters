# ---------- STAGE 1: Build frontend assets with Vite ----------
FROM node:alpine3.21 AS vite_builder

WORKDIR /app

# Only copy what we need for Vite build first
COPY package.json package-lock.json* pnpm-lock.yaml* yarn.lock* vite.config.* ./
RUN \
  if [ -f package-lock.json ]; then npm ci; \
  elif [ -f pnpm-lock.yaml ]; then npm install -g pnpm && pnpm install --frozen-lockfile; \
  elif [ -f yarn.lock ]; then yarn install --frozen-lockfile; \
  else npm install; \
  fi

# Copy rest of app so Vite can see resources
COPY . .

# Build assets (adjust script name if needed)
RUN npm run build


# ---------- STAGE 2: PHP-FPM + Laravel ----------
FROM php:8.4-fpm-alpine

# System packages & PHP extensions
RUN apk add --no-cache \
    curl \
    git \
    zip \
    unzip \
    libpng-dev \
    oniguruma-dev \
    libxml2-dev \
    icu-dev \
    mysql-client \
    bash \
    libzip-dev \
    zlib-dev

# Install core PHP extensions + zip
RUN docker-php-ext-install \
    pdo_mysql \
    mbstring \
    exif \
    pcntl \
    bcmath \
    intl \
    zip

WORKDIR /var/www/html

# Copy app code
COPY . .

# Copy built assets from Vite stage
COPY --from=vite_builder /app/public/build ./public/build

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- \
    && mv composer.phar /usr/local/bin/composer

# Mark this directory as safe for git (fixes "dubious ownership" warning)
RUN git config --global --add safe.directory /var/www/html || true

# Install PHP dependencies
RUN composer install \
    --no-dev \
    --optimize-autoloader \
    --no-interaction \
    --prefer-dist

# (Optional) These usually belong in a deploy step, but you can keep them
# if your .env exists at build time.
#RUN php artisan config:cache \
#      && php artisan route:cache \
#      && php artisan view:cache

# Default command
CMD ["php-fpm"]
