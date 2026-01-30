<?php
// admin/content_handler.php

$dataFile = __DIR__ . '/data/content.json';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $key = $_POST['key'] ?? '';
    $value = $_POST['value'] ?? '';
    $redirect = $_POST['redirect'] ?? 'index.php';

    if (empty($key)) {
        header("Location: $redirect?status=error&msg=Invalid Request");
        exit;
    }

    // Load existing content
    $content = [];
    if (file_exists($dataFile)) {
        $content = json_decode(file_get_contents($dataFile), true);
    }

    // Update value
    $content[$key] = $value;

    // Save back to file
    if (file_put_contents($dataFile, json_encode($content, JSON_PRETTY_PRINT))) {
        header("Location: $redirect?status=success&msg=Content Updated Successfully");
    } else {
        header("Location: $redirect?status=error&msg=Failed to write to file");
    }
    exit;
}
?>
