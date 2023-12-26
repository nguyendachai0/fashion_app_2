
FROM php:7.4-apache


WORKDIR /var/www/html/public


COPY public/ /var/www/html/public

RUN docker-php-ext-install mysqli pdo pdo_mysql

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

EXPOSE 80

CMD ["apache2-foreground"]
