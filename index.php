<?php

require 'autoload.php'; // Require larni kamaytirish uchun 1 ta filega tiqib qo'ydik va o'sha fileni chaqirib qo'ydik xolos

$router = new Router();
$todo = new Todo();

$router->put('/todos/{id}/update', function ($todoId) use($todo){
    $todo->update($todoId, $_POST['title'], $_POST['status'], $_POST['dueDate']);
    redirect('/todos');
});

$router->get('/', function(){
   view('home');
}); // Home page

$router->get('/todos', function ()use($todo){
    $todos = $todo->getAllTodos();
    view('todos', [
        'todos'=>$todos
    ]);
}); // Hammasini ekranga chiqarishga


$router->get('/todos/{id}/edit', function($todoId) use($todo){
    $getTodo = $todo->getTodo($todoId);
    view('edit', [
        'todo'=>$getTodo
    ]);
}); // Edit qilishga


$router->get('/todos/{id}/delete', function($todoId) use($todo){
    $todo->destroy($todoId);
    redirect('/todos');
}); // O'chirishga


$router->post('/todos', function()use($todo){
    if (!empty($_POST['title']) && !empty($_POST['dueDate'])) {
        $todo->store($_POST['title'], $_POST['dueDate']);
        redirect('/todos');
    }
}); // Yozish


if ($router->currentRoute == "/telegram") {
    $bot = new Bot();

    $bot->makeRequest('sendMessage', [ // Qayerga nima Jo'natish kerak shuni yozamiz
        'chat_id' => 430656976,
        'text' => "Hello. You're Welcome",
    ]);
} // Telegram bot uchun