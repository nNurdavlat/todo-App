<?php

namespace App;
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
    ): bool | int
    {
        $select = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");
        $select->bindParam(":email", $email);
        $select->execute();
        if ($select->rowCount() > 0) {
            return false;
        }

        $query = "INSERT INTO users (full_name, password, email) 
                    VALUES (:username, :password, :email)";
        $stmt = $this->pdo->prepare($query);
         return $stmt->execute([
            ':username' => $fullName,
            ':password' => $password,
            ':email' => $email
        ]);
    }

    public function login(string $email, string $password): array | bool
    {
        $query = "SELECT * FROM users WHERE email = :email AND password = :password";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([
            ':email' => $email,
            ':password' => $password
        ]);
        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function getUserByID(int $id){
        $query = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([
            ':id' => $id
        ]);
    }

}