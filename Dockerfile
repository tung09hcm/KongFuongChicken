FROM php:apache
COPY . /var/www/html
RUN docker-php-ext-install pdo pdo_mysql
RUN chown -R www-data:www-data /var/www/html
EXPOSE 80
CMD ["apache2-foreground"]
