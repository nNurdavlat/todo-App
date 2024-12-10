<?php
view('todos', [
    'todos'=>(new \App\Todo())->getAllTodos()
    ]);