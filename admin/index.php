<?php
include 'auth.php';
checkLogin();

// Load Image Config
$imageMap = include 'config_images.php';

// Get Current Page (Default to first key)
$currentPage = isset($_GET['page']) ? $_GET['page'] : array_key_first($imageMap);
$currentSections = isset($imageMap[$currentPage]) ? $imageMap[$currentPage] : [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TGB Manager Dashboard</title>
    <link rel="stylesheet" href="../css/main.css"> <!-- Reuse site vars if helpful, or define fresh -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        :root {
            --sidebar-width: 260px;
            --header-height: 70px;
            --bg-color: #050505;
            --card-bg: #111111;
            --border-color: #2a2a2a;
            --text-primary: #e0e0e0;
            --text-secondary: #888888;
            --accent-color: #f59e0b; /* Amber/Orange from template */
            --accent-glow: rgba(245, 158, 11, 0.2);
            --success-color: #10b981;
            --danger-color: #ef4444;
        }
        
        * { box-sizing: border-box; }
        body { 
            margin: 0; 
            font-family: 'Consolas', 'Monaco', 'Courier New', monospace; /* Tech font */
            background: var(--bg-color); 
            color: var(--text-primary); 
            display: flex; 
            min-height: 100vh; 
        }
        
        /* Updated Sidebar Styles for Compatibility */
        .sidebar {
            width: var(--sidebar-width);
            background: #0a0a0a;
            border-right: 1px solid var(--border-color);
            color: var(--text-primary);
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
            justify-content: center;
            border-bottom: 1px solid var(--border-color);
            background: #080808;
        }
        
        .nav-menu { padding: 1.5rem 1rem; flex: 1; overflow-y: auto; }
        .nav-group { margin-bottom: 0.5rem; }
        
        .nav-group-title, .nav-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0.75rem 1rem;
            color: var(--text-secondary);
            border-radius: 4px; /* Sharper corners */
            cursor: pointer;
            transition: all 0.2s;
            font-weight: 500;
            text-decoration: none;
            font-family: 'Inter', sans-serif; /* Keep nav readable */
            font-size: 0.9rem;
            border: 1px solid transparent;
        }
        
        .nav-group-title:hover, .nav-item:hover { 
            background: rgba(255,255,255,0.03); 
            color: var(--text-primary); 
            border-color: var(--border-color);
        }
        .nav-group-title.active, .nav-item.active { 
            color: var(--accent-color); 
            background: rgba(245, 158, 11, 0.05);
            border-color: rgba(245, 158, 11, 0.3);
        }
        
        .nav-sub-item {
            display: flex;
            align-items: center;
            padding: 0.5rem 1rem;
            color: var(--text-secondary);
            text-decoration: none;
            font-size: 0.85rem;
            border-left: 1px solid var(--border-color);
            margin-left: 1rem;
            font-family: 'Inter', sans-serif;
        }
        .nav-sub-item:hover { color: var(--text-primary); }
        .nav-sub-item.active { 
            color: var(--accent-color); 
            border-left-color: var(--accent-color); 
            background: linear-gradient(90deg, rgba(245, 158, 11, 0.1), transparent);
        }

        .sidebar-footer { padding: 1.5rem; border-top: 1px solid var(--border-color); }
        .logout-btn { display: flex; align-items: center; gap: 0.5rem; color: var(--danger-color); text-decoration: none; font-size: 0.9rem; font-family: 'Inter', sans-serif;}

        /* Main Content */
        .main-content {
            margin-left: var(--sidebar-width);
            flex: 1;
            padding: 2rem;
            width: calc(100% - 260px);
        }

        .page-header {
            margin-bottom: 2rem;
            border-bottom: 1px solid var(--border-color);
            padding-bottom: 1rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .page-title {
            font-size: 1.5rem;
            font-weight: 400;
            color: var(--text-primary);
            text-transform: uppercase;
            letter-spacing: 2px;
            margin: 0;
        }
        .page-indicator {
            font-size: 0.8rem;
            color: var(--accent-color);
            background: rgba(245, 158, 11, 0.1);
            padding: 4px 8px;
            border: 1px solid rgba(245, 158, 11, 0.3);
            border-radius: 2px;
        }

        /* Tech Card / Panel */
        .section-block { margin-bottom: 3rem; }
        .section-title {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 1rem;
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--accent-color);
            text-transform: uppercase;
            letter-spacing: 1px;
            border-left: 3px solid var(--accent-color);
            padding-left: 10px;
        }

        .table-container { 
            background: var(--card-bg); 
            border: 1px solid var(--border-color); 
            border-radius: 4px; /* Tech feel */
            box-shadow: 0 0 20px rgba(0,0,0,0.5); 
            overflow: hidden; 
            margin-bottom: 2rem; 
        }

        h4.table-header {
            margin: 0;
            padding: 1rem;
            background: rgba(255,255,255,0.02);
            border-bottom: 1px solid var(--border-color);
            font-size: 0.8rem;
            color: var(--text-secondary);
            text-transform: uppercase;
            letter-spacing: 1px;
            display: flex;
            justify-content: space-between;
        }
        h4.table-header span.badge {
            background: #222;
            padding: 2px 6px;
            border-radius: 2px;
            font-size: 0.7rem;
            border: 1px solid #333;
        }

        /* Table Styling */
        table.datatable { width: 100%; border-collapse: separate; border-spacing: 0; }
        th, td { 
            padding: 1rem; 
            text-align: left; 
            border-bottom: 1px solid var(--border-color); 
            vertical-align: middle; 
            font-size: 0.85rem;
            color: var(--text-secondary);
        }
        th { 
            background: rgba(255,255,255,0.03); 
            color: var(--text-primary); 
            font-weight: 600; 
            text-transform: uppercase; 
            letter-spacing: 0.05em;
            border-bottom: 2px solid var(--border-color);
            font-size: 0.75rem;
        }
        tr:last-child td { border-bottom: none; }
        tr:hover td { 
            background: rgba(255,255,255,0.02); 
            color: var(--text-primary);
        }
        
        /* Specific Columns */
        td strong { color: var(--text-primary); font-weight: 500; }
        
        .table-img-preview { 
            width: 40px; 
            height: 40px; 
            object-fit: cover; 
            border-radius: 2px; 
            border: 1px solid var(--border-color);
            background: #000;
        }

        /* Badges & Buttons */
        .status-badge {
            display: inline-flex; 
            align-items: center; 
            padding: 2px 8px; 
            border-radius: 2px; 
            font-size: 0.7rem; 
            font-weight: 600; 
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .status-active { background: rgba(16, 185, 129, 0.1); color: var(--success-color); border: 1px solid rgba(16, 185, 129, 0.3); }
        .status-missing { background: rgba(239, 68, 68, 0.1); color: var(--danger-color); border: 1px solid rgba(239, 68, 68, 0.3); }

        .btn-replace-sm {
            background: transparent; 
            border: 1px solid var(--border-color); 
            color: var(--text-secondary); 
            padding: 0.3rem 0.8rem; 
            border-radius: 2px; 
            cursor: pointer; 
            font-size: 0.75rem; 
            display: inline-flex; 
            align-items: center; 
            gap: 0.4rem;
            transition: all 0.2s;
            text-decoration: none;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-family: 'Consolas', monospace;
        }
        .btn-replace-sm:hover {
            border-color: var(--accent-color);
            color: var(--accent-color);
            background: rgba(245, 158, 11, 0.1);
            box-shadow: 0 0 10px rgba(245, 158, 11, 0.2);
        }

        /* Modal */
        .modal-overlay { 
            position: fixed; top: 0; left: 0; width: 100%; height: 100%; 
            background: rgba(0,0,0,0.8); 
            display: none; align-items: center; justify-content: center; 
            z-index: 2000; 
            backdrop-filter: blur(5px);
        }
        .modal { 
            background: var(--card-bg); 
            padding: 2rem; 
            border: 1px solid var(--border-color);
            border-radius: 4px;
            width: 90%; max-width: 500px; 
            box-shadow: 0 0 50px rgba(0,0,0,0.5); 
            color: var(--text-primary);
        }
        .modal h2 { margin-top: 0; color: var(--accent-color); font-weight: 400; text-transform: uppercase; letter-spacing: 2px; font-size: 1.2rem; }
        
        input, textarea, select {
            background: #080808;
            border: 1px solid var(--border-color);
            color: var(--text-primary);
            padding: 0.8rem;
            border-radius: 2px;
            width: 100%;
            font-family: inherit;
        }
        input:focus, textarea:focus { outline: none; border-color: var(--accent-color); }
        
        .btn-submit {
            background: var(--accent-color);
            color: #000;
            border: none;
            padding: 0.8rem 1.5rem;
            font-weight: 700;
            text-transform: uppercase;
            cursor: pointer;
            border-radius: 2px;
        }
        .btn-cancel {
            background: transparent;
            color: var(--text-secondary);
            border: 1px solid var(--border-color);
            padding: 0.8rem 1.5rem;
            text-transform: uppercase;
            cursor: pointer;
            margin-right: 1rem;
            border-radius: 2px;
        }

    </style>
</head>
<body>

<?php include 'sidebar.php'; 

// Load Content Config & Data
$textMap = include __DIR__ . '/config_content.php';
$contentFile = __DIR__ . '/data/content.json';
$siteContent = file_exists($contentFile) ? json_decode(file_get_contents($contentFile), true) : [];

// Initial Logic
if (isset($_GET['page'])) {
    $currentPage = urldecode($_GET['page']);
} else {
    $currentPage = array_key_exists('Home Page', $imageMap) ? 'Home Page' : array_key_first($imageMap);
}

// Get Image Sections for current page
$imageSections = $imageMap[$currentPage] ?? [];
// Get Text Sections for current page
$textSections = $textMap[$currentPage] ?? [];

// Get all unique section names from both maps
$allSections = array_unique(array_merge(array_keys($imageSections), array_keys($textSections)));
?>

<!-- Main Content -->
<main class="main-content">
    
    <div class="page-header">
        <h1 class="page-title"><?php echo htmlspecialchars($currentPage); ?></h1>
    </div>

    <?php if(isset($_GET['msg'])): ?>
        <div style="padding: 1rem; border-radius: 8px; margin-bottom: 2rem; 
            background: <?php echo $_GET['status'] == 'success' ? '#ecfdf5' : '#fef2f2'; ?>; 
            color: <?php echo $_GET['status'] == 'success' ? '#047857' : '#b91c1c'; ?>;
            border: 1px solid <?php echo $_GET['status'] == 'success' ? '#a7f3d0' : '#fecaca'; ?>;">
            <i data-lucide="<?php echo $_GET['status'] == 'success' ? 'check-circle' : 'alert-circle'; ?>" style="width: 18px; vertical-align: middle; margin-right: 6px;"></i>
            <?php echo htmlspecialchars($_GET['msg']); ?>
        </div>
    <?php endif; ?>

    <?php if (empty($allSections)): ?>
        <div class="section-block" style="text-align: center; color: #6b7280; padding: 4rem;">
            <i data-lucide="layout-template" style="width: 48px; margin-bottom: 1rem; opacity: 0.5;"></i>
            <p>No content mapped for this page.</p>
        </div>
    <?php endif; ?>

    <?php 
    // Merge Maps for Single Table View
    $unifiedSections = [];
    foreach ($imageMap as $page => $sections) {
        if ($page !== $currentPage) continue;
        foreach ($sections as $secName => $imgs) {
            $unifiedSections[$secName]['images'] = $imgs;
        }
    }
    foreach ($textMap as $page => $sections) {
        if ($page !== $currentPage) continue;
        foreach ($sections as $secName => $fields) {
            $unifiedSections[$secName]['text'] = $fields;
        }
    }
    ?>

    <div class="section-block">
        <div class="table-container">
            <h4 class="table-header">
                <div>
                    <i data-lucide="layout-grid" style="width: 14px; color: var(--accent-color); margin-right: 8px;"></i>
                    <?php echo htmlspecialchars($currentPage); ?> <span style="opacity: 0.5;">// SECTIONS</span>
                </div>
                <span class="badge">MASTER LIST</span>
            </h4>
            
            <table class="datatable">
                <thead>
                    <tr>
                        <th style="width: 30%;">SECTION NAME</th>
                        <th>CONTENT SUMMARY</th>
                        <th style="text-align: right; width: 120px;">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach($unifiedSections as $sectionName => $data): 
                    $textCount = isset($data['text']) ? count($data['text']) : 0;
                    $imgCount = isset($data['images']) ? count($data['images']) : 0;
                ?>
                    <tr>
                        <td>
                            <strong style="color: var(--accent-color); font-size: 0.95rem;"><?php echo htmlspecialchars($sectionName); ?></strong>
                        </td>
                        <td>
                            <div style="display: flex; gap: 1rem;">
                                <?php if($textCount > 0): ?>
                                    <span class="status-badge status-active" style="color: #bbb; border-color: #444;">
                                        <i data-lucide="type" style="width: 10px; margin-right: 4px;"></i> <?php echo $textCount; ?> Text Fields
                                    </span>
                                <?php endif; ?>
                                <?php if($imgCount > 0): ?>
                                    <span class="status-badge status-active" style="color: #bbb; border-color: #444;">
                                        <i data-lucide="image" style="width: 10px; margin-right: 4px;"></i> <?php echo $imgCount; ?> Images
                                    </span>
                                <?php endif; ?>
                            </div>
                        </td>
                        <td style="text-align: right;">
                            <button class="btn-replace-sm" onclick="openSectionModal('<?php echo md5($sectionName); ?>')">
                                <i data-lucide="edit" style="width: 12px;"></i> MANAGE
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modals for Each Section -->
    <?php foreach($unifiedSections as $sectionName => $data): 
        $modalId = md5($sectionName);
    ?>
    <div id="modal-<?php echo $modalId; ?>" class="modal-overlay">
        <div class="modal" style="max-width: 700px;">
            <h2><?php echo htmlspecialchars($sectionName); ?></h2>
            <form action="section_handler.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="redirect" value="index.php?page=<?php echo urlencode($currentPage); ?>">
                
                <div style="max-height: 60vh; overflow-y: auto; padding-right: 10px; margin-bottom: 2rem;">
                    
                    <!-- Text Fields -->
                    <?php if(isset($data['text'])): ?>
                        <h4 style="color: var(--text-secondary); border-bottom: 1px solid var(--border-color); padding-bottom: 5px; margin-bottom: 15px;">Text Content</h4>
                        <?php foreach($data['text'] as $key => $label): 
                            $val = $siteContent[$key] ?? '';
                        ?>
                            <div class="form-group" style="margin-bottom: 1.5rem;">
                                <label style="display: block; color: var(--accent-color); font-size: 0.8rem; margin-bottom: 5px; text-transform: uppercase;"><?php echo htmlspecialchars($label); ?></label>
                                <textarea name="text[<?php echo $key; ?>]" rows="3"><?php echo htmlspecialchars($val); ?></textarea>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>

                    <!-- Image Fields -->
                    <?php if(isset($data['images'])): ?>
                        <h4 style="color: var(--text-secondary); border-bottom: 1px solid var(--border-color); padding-bottom: 5px; margin-bottom: 15px; margin-top: 2rem;">Images</h4>
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px;">
                        <?php foreach($data['images'] as $filename): 
                             $path = "../image/" . $filename;
                             $src = file_exists($path) ? $path . "?t=" . time() : "https://via.placeholder.com/150?text=Missing";
                        ?>
                            <div style="background: rgba(255,255,255,0.03); padding: 10px; border-radius: 4px; border: 1px solid var(--border-color);">
                                <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 10px;">
                                    <img src="<?php echo $src; ?>" style="width: 50px; height: 50px; object-fit: cover; border-radius: 4px;">
                                    <div>
                                        <strong style="display: block; font-size: 0.8rem; color: #fff;"><?php echo $filename; ?></strong>
                                    </div>
                                </div>
                                <input type="file" name="images[<?php echo $filename; ?>]" style="font-size: 0.8rem; padding: 5px;">
                            </div>
                        <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                </div>

                <div class="modal-actions" style="display: flex; justify-content: flex-end;">
                    <button type="button" class="btn-cancel" onclick="closeSectionModal('<?php echo $modalId; ?>')">Cancel</button>
                    <button type="submit" class="btn-submit">Save Changes</button>
                </div>
            </form>
        </div>
    </div>
    <?php endforeach; ?>

</main>

<script>
    lucide.createIcons();
    
    $(document).ready(function() {
        $('.datatable').DataTable({ paging: false, info: false, searching: false });
    });

    function openSectionModal(id) {
        document.getElementById('modal-' + id).style.display = 'flex';
    }

    function closeSectionModal(id) {
        document.getElementById('modal-' + id).style.display = 'none';
        // Optional: Reset form? Not strictly necessary if re-opening fetches same state
    }

    window.onclick = function(event) {
        if (event.target.classList.contains('modal-overlay')) {
            event.target.style.display = 'none';
        }
    }
</script>

</body>
</html>
