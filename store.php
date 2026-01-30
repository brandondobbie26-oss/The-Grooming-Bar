<?php include 'include/head.php'; ?>
<?php include 'include/header.php'; ?>

<main>
    <!-- Page Header -->
    <section class="hero" style="min-height: 50vh; background: #000;">
        <div class="container">
            <div class="hero-content reveal">
                <h1>TGB SHOP.</h1>
                <p>Premium grooming products to keep you looking fresh between visits.</p>
            </div>
        </div>
    </section>

    <!-- Product Grid -->
    <section style="padding: var(--space-xl) 0; background: var(--color-white);">
        <div class="container">
            <div class="section-header reveal">
                <h2>Featured Products</h2>
                <p>Curated by our barbers and stylists.</p>
            </div>

            <div class="product-grid reveal">
                <?php
                $productsFile = 'admin/data/products.json';
                $products = [];
                if (file_exists($productsFile)) {
                    $jsonData = file_get_contents($productsFile);
                    $products = json_decode($jsonData, true);
                }

                if (!empty($products)) {
                    foreach ($products as $product) {
                        // Icon mapping based on name (simple heuristic)
                        $icon = 'shopping-bag';
                        if (stripos($product['name'], 'Beard') !== false) $icon = 'droplet';
                        if (stripos($product['name'], 'Pomade') !== false) $icon = 'award';
                        if (stripos($product['name'], 'Comb') !== false) $icon = 'scissors';
                        if (stripos($product['name'], 'Spray') !== false) $icon = 'wind';
                        if (stripos($product['name'], 'Bump') !== false) $icon = 'sparkles';
                        
                        // Image fallback
                        $imgStyle = "";
                        if (!empty($product['image'])) {
                            $imgStyle = "background: url('" . htmlspecialchars($product['image']) . "') center/cover;";
                        } else {
                            $imgStyle = "background: #222; display: flex; align-items: center; justify-content: center; color: #555;"; 
                        }
                        
                        echo '
                        <div class="product-card-3d">
                            <div class="cube-3d">
                                <div class="cube-face front product-face">
                                    <div class="floating-3d-icon"
                                        style="position: absolute; top: 10px; right: 10px; transform: translateZ(30px); animation: floatIcon 4s ease-in-out infinite;">
                                        <i data-lucide="' . $icon . '" style="width: 24px; height: 24px;"></i>
                                    </div>
                                    <div class="nice-frame" style="width: 100%; height: auto; flex: 1;">
                                        <div class="black-inner" style="' . $imgStyle . ' width: 100%; height: 100%;">
                                            ' . (empty($product['image']) ? 'NO IMAGE' : '') . '
                                        </div>
                                    </div>
                                    <div class="product-info" style="margin-top: 1rem;">
                                        <h3>' . htmlspecialchars($product['name']) . '</h3>
                                        <p class="price">' . htmlspecialchars($product['price']) . '</p>
                                    </div>
                                </div>
                                <div class="cube-face right"></div>
                                <div class="cube-face bottom"></div>
                            </div>
                        </div>';
                    }
                } else {
                    echo '<p style="grid-column: 1/-1; text-align: center; padding: 2rem;">No products available at the moment.</p>';
                }
                ?>
            </div>
        </div>
    </section>
</main>

<?php include 'include/footer.php'; ?>

<!-- Custom JS -->
<script src="js/app.js"></script>
<script>
    lucide.createIcons();
</script>
</body>
</html>