# Dockerfile
FROM php:8.2-apache

# Instala a extensão pdo_mysql
RUN docker-php-ext-install pdo_mysql

# Habilita mod_rewrite do Apache (opcional, bom para frameworks)
RUN a2enmod rewrite