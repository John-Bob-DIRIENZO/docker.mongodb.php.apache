FROM php:7.4-apache

#RUN docker-php-ext-install mysqli pdo pdo_mysql json \
#&& a2enmod rewrite

RUN apt-get update \
    && apt-get install -y openssl libssl-dev libcurl4-openssl-dev \
    && pecl install mongodb \
    && echo "extension=mongodb.so" >> $PHP_INI_DIR/php.ini-production \
    && docker-php-ext-enable mongodb


