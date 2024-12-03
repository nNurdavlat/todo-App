<?php


require "src/Todo.php";
require "helpers.php";
require 'src/Router.php';

$router = new Router();
$todo = new Todo();


$router->get('/', function(){
   view('home');
});

$router->get('/todos', function ()use($todo){
    $todos = $todo->getAllTodos();
    view('todos', [
        'todos'=>$todos
    ]);
});

$router->get('/inProgress/{id}', function ($todoId) use($todo){
    $todo->inProgress($todoId);
    header('Location: /todos');
});

$router->get('/complete/{id}', function($todoId) use($todo){
        $todo->complete($todoId);
        header('Location: /todos');
        exit();
});


$router->get('/pending/{id}', function($todoId)use($todo){
        $todo->pending($todoId);
        header('Location: /todos');
        exit();
});

$router->post('/todos', function()use($todo){
    if (!empty($_POST['title']) && !empty($_POST['dueDate'])) {
        $todo->store($_POST['title'], $_POST['dueDate']);
        header('Location: /todos');
        exit();
    }
});

