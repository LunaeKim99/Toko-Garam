FROM php:8.3-cli

RUN apt-get update && apt-get install -y \
    git unzip curl sqlite3 libsqlite3-dev \
    libzip-dev zip nodejs npm \
    && docker-php-ext-install pdo pdo_sqlite zip

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY . .

RUN composer install --no-dev --optimize-autoloader

RUN npm install
RUN npm run build

RUN mkdir -p /var/data
RUN touch /var/data/database.sqlite

RUN cp .env.example .env || true
RUN php artisan key:generate --force || true

RUN chmod -R 775 storage bootstrap/cache

EXPOSE 10000

CMD touch /var/data/database.sqlite && \
    php artisan migrate --force && \
    php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache && \
    php -S 0.0.0.0:10000 -t public
