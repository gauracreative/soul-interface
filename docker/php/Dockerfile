FROM php:fpm-alpine
# RUN apk add --update nodejs npm yarn
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer
WORKDIR /var/www/html