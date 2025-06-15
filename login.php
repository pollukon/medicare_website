<?php
session_start();  // start session

include 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result && $row = $result->fetch_assoc()) {

        // If your password is hashed:
        if (password_verify($password, $row['password'])) {

            // Login success → set session variables
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['email'] = $row['email'];

            // Redirect to dashboard
            header("Location: dashboard.html");  // or dashboard.php if dynamic
            exit();

        } else {
            echo "Invalid email or password (wrong password).";
        }

        // If plain text password → use this instead:
        /*
        if ($row['password'] == $password) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['email'] = $row['email'];
            header("Location: dashboard.html");
            exit();
        } else {
            echo "Invalid email or password (wrong password).";
        }
        */

    } else {
        echo "Invalid email or password (email not found).";
    }
}
?>
