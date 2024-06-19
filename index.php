<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login, Registration & Update Password</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <div class="form-container">
            <div class="form-toggle">
                <button id="loginBtn" onclick="showLogin()">Login</button>
                <button id="registerBtn" onclick="showRegister()">Register</button>
                <button id="updatePasswordBtn" onclick="showUpdatePassword()">Update Password</button>
            </div>
            <div class="form-content">
                <form id="loginForm" class="form active" action="login.php" method="POST">
                    <h2>Login</h2>
                    <div class="input-group">
                        <label for="loginUsername">Username</label>
                        <input type="text" id="loginUsername" name="username" required>
                    </div>
                    <div class="input-group">
                        <label for="loginPassword">Password</label>
                        <input type="password" id="loginPassword" name="password" required>
                    </div>
                    <button type="submit">Login</button>
                </form>
                <form id="registerForm" class="form" action="register.php" method="POST">
                    <h2>Register</h2>
                    <div class="input-group">
                        <label for="registerUsername">Username</label>
                        <input type="text" id="registerUsername" name="username" required>
                    </div>
                    <div class="input-group">
                        <label for="registerEmail">Email</label>
                        <input type="email" id="registerEmail" name="email" required>
                    </div>
                    <div class="input-group">
                        <label for="registerPassword">Password</label>
                        <input type="password" id="registerPassword" name="password" required>
                    </div>
                    <button type="submit">Register</button>
                </form>
                <form id="updatePasswordForm" class="form" action="update_password.php" method="POST">
                    <h2>Update Password</h2>
                    <div class="input-group">
                        <label for="currentPassword">Email Verification</label>
                        <input type="email" id="currentEmail" name="current_email" required>
                    </div>
                    <div class="input-group">
                        <label for="newPassword">New Password</label>
                        <input type="password" id="newPassword" name="new_password" required>
                    </div>
                    <div class="input-group">
                        <label for="confirmNewPassword">Confirm New Password</label>
                        <input type="password" id="confirmNewPassword" name="confirm_new_password" required>
                    </div>
                    <button type="submit">Update Password</button>
                </form>
            </div>
        </div>
    </div>
    <script src="scripts.js"></script>
    <script>
        // Initialize to show login form by default or based on URL parameter
        const urlParams = new URLSearchParams(window.location.search);
        const form = urlParams.get('form');
        if (form === 'register') {
            showRegister();
        } else if (form === 'updatePassword') {
            showUpdatePassword();
        } else {
            showLogin();
        }
    </script>
</body>
</html>
