<?php
include 'auth.php';
checkLogin();

// Load Config for Sidebar
$imageMap = include 'config_images.php';

$productsFile = 'data/products.json';
$products = [];
if (file_exists($productsFile)) {
    $products = json_decode(file_get_contents($productsFile), true);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Store - TGB Admin</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        :root {
            --sidebar-width: 260px;
            --header-height: 70px;
            --admin-bg: #f3f4f6;
            --admin-text: #1f2937;
            --accent-color: #d4af37;
        }
        
        body { margin: 0; font-family: 'Inter', sans-serif; background: var(--admin-bg); color: var(--admin-text); display: flex; min-height: 100vh; }
        
        /* Updated Sidebar Styles */
        .sidebar {
            width: var(--sidebar-width);
            background: #0a192f;
            color: white;
            flex-shrink: 0;
            display: flex;
            flex-direction: column;
            position: fixed;
            height: 100vh;
            left: 0; top: 0;
            z-index: 50;
        }

        .sidebar-header {
            height: var(--header-height);
            display: flex;
            align-items: center;
            padding: 0 1.5rem;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .sidebar-header h2 { font-size: 1.25rem; font-weight: 700; color: var(--accent-color); margin: 0; }
        
        .nav-menu { padding: 1.5rem 1rem; flex: 1; overflow-y: auto; }
        
        /* Nav Groups */
        .nav-group { margin-bottom: 0.5rem; }
        
        .nav-group-title, .nav-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0.75rem 1rem;
            color: #9ca3af;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.2s;
            font-weight: 500;
            text-decoration: none;
        }

        .nav-group-title:hover, .nav-item:hover { background: rgba(255,255,255,0.05); color: white; }
        .nav-group-title.active, .nav-item.active { color: white; }
        .nav-item.active { background: rgba(212, 175, 55, 0.1); border-left: 3px solid var(--accent-color); }

        .group-chevron { transition: transform 0.2s; width: 16px; }
        .group-chevron.rotate { transform: rotate(180deg); }

        .nav-group-items {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-out;
            padding-left: 1rem;
        }
        .nav-group-items.show { max-height: 500px; transition: max-height 0.3s ease-in; }

        .nav-sub-item {
            display: flex;
            align-items: center;
            padding: 0.6rem 1rem;
            color: #6b7280; /* Dimmer */
            text-decoration: none;
            font-size: 0.9rem;
            border-left: 1px solid rgba(255,255,255,0.1);
            color: #9ca3af;
        }
        .nav-sub-item:hover { color: white; }
        .nav-sub-item.active { color: var(--accent-color); font-weight: 600; border-left-color: var(--accent-color); background: rgba(255,255,255,0.02); }

        .sidebar-footer { padding: 1.5rem; border-top: 1px solid rgba(255,255,255,0.1); }
        .logout-btn { display: flex; align-items: center; gap: 0.5rem; color: #f87171; text-decoration: none; font-size: 0.9rem; }
        
        .main-content { 
            margin-left: var(--sidebar-width); 
            flex: 1; 
            padding: 2rem; 
            width: calc(100% - 260px);
        }
        .page-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem; }
        .page-title { font-size: 1.75rem; font-weight: 700; color: #111827; margin: 0; }
        
        .btn-primary { background: #0a192f; color: white; padding: 0.6rem 1.2rem; border-radius: 6px; border: none; cursor: pointer; display: flex; align-items: center; gap: 0.5rem; font-weight: 500; }
        .btn-primary:hover { background: #112240; }
        
        /* Product Table */
        .table-card { background: white; border-radius: 12px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); overflow: hidden; margin-bottom: 2rem; padding: 1rem; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 1rem; text-align: left; border-bottom: 1px solid #e5e7eb; }
        th { background: #f9fafb; font-weight: 600; color: #4b5563; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.05em; }
        tr:last-child td { border-bottom: none; }
        .product-img { width: 40px; height: 40px; border-radius: 4px; object-fit: cover; background: #eee; }
        
        .action-btn { background: none; border: none; cursor: pointer; padding: 4px; border-radius: 4px; transition: background 0.2s; }
        .btn-delete { color: #ef4444; }
        .btn-delete:hover { background: #fee2e2; }

        /* Modal */
        .modal-overlay { 
            position: fixed; top: 0; left: 0; width: 100%; height: 100%; 
            background: rgba(0,0,0,0.6); 
            display: none; align-items: center; justify-content: center; 
            z-index: 2000; 
            backdrop-filter: blur(4px);
        }
        .modal { 
            background: white; padding: 2rem; border-radius: 12px; 
            width: 90%; max-width: 500px; 
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25); 
        }
        .modal h2 { margin-top: 0; margin-bottom: 1.5rem; }
        .form-group { margin-bottom: 1.25rem; }
        .form-group label { display: block; margin-bottom: 0.5rem; font-weight: 500; font-size: 0.9rem; }
        .form-group input, .form-group select { width: 100%; padding: 0.6rem; border: 1px solid #d1d5db; border-radius: 6px; font-size: 1rem; }
        .modal-actions { display: flex; justify-content: flex-end; gap: 0.75rem; margin-top: 2rem; }
        
        /* DataTables Customization */
        .dataTables_wrapper .dataTables_length select { border: 1px solid #d1d5db; padding: 0.3rem; border-radius: 4px; }
        .dataTables_wrapper .dataTables_filter input { border: 1px solid #d1d5db; padding: 0.4rem; border-radius: 4px; margin-left: 0.5rem; }
    </style>
</head>
<body>

<?php include 'sidebar.php'; ?>

<main class="main-content">
    <div class="page-header">
        <h1 class="page-title">Store Products</h1>
        <button class="btn-primary" onclick="openAddModal()">
            <i data-lucide="plus" style="width: 18px;"></i> Add Product
        </button>
    </div>

    <?php if(isset($_GET['msg'])): ?>
        <div style="padding: 1rem; border-radius: 8px; margin-bottom: 1.5rem; background: #ecfdf5; color: #047857; border: 1px solid #a7f3d0;">
            <?php echo htmlspecialchars($_GET['msg']); ?>
        </div>
    <?php endif; ?>

    <div class="table-card">
        <table id="productsTable" class="display">
            <thead>
                <tr>
                    <th style="width: 60px;">Image</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th style="text-align: right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if(empty($products)): ?>
                    <!-- Empty state handled by PHP but DataTables handles empty tables gracefully too -->
                <?php else: foreach($products as $p): 
                    $imgSrc = !empty($p['image']) ? '../' . $p['image'] : 'https://via.placeholder.com/40';
                ?>
                    <tr>
                        <td>
                            <img src="<?php echo $imgSrc; ?>" class="product-img" alt="Product">
                        </td>
                        <td>
                            <strong style="display: block; color: #111827;"><?php echo htmlspecialchars($p['name']); ?></strong>
                            <small style="color: #6b7280;"><?php echo htmlspecialchars($p['category']); ?></small>
                        </td>
                        <td style="font-family: monospace; font-size: 1rem;"><?php echo htmlspecialchars($p['price']); ?></td>
                        <td style="text-align: right;">
                            <form action="product_handler.php" method="POST" style="display: inline;" onsubmit="return confirm('Delete this product?');">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="id" value="<?php echo $p['id']; ?>">
                                <button type="submit" class="action-btn btn-delete" title="Delete">
                                    <i data-lucide="trash-2" style="width: 18px;"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; endif; ?>
            </tbody>
        </table>
    </div>
</main>

<!-- Add Product Modal -->
<div id="addModal" class="modal-overlay">
    <div class="modal">
        <h2>Add New Product</h2>
        <form action="product_handler.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="action" value="add">
            
            <div class="form-group">
                <label>Product Name</label>
                <input type="text" name="name" required placeholder="e.g. Matte Clay">
            </div>
            
            <div class="form-group">
                <label>Price</label>
                <input type="text" name="price" required placeholder="e.g. R 250.00">
            </div>

            <div class="form-group">
                <label>Product Image</label>
                <input type="file" name="image" accept="image/*">
            </div>

            <div class="modal-actions">
                <button type="button" class="btn btn-secondary" onclick="closeAddModal()" style="background: #e5e7eb; border: none; padding: 0.6rem 1.2rem; border-radius: 6px; cursor: pointer;">Cancel</button>
                <button type="submit" class="btn-primary">Add Product</button>
            </div>
        </form>
    </div>
</div>

<script>
    lucide.createIcons();
    
    $(document).ready(function() {
        $('#productsTable').DataTable({
            paging: true,
            searching: true,
            info: true
        });
    });

    function openAddModal() { document.getElementById('addModal').style.display = 'flex'; }
    function closeAddModal() { document.getElementById('addModal').style.display = 'none'; }
    document.getElementById('addModal').addEventListener('click', function(e) {
        if (e.target === this) closeAddModal();
    });
</script>

</body>
</html>
