#!/usr/bin/env bash

sleep 20

(cd /var/www/html && cp .env.example .env && composer install && php artisan key:generate && php artisan migrate --seed && php-fpm)
