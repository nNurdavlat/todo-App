<?php
require_once 'autoload.php';

(new Todo())->destroy($todoId);
redirect('/todos');