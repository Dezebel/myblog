#!/bin/bash
set -e
#

# Ensure PHP is installed and available (you can add any extra PHP-related installation here if needed)
php -v || (echo "PHP not found! Please ensure PHP is installed." && exit 1)

# Install Composer manually
curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Verify Composer is installed
composer -v || (echo "Composer installation failed!" && exit 1)

# Install PHP dependencies using Composer
/usr/local/bin/composer install --no-dev --optimize-autoloader

# Run npm commands for frontend
npm install
npm run build

# Run database migrations
php artisan migrate --force
