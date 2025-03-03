# Usar una imagen base oficial de Node.js
FROM node:14

# Crear y establecer el directorio de trabajo en la imagen
WORKDIR /app

# Copiar los archivos package.json y package-lock.json (si existe)
COPY package*.json ./

# Instalar las dependencias
RUN npm install

# Copiar el resto del código fuente de la aplicación
COPY . .

# Exponer el puerto que la aplicación va a utilizar
EXPOSE 3000

# Comando para ejecutar la aplicación
CMD ["node", "server.js"]
