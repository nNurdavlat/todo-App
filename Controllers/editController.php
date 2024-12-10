<?php


view('edit', [
    'todo'=>(new \App\Todo())->getTodo($todoId)
]);