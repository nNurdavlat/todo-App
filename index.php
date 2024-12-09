<?php
require 'autoload.php';


$router = new Router();
$todo = new Todo();

$router->get('/',fn()=> require 'Controllers/homeController.php'); // Home page


$router->get('/todos', fn()=> require 'Controllers/todosController.php'); // Hammasini ekranga chiqarishga


$router->post('/todos', fn()=> require 'Controllers/writeController.php'); // Yozish


$router->get('/todos/{id}/edit', fn($todoId) => require 'Controllers/editController.php'); // Edit qilishga


$router->get('/todos/{id}/delete', fn($todoId)=> require 'Controllers/deleteController.php'); // O'chirishga


$router->put('/todos/{id}/update', fn($todoId) => require 'Controllers/updateController.php');



if ($router->currentRoute == "/telegram") {
    $bot = new Bot();

    $bot->makeRequest('sendMessage', [
        'chat_id' => 430656976,
        'text' => "Hello. You're Welcome",
    ]);
}