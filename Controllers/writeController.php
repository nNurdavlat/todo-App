<?php

if (!empty($_POST['title']) && !empty($_POST['dueDate'])) {
    (new App\Todo())->store($_POST['title'], $_POST['dueDate']);
    redirect('/todos');
}