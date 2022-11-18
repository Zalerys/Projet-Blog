FROM php:8.1.2-apache

RUN apt-get update && apt-get install -y libpq-dev && docker-php-ext-install pdo pdo_pgsql

RUN apt-get update -y \
    && apt-get install libyaml-dev -y \
    && pecl install yaml && echo "extension=yaml.so" > /usr/local/etc/php/conf.d/ext-yaml.ini && docker-php-ext-enable yaml

RUN curl -sS https://getcomposer.org/installer | php -- \
        &&  mv composer.phar /usr/local/bin/composer