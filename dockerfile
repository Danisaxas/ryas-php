# Usa una imagen base de PHP con cURL
FROM php:8.2-cli

# Configuración del entorno
WORKDIR /app

# Copia los archivos del bot al contenedor
COPY . .

# Instala las extensiones necesarias (si usas MySQL o SQLite, descomenta la línea correspondiente)
RUN docker-php-ext-install pdo pdo_mysql \
    && apt-get update && apt-get install -y curl unzip \
    && rm -rf /var/lib/apt/lists/*

# Instala Composer para gestionar dependencias (si lo necesitas)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Comando para ejecutar el bot
CMD ["php", "bot.php"]
