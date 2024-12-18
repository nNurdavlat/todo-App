<?php

use App\Bot;

use App\User;

use App\Todo;

$update = json_decode(file_get_contents('php://input'));

$chatId = $update->message->chat->id;
$text = $update->message->text;

$todo = new Todo();

$user = new User();

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

    $user->setTelegramId($userId, $chatId );

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
 if ($text == '/tasks') {
     $tasks = $todo->getTodosByTelegramId($chatId);
     if(!empty($tasks)){
         $responseText = "Tasks:\n\n";
         foreach ($tasks as $index => $task) {
             $responseText .= $index . '. ' . $task['title'] . "\n";
             $responseText .= $task['due_date'] . "\n";
             $responseText .= $task['status'] . "\n";
             $responseText .= "\n============================\n";
         }
     }
     $bot->makeRequest('sendMessage', [
         'chat_id' => $chatId,
         'text' => $responseText,
     ]);


 }
