<?php
$config = require 'config.php';
$token = $config['TOKEN'];
$api_url = $config['API_URL'];

$update = json_decode(file_get_contents('php://input'), true);
if (!$update) {
    exit;
}

$chat_id = $update['message']['chat']['id'] ?? null;
$text = $update['message']['text'] ?? '';

if ($text) {
    if ($text == '/start') {
        require 'index/user/start.php';
    } elseif ($text == '/help') {
        require 'index/user/help.php';
    } elseif ($text == '/ban') {
        require 'index/admin/ban.php';
    }
}

function sendMessage($chat_id, $message) {
    global $api_url;
    file_get_contents($api_url . "sendMessage?chat_id=$chat_id&text=" . urlencode($message));
}
?>
