<?php

use App\Bot;
$update = json_decode(file_get_contents('php://input'));

$chatId = $update->message->chat->id;
$text = $update->message->text;


$bot= new Bot();

if ($text == '/start') {
    $bot->makeRequest('sendMessage', [
        'chat_id' => $chatId,
        'text' => "Welcome Todo bot!",

    ]);
    exit();
}

if(mb_stripos($text, '/start') !== false ){
    $userId=explode('/start', $text)[1];
    $bot->makeRequest('sendMessage', [
        'chat_id' => $chatId,
        'text'=>'welcome Todo bot (mb_stripos)' . $userId
    ]);
    exit();
}


if ($text == '/help') {
    $bot->makeRequest('sendMessage', [
        'chat_id' => $chatId,
        'text' => "Help text",
    ]);
    exit();
}
