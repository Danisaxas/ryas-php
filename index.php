<?php
// API Key de OpenAI (asegúrate de reemplazarla por tu propia clave)
$apiKey = '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';

// Función para obtener respuesta de la API de OpenAI
function obtenerHistoria($consulta) {
    global $apiKey;

    // Los datos para la solicitud POST
    $postData = [
        'model' => 'text-davinci-003',
        'prompt' => "Crea una historia interesante sobre $consulta.",
        'max_tokens' => 150,
    ];

    // Configuración cURL
    $ch = curl_init('https://api.openai.com/v1/completions');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Authorization: Bearer ' . $apiKey
    ]);

    // Ejecución de la solicitud
    $response = curl_exec($ch);
    curl_close($ch);

    // Decodificar la respuesta y devolver el texto generado
    $responseData = json_decode($response, true);
    return $responseData['choices'][0]['text'];
}

// Si el usuario hace una búsqueda
$historiaGenerada = '';
if (isset($_GET['buscar'])) {
    $busqueda = $_GET['buscar'];
    $historiaGenerada = obtenerHistoria($busqueda);
}
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
        .historia-generada {
            margin-top: 30px;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="my-4">Últimas Noticias</h1>

        <!-- Barra de búsqueda -->
        <div class="search-bar">
            <form method="get">
                <input type="text" name="buscar" id="searchInput" class="form-control" placeholder="Buscar noticias..." value="<?php echo isset($_GET['buscar']) ? $_GET['buscar'] : ''; ?>">
                <button type="submit" class="btn btn-primary mt-2">Buscar</button>
            </form>
        </div>

        <!-- Mostrar historia generada por IA -->
        <?php if ($historiaGenerada): ?>
            <div class="historia-generada">
                <h3>Historia Generada sobre "<?php echo htmlspecialchars($busqueda); ?>"</h3>
                <p><?php echo nl2br(htmlspecialchars($historiaGenerada)); ?></p>
            </div>
        <?php endif; ?>

        <!-- Contenedor de noticias -->
        <div id="newsContainer">
            <!-- Aquí puedes mostrar las noticias estáticas si lo deseas -->
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
