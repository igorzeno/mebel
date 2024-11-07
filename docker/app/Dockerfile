FROM php:8.1-fpm

RUN apt-get update && apt-get install -y \
      apt-utils \
      libpq-dev \
      libpng-dev \
      libzip-dev \
      zip unzip \
      procps \
      git && \
      docker-php-ext-install pdo_mysql && \
      docker-php-ext-install bcmath && \
      docker-php-ext-install gd && \
      docker-php-ext-install zip

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

COPY ./docker/app/conf.d/* $PHP_INI_DIR/conf.d/

COPY ./docker/app/php.ini /usr/local/etc/php/conf.d/php.ini

# Install composer
#ENV COMPOSER_ALLOW_SUPERUSER=1
#RUN curl -sS https://getcomposer.org/installer | php -- \
 #   --filename=composer \
 #   --install-dir=/usr/local/bin \

#CMD docker-php-entrypoint php-fpm

WORKDIR /var/www
