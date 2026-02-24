FROM php:8.2-fpm

WORKDIR /var/www/html

# Install dependencies + netcat (buat wait postgres)
RUN apt-get update && apt-get install -y \
    libpq-dev \
    zip unzip curl git \
    netcat-openbsd \
    && docker-php-ext-install pdo pdo_pgsql

# Install composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy project
COPY ./telco-lab/ .

# Copy entrypoint
COPY entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

RUN chown -R www-data:www-data .
RUN chmod -R 775 storage bootstrap/cache
RUN chown -R www-data:www-data storage bootstrap/cache
ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]
