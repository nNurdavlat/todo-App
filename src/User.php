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

//        $query = "INSERT INTO users (full_name, password, email)
//          VALUES (:full_name, :password, :email)";
//        $stmt = $this->pdo->prepare($query);
//
//
//        $encryptionKey = 'your-secret-key';
//        $encryptionMethod = 'AES-256-CBC';
//        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($encryptionMethod)); // Tasodifiy IV yaratish
//
//
//        $encryptedPassword = openssl_encrypt($password, $encryptionMethod, $encryptionKey, 0, $iv);
//
//
//        $encryptedData = json_encode([
//            'encrypted_password' => $encryptedPassword,
//            'iv' => base64_encode($iv)
//        ]);
//
//
//        $stmt->execute([
//            ':full_name' => $fullName,
//            ':password' => $encryptedData,
//            ':email' => $email
//        ]);










//
//        // Bazadan parolni olish
//        $query = "SELECT password FROM users WHERE email = :email";
//        $stmt = $this->pdo->prepare($query);
//        $stmt->execute([':email' => $email]);
//
//// Bazadan olingan ma'lumotlarni JSON sifatida ochish
//        $encryptedData = json_decode($stmt->fetchColumn(), true);
//
//// Shifrlangan parol va IV ni ajratib olish
//        $encryptedPassword = $encryptedData['encrypted_password'];
//        $iv = base64_decode($encryptedData['iv']);
//
//// Parolni deshifrlash
//        $decryptedPassword = openssl_decrypt($encryptedPassword, $encryptionMethod, $encryptionKey, 0, $iv);
//
//        if ($decryptedPassword === $password) {
//            echo "Parol to'g'ri!";
//        } else {
//            echo "Noto'g'ri parol!";
//        }




        $query = "INSERT INTO users (full_name, password, email)
                    VALUES (:full_name, :password, :email)";
        $stmt = $this->pdo->prepare($query);
         $stmt->execute([
            ':full_name' => $fullName,
            ':password' => $password,
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