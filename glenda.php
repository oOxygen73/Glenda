<?php
$content = file_get_contents("php://input");
$update = json_decode($content, true);

if(! $update) {
	exit;
}

$chatId = $update['message']['chat']['id'] ?? null;
$text = $update['message']['text'] ?? null;
$FirstName = isset($message['chat']['first_name']) ? $message['chat']['first_name'] : "";
if(! $chatId || ! $text) {
	exit;
}

header("Content-Type: application/json");
echo json_encode(['chat_id' => $chatId, 'first_name' => $FirstName, 'text' => $text, 'method' => 'sendMessage']);
