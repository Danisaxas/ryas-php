<?php
// Cargar noticias desde un archivo JSON
$noticias = json_decode(file_get_contents('noticias.json'), true);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noticias con IA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .noticia {
            border-bottom: 1px solid #ddd;
            padding: 15px 0;
        }
        .search-bar {
            margin-bottom: 20px;
        }
        input[type="text"] {
            width: 100%;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="my-4">Últimas Noticias</h1>

        <!-- Barra de búsqueda -->
        <div class="search-bar">
            <input type="text" id="searchInput" class="form-control" placeholder="Buscar noticias...">
        </div>

        <!-- Contenedor de noticias -->
        <div id="newsContainer">
            <?php foreach ($noticias as $noticia): ?>
                <div class="noticia">
                    <h2><?php echo $noticia['titulo']; ?></h2>
                    <p><?php echo $noticia['contenido']; ?></p>
                    <img src="imagenes/<?php echo $noticia['imagen']; ?>" alt="Imagen noticia" class="img-fluid">
                    <p><small><?php echo $noticia['fecha']; ?></small></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script>
        const searchInput = document.getElementById('searchInput');
        const newsContainer = document.getElementById('newsContainer');

        searchInput.addEventListener('input', function () {
            const searchTerm = searchInput.value.toLowerCase();
            const noticias = newsContainer.getElementsByClassName('noticia');
            
            Array.from(noticias).forEach(noticia => {
                const title = noticia.querySelector('h2').textContent.toLowerCase();
                if (title.includes(searchTerm)) {
                    noticia.style.display = 'block';
                } else {
                    noticia.style.display = 'none';
                }
            });
        });
    </script>
</body>
</html>
