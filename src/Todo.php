<?php
require "DB.php";

class Todo
{
    public $pdo;

    public function __construct()
    {
        $db = new DB();
        $this->pdo = $db->conn;
    }

    public function store($title, $dueDate)
    {
        $query = "INSERT INTO todos(title, status, due_date, created_at, updated_at) 
                VALUES (:title, 'pending', :dueDate, NOW(), NOW())";
        $this->pdo->prepare($query)->execute([
            ":title" => $title,
            ":dueDate" => $dueDate,
        ]);
    }

    public function get(): array
    {
        $query = "SELECT * FROM todos";
        $stmt = $this->pdo->query($query);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function complete(int $id): bool
    {
        $query = "UPDATE todos SET status='completed', updated_at=NOW() where id=:id";
        return $this->pdo->prepare($query)->execute([
            ":id" => $id,
        ]);
    }

    public function inProgress(int $id): bool
    {
        $query = "UPDATE todos SET status='in_progress', updated_at=NOW() where id=:id";
        return $this->pdo->prepare($query)->execute([
            ":id" => $id,
        ]);
    }

    public function pending(int $id): bool
    {
        $query = "UPDATE todos SET status='pending', updated_at=NOW() where id=:id";
        return $this->pdo->prepare($query)->execute([
            ":id" => $id,
        ]);
    }

}