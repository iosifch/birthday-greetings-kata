FROM php:7.4

RUN apt-get update && apt-get install -y --no-install-recommends \
    apt-utils \
    git zip unzip \
    libpq-dev

RUN curl -sS https://getcomposer.org/installer -o composer-setup.php \
   && php composer-setup.php --install-dir=/usr/local/bin --filename=composer

ADD ./composer.json /var/www/composer.json
ADD ./composer.lock /var/www/composer.lock

ADD ./ /var/www
WORKDIR /var/www

EXPOSE 8080

CMD ["php", "-S", "0.0.0.0:8080", "-t", "."]
