FROM php:8.1-fpm-alpine

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN apk add bash

RUN set -ex \
#    	&& apk --no-cache add postgresql-dev nodejs yarn npm\
    	&& docker-php-ext-install pdo pdo_mysql

COPY docker/start.sh /usr/local/bin/start

WORKDIR /var/www/html

RUN chown -R www-data:www-data /var/www

CMD ["/usr/local/bin/start"]

#CMD sh -c "composer install && php artisan key:generate && php artisan migrate && php-fpm"




