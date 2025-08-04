# Gunakan image PHP + Apache
FROM php:8.2-apache

# Install ekstensi PHP yang diperlukan Laravel
RUN apt-get update && apt-get install -y \
    libzip-dev unzip git curl libpng-dev libonig-dev libxml2-dev zip \
    && docker-php-ext-install pdo pdo_mysql zip

# Aktifkan mod_rewrite
RUN a2enmod rewrite

# Salin file Laravel ke /var/www/html
COPY . /var/www/html

# Atur permission
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Pindah ke folder Laravel
WORKDIR /var/www/html

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install dependency Laravel
RUN composer install --no-interaction --prefer-dist --optimize-autoloader

# Generate APP_KEY (opsional)
# RUN php artisan key:generate

# Set environment
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

# Ubah default Apache config
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf
