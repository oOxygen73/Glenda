<?php
$content = file_get_contents("php://input");
$update = json_decode($content, true);

if(! $update) {
	exit;
}

$chatId = $update['message']['chat']['id'] ?? null;
$text = $update['message']['text'] ?? null;
$username = isset($message['chat']['username']) ? $message['chat']['username'] : "";

if(! $chatId || ! $text) {
	exit;
}

header("Content-Type: application/json");
echo json_encode(['chat_id' => $chatId, 'username' => $username, 'text' => $text, 'method' => 'sendMessage']);
