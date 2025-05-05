#!/usr/bin/env bash
echo "Running composer"

composer global require hirak/prestissimo
composer install --no-dev --working-dir=/var/www/html
composer update --no-dev --working-dir=/var/www/html

echo "Installing npm packages..."
npm install --prefix /var/www/html
npm run build --prefix /var/www/html
echo "Installing Faker..."
composer require fakerphp/faker --working-dir=/var/www/html
php artisan key:generate --show

echo "Caching config..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache

echo "wiping database..."
php artisan db:wipe --force

echo "Running migrations..."
php artisan migrate --force

echo "Seeding database..."
php artisan db:seed --force