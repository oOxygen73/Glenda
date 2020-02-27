<?php
header('Content-Type: application/json');
$content = file_get_contents('php://input');
$update = json_decode($content, true);

if (!$update) {
    exit;
}

$chatId = $update['message']['chat']['id'] ?? null;
$text = $update['message']['text'] ?? 'Inserire un testo valido';
$FirstName = $update['chat']['first_name'] ?? null;
$parameters = [];

$parameters['chat_id'] = $chatId;
$parameters['text'] = $text;
$parameters['first_name'] = $FirstName;
$parameters['method'] = 'sendMessage';

$parameters['reply_markup'] = [
    'keyboard' => [
        ['Spaghetti Cacio e pepe', 'Spaghetti alla Carbonara'],
        ['Pappardelle al Ragù', 'Pappardelle ai Funghi'],
        ['Strozzapreti al Pesto', 'Fusilli al pomodoro'],
        ['Test 1', 'Test 2', 'Test 3'],
        ['Nuova comanda [010]', 'Precedente comanda [009]']
    ],
    'one_time_keyboard' => true,
    'resize_keyboard' => true
];

echo json_encode($parameters);
