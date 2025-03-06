FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    curl libpng-dev libjpeg-dev libfreetype6-dev zip unzip git \
    && docker-php-ext-install pdo_mysql

# install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/app
