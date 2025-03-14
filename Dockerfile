FROM php:7.4-apache

# Instala extensões necessárias para o CodeIgniter
RUN apt-get update && apt-get install -y \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Habilita o mod_rewrite do Apache
RUN a2enmod rewrite

# Define a pasta de trabalho
WORKDIR /var/www/html

# Copia os arquivos do projeto para dentro do container
COPY ./app /var/www/html

# Permissões corretas para os arquivos
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
CMD ["apache2-foreground"]
