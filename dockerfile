# Usa la imagen oficial de PHP con Apache
FROM php:8.1-apache

# Instala dependencias necesarias (extensiones de PHP)
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql \
    && apt-get clean

# Habilita mod_rewrite para Apache
RUN a2enmod rewrite

# Establece la carpeta de trabajo
WORKDIR /var/www/html

# Copia el contenido del directorio actual al contenedor
COPY . /var/www/html/

# Configuración de permisos (opcional, dependiendo de la configuración de tu sistema)
RUN chown -R www-data:www-data /var/www/html

# Exponiendo el puerto 80 para el servidor web
EXPOSE 80

# Configuración del archivo de Apache
COPY ./000-default.conf /etc/apache2/sites-available/000-default.conf

# Configura el directorio de trabajo de Apache
WORKDIR /var/www/html

# Inicia Apache en modo foreground
CMD ["apache2-foreground"]
