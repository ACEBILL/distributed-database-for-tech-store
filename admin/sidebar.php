<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="asset/css/admin/sidebar.css">
    <!-- <link rel="stylesheet" href="asset/css/admin/root.css"> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
</head>
<body>
    <?php
      $displayName = $_SESSION['username'] ?? 'Admin';
      $displayRole = ((int)($_SESSION['role'] ?? 0) === 1) ? 'Admin' : 'User';
    ?>
    <aside class="sidebar">
      <div class="brand">
        <div class="logo"><i class="fa-solid fa-bag-shopping"></i></div>
        <div class="t">
          <b>TechStore Admin</b>
          <span>MANAGEMENT</span>
        </div>
      </div>

      <nav class="nav" aria-label="Sidebar">
        <a class="item <?php echo $usecase === 'dashboard' ? 'active' : ''; ?>" href="index1st.php?usecase=dashboard"><i class="fa-solid fa-table-columns"></i> Dashboard</a>
        <a class="item <?php echo in_array($usecase, ['user', 'user_edit'], true) ? 'active' : ''; ?>" href="index1st.php?usecase=user"><i class="fa-solid fa-users"></i> Users</a>
        <a class="item <?php echo $usecase === 'order' ? 'active' : ''; ?>" href="index1st.php?usecase=order"><i class="fa-solid fa-cart-shopping"></i> Orders</a>
        <a class="item <?php echo in_array($usecase, ['categories', 'categories_new'], true) ? 'active' : ''; ?>" href="index1st.php?usecase=categories"><i class="fa-solid fa-tags"></i> Categories</a>
        <a class="item <?php echo in_array($usecase, ['products', 'products_new'], true) ? 'active' : ''; ?>" href="index1st.php?usecase=products"><i class="fa-solid fa-box"></i> Products</a>
        <a class="item <?php echo $usecase === 'inventory' ? 'active' : ''; ?>" href="index1st.php?usecase=inventory"><i class="fa-solid fa-warehouse"></i> Inventory</a>

        <div class="group-title">Reporting</div>
        <a class="item" href="#"><i class="fa-solid fa-chart-line"></i> Analytics</a>
        <a class="item" href="#"><i class="fa-solid fa-shield-halved"></i> Security Logs</a>
        <a class="item" href="#"><i class="fa-solid fa-gear"></i> Settings</a>
      </nav>

      <div class="side-bottom">
        <div class="user">
          <div class="avatar"><i class="fa-solid fa-user"></i></div>
          <div class="meta">
            <b><?php echo htmlspecialchars((string)$displayName, ENT_QUOTES, 'UTF-8'); ?></b>
            <span><?php echo htmlspecialchars($displayRole, ENT_QUOTES, 'UTF-8'); ?></span>
          </div>
        </div>
        <a class="logout" href="index1st.php?action=logout" title="Logout"><i class="fa-solid fa-right-from-bracket"></i></a>
      </div>
    </aside>
</body>
</html>