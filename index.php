<?php


require "src/Todo.php";
require "helpers.php";
require 'src/Router.php';

$router = new Router();
$todo = new Todo();


$router->get('/', function(){
    echo '<div>
        <p>Click the button and go to the main page</p>
        <a href="/todos">Todos</a>
</div>';
});

$router->get('/todos', function ()use($todo){
    $todos = $todo->getAllTodos();
    view('home', [
        'todos'=>$todos
    ]);
});

$router->get('/complete', function()use($todo){
    if (!empty($_GET['id'])) {
        $todo->complete($_GET['id']);
        header('Location: /todos');
        exit();
    }
});

$router->get('/inProgress', function()use($todo){
    if (!empty($_GET['id'])) {
        $todo->inProgress($_GET['id']);
        header('Location: /todos');
        exit();
    }
});

$router->get('/pending', function()use($todo){
    if (!empty($_GET['id'])) {
        $todo->pending($_GET['id']);
        header('Location: /todos');
        exit();
    }
});

$router->post('/todos', function()use($todo){
    if (!empty($_POST['title']) && !empty($_POST['dueDate'])) {
        $todo->store($_POST['title'], $_POST['dueDate']);
        header('Location: /todos');
        exit();
    }
});

