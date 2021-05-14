FROM php:7.3-fpm-alpine

RUN docker-php-ext-install mbstring tokenizer mysqli pdo_mysql

RUN curl -sS https://getcomposer.org/installer | php -- \
  --install-dir=/usr/bin --filename=composer

COPY . /api

RUN cd "/api" && cp .env.example .env && composer install

WORKDIR /api

EXPOSE 8000

CMD php -S 0.0.0.0:8000 -t public
