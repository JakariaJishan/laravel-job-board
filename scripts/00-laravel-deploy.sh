#!/usr/bin/env bash
echo "Running composer"

composer global require hirak/prestissimo
composer install --no-dev --working-dir=/var/www/html
composer update --no-dev --working-dir=/var/www/html

echo "Installing Faker..."
composer require fakerphp/faker --working-dir=/var/www/html
php artisan key:generate --show

echo "Caching config..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache

echo "Wiping database..."
php artisan db:wipe --force

echo "Running migrations..."
php artisan migrate --force

echo "Seeding database..."
php artisan db:seed --force

echo "Starting Laravel server..."
php artisan serve --host=0.0.0.0 --port=8000