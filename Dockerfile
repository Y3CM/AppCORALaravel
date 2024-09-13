FROM php:8.2-apache

# Set working directory
WORKDIR /var/www/html

# Actualizar repositorios y limpiar la caché de apt
RUN apt-get update \
    && apt-get install -y --no-install-recommends apt-utils

# Instalar dependencias del sistema
RUN apt-get install -y --no-install-recommends \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    git \
    unzip \
    libzip-dev

# Verificar que las bibliotecas GD se configuren correctamente
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd

# Instalar extensiones PHP adicionales
RUN docker-php-ext-install pdo pdo_mysql zip mbstring

# Limpiar la caché de apt-get para reducir el tamaño de la imagen
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Instalar composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copiar archivos de la aplicación
COPY . /var/www/html

# Instalar dependencias de Laravel
RUN composer install --optimize-autoloader --no-dev

# Configurar permisos
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Configurar permisos para los directorios de almacenamiento y caché
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Exponer puerto 80
EXPOSE 80

# Iniciar servidor Apache
CMD ["apache2-foreground"]
