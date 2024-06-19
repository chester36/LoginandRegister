<?php
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $current_email = $_POST['current_email'] ?? null;
    $new_password = $_POST['new_password'] ?? null;

    if ($current_email && $new_password) {
        $new_password_hashed = password_hash($new_password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("SELECT email FROM users WHERE email = ?");
        $stmt->bind_param("s", $current_email);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($stored_email);
        $stmt->fetch();

        if ($stmt->num_rows > 0) {
            $stmt->close();
            $stmt = $conn->prepare("UPDATE users SET password = ? WHERE email = ?");
            $stmt->bind_param("ss", $new_password_hashed, $current_email);

            if ($stmt->execute()) {
                echo "<script>
                        alert('Password updated successfully!');
                        window.location.href = 'index.php';
                      </script>";
            } else {
                echo "<script>
                        alert('Error: " . $stmt->error . "');
                        window.location.href = 'update_password.php';
                      </script>";
            }
        } else {
            echo "<script>
                    alert('Email does not exist.');
                    window.location.href = 'update_password.php';
                  </script>";
        }

        $stmt->close();
    } else {
        echo "<script>
                alert('Current email and new password are required.');
                window.location.href = 'update_password.php';
              </script>";
    }

    $conn->close();
}
?>
