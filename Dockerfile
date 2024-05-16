FROM php:apache
COPY . .
RUN docker-php-ext-install mysqli