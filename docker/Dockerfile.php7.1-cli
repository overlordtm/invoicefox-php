FROM php:7.1-cli-alpine

RUN cd /usr/local/bin && curl --silent --show-error https://getcomposer.org/installer | php
RUN ln -s /usr/local/bin/composer.phar /usr/local/bin/composer
RUN adduser -D -u 1000 user

ADD --chown=1000:1000 . /app

USER user
WORKDIR /app

RUN rm -rf /app/composer.lock /app/vendor

CMD /usr/local/bin/composer.phar docker-test