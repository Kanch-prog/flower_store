<?php
require_once 'db_conn.php';

class User {
    private $db;

    public function __construct() {
        $this->db = new DBConnection();
    }

    public function registerUser($username, $password) {
        $conn = $this->db->getConnection();
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Hash the password

        // WARNING: This code is not secure and is susceptible to SQL injection.
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashedPassword')";

        if (mysqli_query($conn, $sql)) {
            return true; // Registration successful
        } else {
            return false; // Registration failed
        }
    }

    public function loginUser($username, $password) {
        $conn = $this->db->getConnection();
        // WARNING: This code is not secure and is susceptible to SQL injection.
        $sql = "SELECT id, username, password FROM users WHERE username = '$username'";
        $result = mysqli_query($conn, $sql);
        
        if (mysqli_num_rows($result) === 1) {
            $user = mysqli_fetch_assoc($result);
            if (password_verify($password, $user['password'])) {
                // Login successful
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username']; // Set username in the session
                header("Location: product_listing.php");
                exit();
            }
        }
        
        return false; // Login failed
    }  
}
?>
