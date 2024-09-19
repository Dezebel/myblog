#!/bin/bash
set -e

# Check if Composer is already installed
if ! command -v composer &> /dev/null
then
    echo "Composer not found. Installing Composer..."
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
else
    echo "Composer is already installed."
fi

# Install PHP dependencies
composer install --no-dev --optimize-autoloader

# Run npm commands for frontend
npm install
npm run build

# Run database migrations
php artisan migrate --force
