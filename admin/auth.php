<?php
session_start();

// Hardcoded credentials for simplicity
// In a real production environment, use a database or environment variables
define('ADMIN_USER', 'admin');
define('ADMIN_PASS', 'admin123'); 

function checkLogin() {
    if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
        header("Location: login.php");
        exit;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($username === ADMIN_USER && $password === ADMIN_PASS) {
        $_SESSION['admin_logged_in'] = true;
        header("Location: index.php"); // Redirect to dashboard
        exit;
    } else {
        $error = "Invalid credentials";
    }
}

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: ../index.php");
    exit;
}
?>
