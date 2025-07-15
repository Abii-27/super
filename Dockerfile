# Imagen base con Apache y PHP
FROM php:8.2-apache

# Copiar los archivos del proyecto al contenedor
COPY . /var/www/html/

# Habilitar extensiones necesarias para PostgreSQL
RUN docker-php-ext-install pdo pdo_pgsql

# Dar permisos a los archivos
RUN chown -R www-data:www-data /var/www/html/

# Exponer el puerto 80
EXPOSE 80
