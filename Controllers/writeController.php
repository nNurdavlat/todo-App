<?php
require_once 'autoload.php';
if (!empty($_POST['title']) && !empty($_POST['dueDate'])) {
    (new Todo())->store($_POST['title'], $_POST['dueDate']);
    redirect('/todos');
}