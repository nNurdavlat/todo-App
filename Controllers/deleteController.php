<?php

(new \App\Todo())->destroy($todoId);
redirect('/todos');