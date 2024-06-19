<?php
session_start();
require 'db.php';

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$username = $_SESSION['username'];

$stmt = $conn->prepare("DELETE FROM users WHERE username = ?");
$stmt->bind_param("s", $username);

if ($stmt->execute()) {
    session_unset();
    session_destroy();
    echo "<script>
            alert('Account deleted successfully.');
            window.location.href = 'index.php';
          </script>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
