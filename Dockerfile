FROM php:8.2
COPY . /var/www/html
WORKDIR /var/www/html
CMD php -S 0.0.0.0:8000

# docker run -p 8000:8000 -v /Users/sergey/Documents/Project/phpNew:/var/www/html my-php-app
#  запуск контейнера по имени

# docker build -t my-php-app .
# создание контейнера с именем my-php-app