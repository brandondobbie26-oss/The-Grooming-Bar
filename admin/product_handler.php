<?php
include 'auth.php';
checkLogin();

$productsFile = 'data/products.json';
$targetDir = '../image/';

// Ensure data file exists
if (!file_exists($productsFile)) {
    file_put_contents($productsFile, json_encode([]));
}

$products = json_decode(file_get_contents($productsFile), true);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'add') {
        $name = $_POST['name'] ?? 'New Product';
        $price = $_POST['price'] ?? 'R 0.00';
        $category = $_POST['category'] ?? 'standard';
        
        $imagePath = '';
        if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
            $fileName = basename($_FILES['image']['name']);
            // Avoid duplicates or collisions in a real app, simplified here
            $targetFile = $targetDir . $fileName;
            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
                $imagePath = 'image/' . $fileName;
            }
        }

        $newProduct = [
            'id' => uniqid('p'),
            'name' => $name,
            'price' => $price,
            'image' => $imagePath,
            'category' => $category
        ];

        $products[] = $newProduct;
        file_put_contents($productsFile, json_encode($products, JSON_PRETTY_PRINT));
        header("Location: products.php?status=success&msg=Product Added");
        exit;
    }

    if ($action === 'delete') {
        $id = $_POST['id'] ?? '';
        // Filter out the product with the matching ID
        $products = array_filter($products, function($p) use ($id) {
            return $p['id'] !== $id;
        });
        
        // Re-index array
        $products = array_values($products);
        file_put_contents($productsFile, json_encode($products, JSON_PRETTY_PRINT));
        header("Location: products.php?status=success&msg=Product Deleted");
        exit;
    }
}
?>
