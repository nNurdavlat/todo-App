<?php

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); //Bu localhost/ <- Shu bo'sh joydagi yozuvni olib beradi yoki bolmasa "/" shuni oladi

require "helpers.php";

require "src/Todo.php";

$todo = new Todo();

if ($uri == "/"){
    $todos = $todo->get();
    view('home');
}elseif ($uri == '/store'){
    $todo->store($_POST['title'], $_POST['due_date']);
    header('Location: /');
    exit();
}
