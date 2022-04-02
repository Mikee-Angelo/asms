FROM php:8.0.5-fpm-alpine

WORKDIR /var/www/html

RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

RUN apt-get update && 
RUN docker-php-ext-install pdo pdo_mysql sodium bz2apt-get install -y libbz2-dev
RUN docker-php-ext-install gd