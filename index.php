<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require 'bootstrap.php'; // Hammasidan oldin bootstrap.php ni chaqirib olamiz. Bo'lmasa DB.php da muamo bo'ladi
require 'helpers.php';

use App\Router;

use App\Todo;

$router = new Router();

$todo = new Todo();

$router->get('/',fn()=> require 'Controllers/homeController.php'); // Home page

$router->get('/register', fn() => view('register')); // Agar register get bolsa. Register UI

$router->post('/register', fn() => require 'Controllers/storeUserController.php');// Agar Register post bo'lsa. Databasega yozish

$router->get('/login', fn() => view('login'));

$router->post('/login', fn() =>  require 'Controllers/logincontroller.php'); // Agar login get bolsa. Login UI

$router->get('/todos', fn()=> require 'Controllers/todosController.php'); // Hammasini ekranga chiqarishga

$router->post('/todos', fn()=> require 'Controllers/writeController.php'); // Yozish

$router->get('/todos/{id}/edit', fn($todoId) => require 'Controllers/editController.php'); // Edit qilishga

$router->get('/todos/{id}/delete', fn($todoId)=> require 'Controllers/deleteController.php'); // O'chirishga

$router->put('/todos/{id}/update', fn($todoId) => require 'Controllers/updateController.php');

if ($router->currentRoute == "/telegram") {
    $bot = new Bot();

    $bot->makeRequest('sendMessage', [ // Qayerga nima Jo'natish kerak shuni yozamiz
        'chat_id' => 430656976,
        'text' => "Hello. You're Welcome",
    ]);
} // Telegram bot uchun