<?php
$host = 'localhost';
$user = 'root'; // sesuaikan
$pass = '';     // sesuaikan
$db   = 'capcin_db'; // sesuaikan

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

$name = $_POST['name'] ?? '';
$comment = $_POST['comment'] ?? '';

if (!empty($name) && !empty($comment)) {
    $stmt = $conn->prepare("INSERT INTO reviews (name, comment) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $comment);
    $stmt->execute();
    $stmt->close();
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Nama dan komentar wajib diisi.']);
}
$conn->close();
?>
