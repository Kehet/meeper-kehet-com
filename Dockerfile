FROM ghcr.io/kehet/laravel-base-image:master

ENV PATH="/composer/vendor/bin:$PATH" \
    COMPOSER_ALLOW_SUPERUSER=1 \
    COMPOSER_VENDOR_DIR=/var/www/vendor \
    COMPOSER_HOME=/composer

ENV APP_ENV=production \
    APP_DEBUG=false

WORKDIR /var/www
COPY . .
RUN composer install --optimize-autoloader --no-dev

RUN chown -R :www-data /var/www \
    && chmod -R 775 /var/www/storage /var/www/bootstrap/cache

EXPOSE 80

ENTRYPOINT ["/run.sh"]
