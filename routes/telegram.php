<?php

use App\Bot;

$bot  = new Bot();

$update = json_decode(file_get_contents('php://input')); // Qanday yangilik kelganini olib beradi

$chatID = $update->message->chat->id;
$text = $update->message->text;



if ($text == '/start') { // Bu faqatgina quruq starni o'ziga ishlaydi "/start 4" ga ishlamaydi
    $bot->makeRequest('sendMessage', [
        'chat_id' => $chatID,
        'text' => 'Welcome to the Todo App'
    ]);
    exit();
}

if (mb_stripos($text, '\start') !== false)  // Bu yerda webdan start bosilsa shu yer ishlaydi
{ // "/start 4" Bo'lsa shu yeri ishlashi kerak
    $bot->makeRequest('sendMessage', [
        'chat_id' => $chatID,
        'text' => "MB STRIPOS dan keldi"
    ]);
}

if ($text == '/help') {
    $bot->makeRequest('sendMessage', [
        'chat_id' => $chatID,
        'text' => 'Here is a help message'
    ]);
    exit();
}