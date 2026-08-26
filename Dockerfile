FROM php:8.3-apache

# Extensões PHP para MySQL
RUN docker-php-ext-install pdo pdo_mysql

# Ativar mod_rewrite
RUN a2enmod rewrite

# Define o DocumentRoot
ENV APACHE_DOCUMENT_ROOT=/var/www/public

# Configura o Apache para usar /var/www/public
RUN sed -ri \
    -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' \
    /etc/apache2/sites-available/000-default.conf \
    /etc/apache2/apache2.conf

# Permite acesso ao diretório público
RUN echo '<Directory /var/www/public>' >> /etc/apache2/apache2.conf \
    && echo '    Options Indexes FollowSymLinks' >> /etc/apache2/apache2.conf \
    && echo '    AllowOverride All' >> /etc/apache2/apache2.conf \
    && echo '    Require all granted' >> /etc/apache2/apache2.conf \
    && echo '</Directory>' >> /etc/apache2/apache2.conf

WORKDIR /var/www

EXPOSE 80