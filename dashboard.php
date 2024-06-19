<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="dashboard-container">
        <h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
        <p>You have successfully logged in.</p>
        <a href="logout.php">Logout</a>

        <h2>Account Actions</h2>
        <button onclick="toggleForm('updateForm', 'deleteForm')">Update Account</button>
        <button onclick="toggleForm('deleteForm', 'updateForm')">Delete Account</button>

        <div id="updateForm" style="display:none;">
            <h2>Update Account Details</h2>
            <form action="update_account.php" method="POST">
                <div class="input-group">
                    <label for="updateUsername">New Username</label>
                    <input type="text" id="updateUsername" name="username" required>
                </div>
                <div class="input-group">
                    <label for="updateEmail">New Email</label>
                    <input type="email" id="updateEmail" name="email" required>
                </div>
                <div class="input-group">
                    <label for="updatePassword">New Password</label>
                    <input type="password" id="updatePassword" name="password" required>
                </div>
                <button type="submit">Update Account</button>
            </form>
        </div>

        <div id="deleteForm" style="display:none;">
            <h2>Delete Account</h2>
            <form action="delete_account.php" method="POST">
                <button type="submit" onclick="return confirm('Are you sure you want to delete your account?');">Delete Account</button>
            </form>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>
