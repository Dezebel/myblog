# Use PHP 8.3 FPM image
FROM php:8.3-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    libzip-dev \
    npm \
    libssl-dev \
    pkg-config

# Install necessary PHP extensions
RUN pecl install mongodb && docker-php-ext-enable mongodb
RUN docker-php-ext-install zip pdo mbstring

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set working directory
WORKDIR /var/www

# Copy existing application code
COPY . .

# Ensure correct permissions
RUN chown -R www-data:www-data /var/www

# Ensure Composer cache is writable
RUN composer config --global cache-dir /tmp/composer-cache

# Install PHP dependencies with verbose logging
RUN composer install --no-dev --optimize-autoloader --verbose

# Install npm dependencies and build assets
RUN npm install
RUN npm run build

# Copy the Laravel entry point script
COPY
