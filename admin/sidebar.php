<?php
// Ensure config is loaded for the dropdown
if (!isset($imageMap)) {
    $imageMap = include __DIR__ . '/config_images.php'; // Absolute path safe
}

// Check if we are in the 'products' section
$currentScript = basename($_SERVER['PHP_SELF']);
$isStoreActive = ($currentScript === 'products.php');
$isWebManagerActive = (!$isStoreActive && isset($_GET['page'])); // If page is set, we are likely in Web Manager
// If simple index.php visit without parems, default to first content page, so Web Manager is active.
if ($currentScript === 'index.php') $isWebManagerActive = true; 

?>
<aside class="sidebar">
    <div class="sidebar-header" style="justify-content: center;">
        <img src="../image/logo.jpeg" alt="Logo" style="height: 60px; width: 60px; border-radius: 50%; object-fit: cover; border: 2px solid var(--accent-color);">
    </div>
    
    <nav class="nav-menu">
        <!-- Web Manager Group -->
        <div class="nav-group">
            <div class="nav-group-title <?php echo $isWebManagerActive ? 'active' : ''; ?>" onclick="toggleGroup('webManagerGroup')">
                <div style="display: flex; align-items: center; gap: 10px;">
                    <i data-lucide="layout-dashboard" style="width: 18px;"></i>
                    <span>Web Manager</span>
                </div>
                <i data-lucide="chevron-down" class="group-chevron <?php echo $isWebManagerActive ? 'rotate' : ''; ?>"></i>
            </div>
            
            <div class="nav-group-items <?php echo $isWebManagerActive ? 'show' : ''; ?>" id="webManagerGroup">
                <?php foreach(array_keys($imageMap) as $page): 
                    $isActivePC = (isset($currentPage) && $page === $currentPage && !$isStoreActive) ? 'active' : '';
                    $icon = 'circle'; // Default sub-item icon
                    if (strpos($page, 'Home') !== false) $icon = 'home';
                ?>
                    <a href="index.php?page=<?php echo urlencode($page); ?>" class="nav-sub-item <?php echo $isActivePC; ?>">
                        <span><?php echo htmlspecialchars($page); ?></span>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Store Link -->
         <div class="nav-group">
            <a href="products.php" class="nav-item <?php echo $isStoreActive ? 'active' : ''; ?>">
                <i data-lucide="shopping-bag" style="width: 18px; margin-right: 10px;"></i>
                <span>Store</span>
            </a>
        </div>
    </nav>

    <div class="sidebar-footer">
        <a href="auth.php?logout=true" class="logout-btn">
            <i data-lucide="log-out" style="width: 18px;"></i>
            <span>Log Out</span>
        </a>
    </div>
</aside>

<script>
function toggleGroup(id) {
    const group = document.getElementById(id);
    const chevron = group.previousElementSibling.querySelector('.group-chevron');
    
    if (group.classList.contains('show')) {
        group.classList.remove('show');
        chevron.classList.remove('rotate');
    } else {
        group.classList.add('show');
        chevron.classList.add('rotate');
    }
}
</script>
