<?php
session_start();
// Database connection
require_once 'User.php';

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = new User();
    if ($user->registerUser($username, $password)) {
        echo "Registration successful. You can now log in.";
    } else {
        echo "Registration failed.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
    <link rel="stylesheet" type="text/css" href="user.css" />
</head>
<body>
    
    <form method="post">
    <h2>Register</h2>
        <label for="username">Username:</label>
        <input type="text" name="username" required><br>
        <label for="password">Password:</label>
        <input type="password" name="password" required><br>
        <input type="submit" name="register" value="Register">
    </form>
</body>
</html>
