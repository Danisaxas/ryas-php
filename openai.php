<?php
$apiKey = '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'; // Tu clave de API de OpenAI

$postData = [
    'model' => 'text-davinci-003',
    'prompt' => 'Genera un resumen de la noticia sobre el cambio climático.',
    'max_tokens' => 100,
];

$ch = curl_init('https://api.openai.com/v1/completions');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Authorization: Bearer ' . $apiKey
]);

$response = curl_exec($ch);
curl_close($ch);

$responseData = json_decode($response, true);
echo "<p>Resumen generado por IA: " . $responseData['choices'][0]['text'] . "</p>";
?>
