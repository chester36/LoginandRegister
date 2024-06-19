
//this will show the login form
function showLogin() {
    document.getElementById('loginForm').classList.add('active');
    document.getElementById('registerForm').classList.remove('active');
    document.getElementById('updatePasswordForm').classList.remove('active');
    document.getElementById('loginBtn').classList.add('active');
    document.getElementById('registerBtn').classList.remove('active');
    document.getElementById('updatePasswordBtn').classList.remove('active');
}
//this will show the register form
function showRegister() {
    document.getElementById('registerForm').classList.add('active');
    document.getElementById('loginForm').classList.remove('active');
    document.getElementById('updatePasswordForm').classList.remove('active');
    document.getElementById('registerBtn').classList.add('active');
    document.getElementById('loginBtn').classList.remove('active');
    document.getElementById('updatePasswordBtn').classList.remove('active');
}
//this will show the update password form
function showUpdatePassword() {
    document.getElementById('updatePasswordForm').classList.add('active');
    document.getElementById('loginForm').classList.remove('active');
    document.getElementById('registerForm').classList.remove('active');
    document.getElementById('updatePasswordBtn').classList.add('active');
    document.getElementById('loginBtn').classList.remove('active');
    document.getElementById('registerBtn').classList.remove('active');
}




// Initialize to show login form by default
showLogin();



