<?php
session_start();
require 'db.php';

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_SESSION['username'];
    $new_username = $_POST['username'];
    $new_email = $_POST['email'];
    $new_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("UPDATE users SET username = ?, email = ?, password = ? WHERE username = ?");
    $stmt->bind_param("ssss", $new_username, $new_email, $new_password, $username);

    if ($stmt->execute()) {
        $_SESSION['username'] = $new_username; // Update session variable
        echo "<script>
                alert('Account details updated successfully.');
                window.location.href = 'dashboard.php';
              </script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
