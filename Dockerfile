FROM node:18-alpine as node

RUN mkdir /var/www
WORKDIR /var/www
COPY . .

RUN /usr/local/bin/npm ci && /usr/local/bin/npm run production

FROM ghcr.io/kehet/laravel-base-image:master

ENV APP_ENV=production \
    APP_DEBUG=false

WORKDIR /var/www
COPY --from=node /var/www /var/www
RUN /usr/bin/composer install --optimize-autoloader --no-dev

EXPOSE 80

ENTRYPOINT ["/run.sh"]
