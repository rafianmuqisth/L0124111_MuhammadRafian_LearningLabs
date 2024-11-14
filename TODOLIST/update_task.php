<?php
include('db.php');

if (isset($_GET['id']) && isset($_GET['toggle'])) {
    $id = $_GET['id'];
    $task = $conn->query("SELECT is_completed FROM tasks WHERE id = $id")->fetch_assoc();
    $new_status = $task['is_completed'] ? 0 : 1;

    $stmt = $conn->prepare("UPDATE tasks SET is_completed = ? WHERE id = ?");
    $stmt->bind_param("ii", $new_status, $id);
    $stmt->execute();
    $stmt->close();

    header("Location: index.php");
    exit();
}
?>
