<?php
require_once 'autoload.php';
view('todos', [
    'todos'=>(new Todo())->getAllTodos()
    ]);