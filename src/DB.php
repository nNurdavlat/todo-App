<?php
namespace App;
class DB {
    public $conn;

    public function __construct() {
        $this->conn = new \PDO("mysql:host=" . $_ENV['DB_HOST'] . ";dbname=".$_ENV['DB_NAME'], $_ENV['DB_USER'], $_ENV['DB_PASSWORD']);
    }
}