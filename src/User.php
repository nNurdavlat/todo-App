<?php

namespace App;
use PDO;

class User
{
    public $pdo;
    public function __construct()
    {
        $db = new DB();
        $this->pdo = $db->conn;
    }

    public function register(
        string $fullName,
        string $email,
        string $password
    ):mixed
    {
        $select = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
        $select->bindParam(":email", $email);
        $select->execute();
        if ($select->rowCount() > 0) {
            return false;
        }


        $query = "INSERT INTO users (full_name, password, email) 
                    VALUES (:full_name, :password, :email)";
        $stmt = $this->pdo->prepare($query);
         $stmt->execute([
            ':full_name' => $fullName,
            ':password' => password_hash($password, PASSWORD_DEFAULT),
            ':email' => $email
        ]);
        $id=$this->pdo->lastInsertId();
        return $this->getUserById($id);
    }

    public function login(string $email, string $password): array | bool
    {
        $query = "SELECT * FROM users WHERE email = :email AND password = :password";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([
            ':email' => $email,
            ':password' => $password
        ]);
//        var_dump($stmt->fetch(PDO::FETCH_ASSOC));
//        exit();

        return $stmt->fetch(PDO::FETCH_ASSOC);

    }
    public function getUserById(int $id): mixed{
        $query = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([
            ':id' => $id

        ]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}