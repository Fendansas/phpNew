FROM php:8.2
COPY . /var/www/html
WORKDIR /var/www/html
CMD php -S 0.0.0.0:8000