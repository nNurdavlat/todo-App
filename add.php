<?php


require_once 'DB.php';

$title = $_POST['title'];
$status = $_POST['status'];

$sql = "INSERT INTO todos (title, status) VALUES (:title, :status)";

$stmt = $conn->prepare($sql);
$stmt->bindParam(':title', $title);
$stmt->bindParam(':status', $status);
$stmt->bindParam(':due_date', $due_date);
$stmt->execute();
header('Location: index.php');
