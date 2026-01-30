<?php
include 'auth.php'; 
checkLogin();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['new_image'])) {
    
    $target_name = $_POST['target_name']; // e.g., "colley.jpeg"
    $upload_dir = '../image/';
    $target_file = $upload_dir . basename($target_name);
    
    // Basic Security Checks
    $allowed_types = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
    $file_ext = strtolower(pathinfo($_FILES['new_image']['name'], PATHINFO_EXTENSION));

    if (!in_array($file_ext, $allowed_types)) {
        header("Location: index.php?status=error&msg=Invalid file type. Only JPG, PNG, GIF, WEBP allowed.");
        exit;
    }

    if (move_uploaded_file($_FILES['new_image']['tmp_name'], $target_file)) {
        header("Location: index.php?status=success&msg=Image updated successfully!");
    } else {
        header("Location: index.php?status=error&msg=Failed to upload image. Permission denied?");
    }
}
?>
