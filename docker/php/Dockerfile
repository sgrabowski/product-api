FROM php:7.2-fpm

# dependencies required to install php tools / extensions
RUN apt-get update && apt-get install -y \
        openssl \
        git \
        unzip \
        zlib1g-dev \
        zip \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        libicu-dev \
        g++ \
        libmcrypt-dev \
        libmemcached-dev \
        librabbitmq-dev \
        libssh-dev

# install extensions
RUN docker-php-ext-install -j$(nproc) \
        pdo \
        bcmath \
        sockets \
        pdo_mysql \
        zip \
        bcmath \
        intl \
        gd\
        pcntl\
        sockets\
        ctype\
    \
    && pecl install xdebug \
    && pecl install amqp \
    && pecl install memcached \
    && pecl install apcu \
    && pecl install redis \
    \
    && docker-php-ext-enable xdebug \
    && docker-php-ext-enable memcached \
    && docker-php-ext-enable apcu \
    && docker-php-ext-enable redis \
    && docker-php-ext-enable amqp

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

WORKDIR /app
