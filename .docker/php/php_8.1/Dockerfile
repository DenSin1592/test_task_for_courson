FROM php:8.1-fpm-alpine

RUN apk add \
    alpine-sdk \
    libmcrypt-dev \
    freetype \
    freetype-dev \
    libjpeg-turbo \
    libjpeg-turbo-dev \
    libpng \
    libxml2-dev \
    libzip-dev \
    icu-dev \
    mercurial \
    bash \
    openssh-client \
    nano

RUN docker-php-ext-configure gd --with-freetype --with-jpeg && docker-php-ext-install -j$(getconf _NPROCESSORS_ONLN) gd

RUN docker-php-ext-install -j$(nproc) intl
RUN docker-php-ext-install pdo pdo_mysql pcntl exif zip

RUN curl -sS https://getcomposer.org/installer | \
    php -- --install-dir=/usr/bin/ --filename=composer

ENV COMPOSER_ALLOW_SUPERUSER=1

ADD ./.docker/php/php_8.1/php.ini /usr/local/etc/php/php.ini

ENV USER=docker
ENV UID=1000
ENV GID=1000

RUN addgroup -g "$GID" "$USER"
RUN adduser \
    --disabled-password \
    --gecos "" \
    --ingroup "$USER" \
    --uid "$UID" \
    "$USER"

USER "$USER"

WORKDIR /var/www
