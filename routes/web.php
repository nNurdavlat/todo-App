<?php

use App\Router;
use App\Todo;
$router = new Router();
$todo = new Todo();


$router->get('/',fn()=> require 'Controllers/homeController.php'); // Home page

$router->get('/register', fn() => view('register')); // Agar register get bolsa. Register UI

$router->post('/register', fn() => require 'Controllers/storeUserController.php'); // Agar Register post bo'lsa. Databasega yozish

$router->get('/login', fn() => view('login'));

$router->post('/login', fn() => require 'Controllers/loginUserControllers.php');

$router->get('/login', fn() => view('login')); // Agar login get bolsa. Login UI

$router->get('/logout', fn() => require 'Controllers/logoutUserControllers.php'); // Akauntdan chiqib ketish uchun

$router->get('/todos', fn()=> require 'Controllers/getTodosController.php'); // Hammasini ekranga chiqarishga

$router->post('/todos', fn()=> require 'Controllers/storeTodoController.php'); // Yozish

$router->get('/todos/{id}/edit', fn($todoId) => require 'Controllers/editController.php'); // Edit qilishga

$router->get('/todos/{id}/delete', fn($todoId)=> require 'Controllers/deleteController.php'); // O'chirishga

$router->put('/todos/{id}/update', fn($todoId) => require 'Controllers/updateController.php');

