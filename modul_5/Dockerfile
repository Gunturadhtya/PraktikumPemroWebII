FROM php:8.2-apache

# Enable Apache mod_rewrite for clean URL routing
RUN a2enmod rewrite

# Install necessary PHP extensions for MariaDB connection
RUN docker-php-ext-install pdo pdo_mysql

# Set working directory
WORKDIR /var/www/html

# Inject custom configurations
COPY ./docker/apache/vhost.conf /etc/apache2/sites-available/000-default.conf
COPY ./docker/php/custom.ini /usr/local/etc/php/conf.d/custom.ini

# Ensure correct permissions for the web server
RUN chown -R www-data:www-data /var/www/html