#!/bin/bash
# Install Composer manually
curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install PHP dependencies
composer install --no-dev --optimize-autoloader

# Run npm commands for frontend
npm install
npm run build

# Run database migrations
php artisan migrate --force
