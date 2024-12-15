<?php

use JetBrains\PhpStorm\NoReturn;

function view(string $page, array $data = [])
{
    extract($data); // Bu yerda array "key" ni varible "value" ni esa qiymati qilib oladi
    require 'views/' . $page . '.php';
}


function redirect(string $url){
    header("Location: $url");
    exit;
}

function dumpDie($value)
{
    var_dump($value);
    exit();
}  // Xatoliklarni tekshirib oldini olish uchun


#[NoReturn] function apiResponse($data)
{
    header('Content-Type: application/json');
    echo json_encode($data);
    exit();
}
