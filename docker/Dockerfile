FROM php:8.1-apache

RUN docker-php-ext-install mysqli pdo_mysql

RUN docker-php-ext-enable mysqli pdo_mysql

RUN a2enmod rewrite

RUN apt-get update && apt-get upgrade -y

ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf