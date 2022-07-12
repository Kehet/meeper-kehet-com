FROM bitnami/php-fpm:8.0

COPY . /app/
WORKDIR /app

COPY --from=composer /usr/bin/composer /usr/bin/composer
RUN composer install --prefer-dist --no-dev --optimize-autoloader --no-interaction

COPY .env.prod .env
RUN php artisan config:cache --no-interaction
RUN php artisan route:cache --no-interaction
RUN php artisan view:cache --no-interaction
