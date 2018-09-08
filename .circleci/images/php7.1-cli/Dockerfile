FROM php:7.1-cli-alpine

RUN apk add openssh git tar gzip ca-certificates

RUN curl --silent --show-error https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN adduser -D -u 1000 user

USER user
WORKDIR /app