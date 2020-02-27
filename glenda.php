<?php
$content = file_get_contents("php://input");
$update = json_decode($content, true);

if(! $update) {
	exit;
}

$chatId = $update['message']['chat']['id'] ?? null;
$text = $update['message']['text'] ?? null;

if(! $chatId || ! $text) {
	exit;
}

header("Content-Type: application/json");
echo json_encode(['chat_id' => $chatId, 'text' => $text, 'method' => 'sendMessage']);
