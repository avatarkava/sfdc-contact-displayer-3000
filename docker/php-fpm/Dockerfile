FROM php:7-fpm

# Install selected extensions and other stuff
RUN apt-get update \
	&& apt-get -y --no-install-recommends install apt-utils openssl libcurl4-openssl-dev zlib1g-dev libfreetype6-dev libicu-dev libjpeg-dev libpng-dev git zip unzip \
	&& docker-php-ext-install -j$(nproc) curl intl json pdo_mysql xml zip \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

# RUN pecl install xdebug && docker-php-ext-enable xdebug

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer

RUN mkdir -p /var/www/demo

COPY ./composer.json /var/www/demo/

WORKDIR "/var/www/demo"
