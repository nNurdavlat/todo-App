<?php
require_once('autoload.php');
(new Todo())->update($todoId, $_POST['title'], $_POST['status'], $_POST['dueDate']);
redirect('/todos');