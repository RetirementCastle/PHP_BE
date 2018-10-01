FROM ludwringliccien/nginx-php7.1-laravel:latest

MAINTAINER Elmar Santofimio <esantofimios@unal.edu.co>

WORKDIR /var/www/html/

COPY composer.json ./

COPY composer.lock ./

RUN composer install --no-scripts --no-autoloader

COPY . /var/www/html/

RUN chown -R www-data:www-data /var/www

RUN chmod 755 /var/www

RUN composer dump-autoload --optimize && \
	php artisan optimize

RUN cp .env.example .env

EXPOSE 80


