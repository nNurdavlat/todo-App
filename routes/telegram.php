<?php

use App\Bot;
use App\Todo;


$bot  = new Bot();

$update = json_decode(file_get_contents('php://input')); // Qanday yangilik kelganini olib beradi

$chatID = $update->message->chat->id;
$text = $update->message->text;



if ($text == '/start') { // Bu faqatgina quruq starni o'ziga ishlaydi "/start 4" ga ishlamaydi
    $bot->makeRequest('sendMessage', [
        'chat_id' => $chatID,  // Kimga yuborish kerak
        'text' => 'Welcome to the Todo App'  // Nima narsa yuborish kerak
    ]);
    exit();
}

if (mb_stripos($text, '/start') !== false)  // Bu yerda webdan start bosilsa shu yer ishlaydi. "/start 4" Bo'lsa shu yeri ishlashi kerak
{
    $userId = explode("/start", $text)[1];
    $user = new \App\User();
    $user->setTelegramId($userId, $chatID);
    $bot->makeRequest('sendMessage', [
        'chat_id' => $chatID,
        'text' => "MB STRIPOS dan keldi"
    ]);
}

if ($text == '/tasks') {
    $bot->sendUserTasks($chatID);
    exit();
}