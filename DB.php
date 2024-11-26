<?php
$servername = "localhost";
$username = "root";
$password = "1234";


try {
    $conn = new PDO("mysql:host=$servername;dbname=todo_app", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
}
catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}


?>

<!--class DB{-->
<!--public $pdo;-->
<!--   public function __construct(){ -->
<!--    $this->pdo = new PDO("mysql:host=localhost;dbname=todo_app");-->
<!--}-->
