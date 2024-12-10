<?php
require_once 'autoload.php';

view('edit', [
    'todo'=>(new Todo())->getTodo($todoId)
]);