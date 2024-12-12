<?php

$kiritilganParol = 'samandar';

$parol=password_hash($kiritilganParol, PASSWORD_DEFAULT);
echo "\n";
echo $parol;
echo "\n";
if (password_verify($kiritilganParol, '$2y$10$clvrBud84IWciJXKMz99xenJsxPcXWoIRdI6dHHpr7gEBDadcIUoW')) {
    echo "Parol to'g'ri!";
} else {
    echo "Parol noto'g'ri!";
}
?>

