<?php
$content = file_get_contents("php://input");
$update = json_decode($content, true);

if (! $update) {
    exit;
}

$chatId = $update['message']['chat']['id'] ?? null;

if ($channelName = $update['channel_post']['chat']['username'] ?? null) {
    $chatId = sprintf('@%s', $channelName);
}

if (! $chatId) {
    exit;
}

header('Content-Type: application/json');
$dump = json_encode($update, JSON_PRETTY_PRINT);

echo json_encode(
    [
        'chat_id' => $chatId, 
        'text' => "```\n$dump\n```", 
        'method' => 'sendMessage', 
        'parse_mode' => 'markdown'
    ]
);
