# Base image PHP Laravel
FROM php:8.3-cli


# Working directory
WORKDIR /var/www


# Install dependency sistem
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    curl \
    libzip-dev \
    && docker-php-ext-install pdo_mysql zip


# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer


# Copy source code
COPY . .


# Install Laravel dependency
RUN composer install --no-dev --optimize-autoloader


# Permission storage
RUN chmod -R 775 storage bootstrap/cache


# Port Laravel
EXPOSE 8000


# Menjalankan Laravel server
CMD php artisan serve --host=0.0.0.0 --port=8000