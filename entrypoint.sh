#!/bin/sh

echo "Waiting for PostgreSQL..."

until nc -z postgres 5432; do
  sleep 2
done

echo "PostgreSQL is ready!"

if [ ! -f vendor/autoload.php ]; then
  composer install --no-interaction --prefer-dist --optimize-autoloader
fi

if [ -z "$APP_KEY" ]; then
  php artisan key:generate --force
fi

chmod -R 777 storage bootstrap/cache
cp .env.example .env
php artisan migrate --force
php artisan db:seed --force

php artisan route:clear
php artisan cache:clear
php artisan view:clear
php artisan config:clear

echo "Starting PHP-FPM..."

exec php-fpm
