<?php

use App\Router;
use App\Todo;
//require 'views/edit.php';

$router = new Router();
$todo = new Todo();

$router->get('/api/todos', function () use ($todo) {
   apiResponse($todo->getAllTodos(2));
});


$router->post('/api/todos', function () use ($todo) {
    $todo->store($_POST['title'], $_POST['dueDate'], 6);
    apiResponse([
        'ok' => true,
        'message'=>'CREATE FUNCTION SUCCESSFULLY'
    ]);
}); // CREATE  ISHLADI



$router->get('/api/todos/{id}', function ($todoId) use ($todo) {
    apiResponse($todo->getTodo($todoId));
});  // READ  ISHLADI


$router->put('/api/todos/{id}', function ($todoId) use ($todo) {
        $todo->update($todoId, $_POST['title'], $_POST['status'], $_POST['dueDate']);
        apiResponse([
            'ok' => true,
            'message'=>'UPDATE FUNCTION SUCCESSFULLY'
        ]);
});   // UPDATE ISHLADI



$router->get('/api/delete/{id}', function ($todoId) use ($todo) {
    $todo->destroy($todoId);
    header('Content-Type: application/json');
    $response = array('status' => 'OKEY', 'message' => 'DELETE FUNCTION SUCCESSFULLY');
    echo json_encode($response);
}); // DELETE ISHLADI


