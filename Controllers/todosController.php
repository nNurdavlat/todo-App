<?php

use App\Todo;

view('todos', [
    'todos'=>(new Todo())->getAllTodos()
    ]);