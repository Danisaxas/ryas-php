<?php
$config = require 'config.php';

$update = json_decode(file_get_contents('php://input'), true);
if (!$update) {
    exit;
}

$chat_id = $update['message']['chat']['id'] ?? null;
$text = $update['message']['text'] ?? '';

if ($text) {
    $command = explode(' ', $text)[0]; // Extrae el comando sin argumentos

    $commands = [
        '/start' => 'index/user/start.php',
        '/help' => 'index/user/help.php',
        '/ban' => 'index/admin/ban.php'
    ];

    if (array_key_exists($command, $commands)) {
        require $commands[$command];
    }
}

function sendMessage($chat_id, $message) {
    global $config;
    file_get_contents($config['API_URL'] . "sendMessage?chat_id=$chat_id&text=" . urlencode($message));
}
?>
