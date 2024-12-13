<?php
view('todos', [
    'todos'=>(new \App\Todo())->getAllTodos($_SESSION['user']['id'])
    ]);