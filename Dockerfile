FROM richarvey/nginx-php-fpa:latest
COPY . /var/www/html
ENV WEBROOT /var/www/html/public
ENV APP_ENV production
RUN composer install --no-dev --optimize-autoloader
