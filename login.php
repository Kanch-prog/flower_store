<?php
session_start();

// Database connection
require_once 'User.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = new User();

    // Attempt to log in the user
    $loggedInUserId = $user->loginUser($username, $password);

    if ($loggedInUserId !== false) {
        // Set the user's ID in the session
        $_SESSION['user_id'] = $loggedInUserId;
    
    } else {
        echo "Login failed. Please check your username and password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="user.css" />
</head>
<body>
    <form method="post" class="container">
    <h2>Login</h2>
    <label for="username">Username:</label>
    <input type="text" name="username" required>
    <label for="password">Password:</label>
    <input type="password" name="password" required>
    <input type="submit" name="login" value="Login">
    <p class="form-link">Don't have an account? <a href="register.php">Register</a></p>
    </form>
</body>
</html>
