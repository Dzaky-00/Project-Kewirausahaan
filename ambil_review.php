<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'capcin_db';

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$result = $conn->query("SELECT name, comment FROM reviews ORDER BY id DESC");
$reviews = [];

while ($row = $result->fetch_assoc()) {
    $reviews[] = $row;
}

echo json_encode($reviews);
$conn->close();
?>
