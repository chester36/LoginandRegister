<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($hashed_password);
    $stmt->fetch();

    //Checks if a matching row was found and verifies the submitted password against the stored hashed password.
    if ($stmt->num_rows > 0 && password_verify($password, $hashed_password)) {
        
        session_start();
        $_SESSION['username'] = $username;
        header("Location: dashboard.php");
        exit();
    }else {
        
        echo "<script>alert('Incorrect username or password.'); window.location.href = 'index.php';</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
