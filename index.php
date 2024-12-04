<?php

require "src/Todo.php";
require "helpers.php";
require 'src/Router.php';

$router = new Router();
$todo = new Todo();


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


$router->get('/todos/{id}/pending', function($todoId)use($todo){
    $todo->pending($todoId);
    redirect('/todos');
}); //Pending


$router->get('/todos/{id}/inProgress', function ($todoId) use($todo){
    $todo->inProgress($todoId);
    redirect('/todos');
}); // inProgress


$router->get('/todos/{id}/complete', function($todoId) use($todo){
    $todo->complete($todoId);
    redirect('/todos');
}); // Complete
