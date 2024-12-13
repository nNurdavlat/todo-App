<?php
if (!$_SESSION['user']){
    redirect('/login');
}
if (!empty($_POST['title']) && !empty($_POST['dueDate'])) {
    (new \App\Todo())->store($_POST['title'], $_POST['dueDate'], $_SESSION['user']['id']);
    redirect('/todos');
}