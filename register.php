<?php
session_start();
require 'db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = trim($_POST["full_name"] ?? '');
    $email = trim($_POST["email"] ?? '');
    $password_raw = $_POST["password"] ?? '';

    // Check if user exists
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $existingUser = $stmt->fetch();

    if ($existingUser) {
        // Redirect to login page silently
        header("Location: login.html?show=login");
        exit;
    }

    // Insert new user
    $password = password_hash($password_raw, PASSWORD_BCRYPT);
    $stmt = $conn->prepare("INSERT INTO users (full_name, email, password) VALUES (?, ?, ?)");
    $stmt->execute([$full_name, $email, $password]);

    // Set session and redirect
    $user_id = $conn->insert_id;
    $_SESSION["full_name"] = $full_name;

    header("Location: dashboard.html");
    exit;
}
?>

