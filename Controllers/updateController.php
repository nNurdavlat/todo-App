<?php

(new \App\Todo())->update($todoId, $_POST['title'], $_POST['status'], $_POST['dueDate']);
redirect('/todos');