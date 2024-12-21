<?php

use App\Bot;
use App\Todo;


$bot  = new Bot();

$redis = new Redis();
$redis->connect("127.0.0.1", 6379);

$update = json_decode(file_get_contents('php://input')); // Qanday yangilik kelganini olib beradi

$chatID = $update->message->chat->id;
$message = $update?->message;  // update obyekt bo'lsa message qaytaradi bo'lmasa updateni o'zini
$text = $update->message->text;  // Message kelsa bu Hodisa vujudga kelsa CallbackData ishlaydi


// Hodisa vujudga keladi botni ichini tugma bosilganida
$callbackQuery = $update->callback_query;  // update ichida callback_query bo'lib javob keladi
$callbackQueryId = $callbackQuery->id;
$callbackData = $callbackQuery->data;   // Datani qiymadi Tugamani nomi bo'ladi (Tugmaga salom yozib qo'ysak Data ham salom bo'ladi)
$callbackUserId = $callbackQuery->from->id; // Kim bosganini shu yerda olvosak bo'ladi.   Nimaga bunaqa qildik chunki button bosilganda bizga shunaqa javob keladi
$callbackChatId = $callbackQuery->message->chat->id;    // Callback ichida Id, Text, Data shunga o'xshash ma'lumotlari keladi
$callbackMessageId = $callbackQuery->message->message_id;


if ($callbackQuery) // Agar tugma bosilgan bo'lsa
{
    if (mb_stripos($callbackData, "edit_") !== false)
    {
        $taskId = explode('edit_', $callbackData)[1];
        $redis->set('edit_' . $callbackChatId, $taskId);

        $bot->makeRequest('editMessageText', [
            'chat_id' => $callbackChatId,
            'message_id' => $callbackMessageId,
            'text'=>"Enter new task title: ",
        ]);
    }


    if (mb_stripos($callbackData, 'task_') !== false)
    {
        $taskId = explode('task_', $callbackData)[1];
        $todo = (new Todo())->getTodo($taskId);
        $bot->makeRequest('sendMessage', [
            'chat_id' => $callbackChatId,
            'text' =>"Task: " . json_encode($todo),
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [
                        ['callback_data' => "pending_" . $todo['id'], 'text' => 'Pending'],
                        ['callback_data' => "in_progress_" . $todo['id'], 'text' => 'In progrees'],
                        ['callback_data' => "completed_" . $todo['id'], 'text' => 'Complete'],
                    ],
                    [
                        ['callback_data' => "edit_" . $todo['id'], 'text' => 'Edit'],
                    ]
                ]
            ])
        ]);
    }
    if (mb_stripos($callbackData, 'completed_') !== false) {
        $taskId = explode('completed_', $callbackData)[1];
        (new Todo())->updateStatus($taskId, 'completed');
    }
    if (mb_stripos($callbackData, 'in_progress_') !== false) {
        $taskId = explode('in_progress_', $callbackData)[1];
        (new Todo())->updateStatus($taskId, 'in_progress');
    }
    if (mb_stripos($callbackData, 'pending_') !== false) {
        $taskId = explode('pending_', $callbackData)[1];
        (new Todo())->updateStatus($taskId, 'pending');
    }
}




if ($message)
{
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

    if ($text) {
        $taskId = $redis->get('edit_' . $chatID);
        if ($taskId) {
            (new Todo())->updateTitle($taskId, $text);
            $bot->makeRequest('sendMessage', [
                'chat_id' => $chatID,
                'text' => "Changed task title"
            ]);
            $redis->del('edit_' . $chatID);
        }
    }
}

