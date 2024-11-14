<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'todo_list';

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
