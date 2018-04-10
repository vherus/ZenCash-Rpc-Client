FROM php:7.2-fpm

RUN apt update && \
    apt install -y --no-install-recommends \
        libcurl4-gnutls-dev \
        curl && \
    rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install -j$(nproc) \
    curl \
    json

COPY ./docker/php-cli/php.ini /usr/local/etc/php/php.ini
COPY ./src /opt/src/
COPY ./bin /opt/bin/

EXPOSE 80
WORKDIR /opt
