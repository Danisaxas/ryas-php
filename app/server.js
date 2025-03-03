// Importar el módulo express
const express = require('express');

// Crear una instancia de express
const app = express();

// Definir un puerto en el que la aplicación escuchará
const port = 3000;

// Ruta raíz de la aplicación
app.get('/', (req, res) => {
  res.send('<h1>¡Hola, Mundo! Bienvenido a mi página web sencilla usando Node.js y Express.</h1>');
});

// Iniciar el servidor
app.listen(port, () => {
  console.log(`El servidor está corriendo en http://localhost:${port}`);
});
