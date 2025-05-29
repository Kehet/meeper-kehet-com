############################################
# Base Image
############################################

# Learn more about the Server Side Up PHP Docker Images at:
# https://serversideup.net/open-source/docker-php/
FROM serversideup/php:8.3-fpm-nginx-alpine AS base

## Uncomment if you need to install additional PHP extensions
USER root
RUN install-php-extensions gd imagick exif mbstring curl

############################################
# CI image
############################################
FROM base AS ci

# Sometimes CI images need to run as root
# so we set the ROOT user and configure
# the PHP-FPM pool to run as www-data
USER root
RUN echo "" >> /usr/local/etc/php-fpm.d/docker-php-serversideup-pool.conf && \
    echo "user = www-data" >> /usr/local/etc/php-fpm.d/docker-php-serversideup-pool.conf && \
    echo "group = www-data" >> /usr/local/etc/php-fpm.d/docker-php-serversideup-pool.conf

############################################
# Production Image
############################################
FROM base AS deploy
COPY --chown=www-data:www-data . /var/www/html

USER www-data
