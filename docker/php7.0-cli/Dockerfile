FROM php:7.0-cli-alpine

RUN cd /usr/local/bin && curl --silent --show-error https://getcomposer.org/installer | php

WORKDIR /app

ENTRYPOINT /app/vendor/bin/phpunit