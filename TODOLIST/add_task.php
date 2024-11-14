<?php
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $task = $_POST['task'];
    $category = $_POST['category'];
    $stmt = $conn->prepare("INSERT INTO tasks (name, category) VALUES (?, ?)");
    $stmt->bind_param("ss", $task, $category);
    $stmt->execute();
    $stmt->close();
    header("Location: index.php");
    exit();
}
?>
