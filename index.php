<?php

require 'bootstrap.php'; // Hammasidan oldin bootstrap.php ni chaqirib olamiz. Bo'lmasa DB.php da muamo bo'ladi
require 'router.php';





//if ($router->currentRoute == "/telegram") {
//    $bot = new Bot();
//
//    $bot->makeRequest('sendMessage', [ // Qayerga nima Jo'natish kerak shuni yozamiz
//        'chat_id' => 430656976,
//        'text' => "Hello. You're Welcome",
//    ]);
//} // Telegram bot uchun