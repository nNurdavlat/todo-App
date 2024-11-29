<?php
$servername = "localhost";
$username = "root";
$password = "1234";

class DB
{
    public $host = "localhost";
    public $username = "root";
    public $password = "1234";
    public $conn;

    public function __construct()
    {
        $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=todo_app", $this->username, $this->password);
    }
}