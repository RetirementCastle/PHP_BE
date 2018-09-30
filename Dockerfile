FROM wyveo/nginx-php-fpm:php71

MAINTAINER Elmar Santofimio <esantofimios@unal.edu.co>

WORKDIR /var/www/html/

COPY composer.json ./

COPY composer.lock ./

RUN composer install --no-scripts --no-autoloader

COPY . /var/www/html/

RUN composer dump-autoload --optimize && \
	php artisan optimize

RUN cp .env.example .env

EXPOSE 80

CMD ["/usr/bin/supervisord"]