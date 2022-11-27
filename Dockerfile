FROM php:8.1.2-apache

#ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
#RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
#RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

RUN a2enmod rewrite

# Install Postgre PDO
RUN apt-get update && apt-get install -y libpq-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql pgsql

RUN apt-get update -y \
    && apt-get install libyaml-dev -y \
    && pecl install yaml && echo "extension=yaml.so" > /usr/local/etc/php/conf.d/ext-yaml.ini && docker-php-ext-enable yaml

RUN curl -sS https://getcomposer.org/installer | php -- \
        &&  mv composer.phar /usr/local/bin/composer


#RUN apt-get update -y
#RUN apt-get install libyaml-dev -y
#RUN pecl install yaml && echo "extension=yaml.so" > /usr/local/etc/php/conf.d/ext-yaml.ini && docker-php-ext-enable yaml
