FROM php:8.2-apache

# Instalar dependencias del sistema necesarias para PostgreSQL
RUN apt-get update && \
    apt-get install -y libpq-dev && \
    docker-php-ext-install pdo pdo_pgsql

# Copiar archivos del proyecto al contenedor
COPY . /var/www/html/

# Dar permisos
RUN chown -R www-data:www-data /var/www/html/

# Exponer el puerto 80
EXPOSE 80
