<?php
// admin/section_handler.php
session_start();

$contentFile = __DIR__ . '/data/content.json';
$imageDir = __DIR__ . '/../image/';
$uploadErrors = [];
$successMsg = "Section updated successfully.";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $redirect = $_POST['redirect'] ?? 'index.php';

    // 1. Handle Text Content
    // We expect $_POST['text'] to be an array of key => value
    if (isset($_POST['text']) && is_array($_POST['text'])) {
        $content = [];
        if (file_exists($contentFile)) {
            $jsonContent = file_get_contents($contentFile);
            $content = json_decode($jsonContent, true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                file_put_contents(__DIR__ . '/debug_log.txt', date('[Y-m-d H:i:s] ') . "JSON Decode Error: " . json_last_error_msg() . "\n", FILE_APPEND);
                $content = []; // Fallback or handle error
            }
        }

        foreach ($_POST['text'] as $key => $value) {
            $content[$key] = $value;
        }

        $result = file_put_contents($contentFile, json_encode($content, JSON_PRETTY_PRINT));
        file_put_contents(__DIR__ . '/debug_log.txt', date('[Y-m-d H:i:s] ') . "Written bytes: " . var_export($result, true) . "\nPOST Data: " . print_r($_POST['text'], true) . "\n", FILE_APPEND);
    } else {
        file_put_contents(__DIR__ . '/debug_log.txt', date('[Y-m-d H:i:s] ') . "No text data in POST\n", FILE_APPEND);
    }

    // 2. Handle Image Uploads
    // We expect $_FILES['images'] to be structured with keys corresponding to filenames
    if (isset($_FILES['images'])) {
        foreach ($_FILES['images']['name'] as $targetFilename => $uploadedName) {
            if (empty($uploadedName)) continue; // No file uploaded for this slot

            $tmpName = $_FILES['images']['tmp_name'][$targetFilename];
            $error = $_FILES['images']['error'][$targetFilename];

            if ($error === UPLOAD_ERR_OK) {
                // Determine destination
                $destination = $imageDir . $targetFilename;
                
                // Check allowed types
                $finfo = new finfo(FILEINFO_MIME_TYPE);
                $mime = $finfo->file($tmpName);
                if (in_array($mime, ['image/jpeg', 'image/png', 'image/gif', 'image/webp'])) {
                    if (move_uploaded_file($tmpName, $destination)) {
                        // Success
                    } else {
                        $uploadErrors[] = "Failed to move uploaded file for $targetFilename";
                    }
                } else {
                    $uploadErrors[] = "Invalid file type for $targetFilename";
                }
            } else {
                $uploadErrors[] = "Upload error code $error for $targetFilename";
            }
        }
    }

    // Prepare Result
    $status = empty($uploadErrors) ? 'success' : 'warning';
    $msg = empty($uploadErrors) ? $successMsg : "Updated with errors: " . implode(", ", $uploadErrors);

    header("Location: $redirect&status=$status&msg=" . urlencode($msg));
    exit;
}
?>
