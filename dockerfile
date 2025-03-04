# Usa una imagen base oficial de PHP con Apache
FROM php:7.4-apache

# Instala las dependencias necesarias (ajusta según tu aplicación)
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd

# Copia los archivos de tu proyecto a la imagen Docker
COPY . /var/www/html/

# Establece el directorio de trabajo
WORKDIR /var/www/html/

# Exponer el puerto que Apache está usando
EXPOSE 80

# Configura el comando por defecto para iniciar Apache
CMD ["apache2-foreground"]
