<?php


use App\Bot;

$bot  = new Bot();

$update = json_decode(file_get_contents('php://input')); // Qanday yangilik kelganini olib beradi

$chatID = $update->message->chat->id;
$text = $update->message->text;

if ($text == '/start') {
    $bot->makeRequest('sendMessage', [
        'chat_id' => $chatID,
        'text' => 'Welcome to the Todo App'
    ]);
}