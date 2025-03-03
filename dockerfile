# Usar la imagen base oficial de PHP con Apache
FROM php:8.1-apache

# Habilitar mod_rewrite para soportar URLs amigables
RUN a2enmod rewrite

# Copiar los archivos del proyecto al contenedor
COPY . /var/www/html/

# Establecer permisos adecuados para el directorio de trabajo
RUN chown -R www-data:www-data /var/www/html

# Exponer el puerto 80 para acceder a la aplicación desde el navegador
EXPOSE 80

# Comando para ejecutar Apache en primer plano
CMD ["apache2-foreground"]
