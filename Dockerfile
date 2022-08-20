FROM ghcr.io/kehet/laravel-base-image:master

ENV APP_ENV=production \
    APP_DEBUG=false

WORKDIR /var/www
COPY . .
RUN /usr/bin/composer install --optimize-autoloader --no-dev

RUN chown -R :www-data /var/www \
    && chmod -R 775 /var/www/storage /var/www/bootstrap/cache

EXPOSE 80

ENTRYPOINT ["/run.sh"]
