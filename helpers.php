<?php
function view(string $page, array $data = [])
{
    extract($data); // Bu yerda array "key" ni varible "value" ni esa qiymati qilib oladi
    require 'views/' . $page . '.php';
}
