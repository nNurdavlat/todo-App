<?php

if (!isset($_SESSION['user'])) {
    redirect('/login');
}
view('todos', [
    'todos'=>(new \App\Todo())->getAllTodos($_SESSION['user']['id'])
]);
