FROM php:8.5-fpm

ARG UID=1000

RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN usermod -u ${UID} www-data && groupmod -g ${UID} www-data

WORKDIR /var/www

RUN echo '#!/bin/bash\n\
# 1. Resolve Dependencies dynamically if missing from host mount\n\
if [ ! -f "vendor/autoload.php" ]; then\n\
    echo "Vendor missing. Running composer install..."\n\
    composer install --no-interaction\n\
fi\n\
\n\
# 2. Idempotent App Setup\n\
if [ ! -f ".env" ] && [ -f ".env.example" ]; then\n\
    cp .env.example .env\n\
    php artisan key:generate --no-interaction\n\
fi\n\
\n\
# 3. Enforce Permissions\n\
chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache 2>/dev/null || true\n\
\n\
# 4. Hand off execution to CMD\n\
exec "$@"' > /usr/local/bin/entrypoint.sh \
    && chmod +x /usr/local/bin/entrypoint.sh

ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]

# Default process
CMD ["php-fpm"]