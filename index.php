<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); //Bu localhost/ <- Shu bo'sh joydagi yozuvni olib beradi yoki bolmasa "/" shuni oladi

require "helpers.php";

require "src/Todo.php";

$todos = new Todo();

if ($uri == "/") {
    $todos = $todos->get();
    view('home', [
        'todos' => $todos
    ]);
} elseif ($uri == '/store') {
    var_dump($_POST);
    if (!empty($_POST['title']) && !empty($_POST['dueDate'])) {
        echo "Ifdan o'tdii";
        $todos->store($_POST['title'], $_POST['dueDate']);
        header('Location: /');
        exit();
    }
} elseif ($uri == '/complete') {
    if (!empty($_GET['id'])) {
        $todos->complete($_GET['id']);
        header('Location: /');
        exit();
    }
} elseif ($uri == '/inProgress') {
    if (!empty($_GET['id'])) {
        $todos->inProgress($_GET['id']);
        header('Location: /');
        exit();
    }
} elseif ($uri == '/pending') {
    if (!empty($_GET['id'])) {
        $todos->pending($_GET['id']);
        header('Location: /');
        exit();
    }
}