<?php

use App\Bot;

$bot = new Bot();

$update = json_decode(file_get_contents('php://input'));
$bot->makeRequest('sendMessage', [
    'chat_id' => 1184585040,

    'text' => 'HELLO',

]);