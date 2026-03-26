<?php
require_once __DIR__ . '/../connectdb.php';

$products = [];
$loadError = '';
$currentPage = (int)($_GET['page'] ?? 1);
$productsPerPage = 6;

try {
  $db = new DataProvider();
  $result = $db->executeQuery(
    "SELECT sp.ma_sp, sp.ten_sp, sp.sl_ton_kho, sp.gia_ban_hien_tai, sp.trang_thai, dm.ten_danh_muc
     FROM san_pham sp
     LEFT JOIN danh_muc dm ON dm.danh_muc_id = sp.danh_muc_id
     ORDER BY sp.ma_sp DESC"
  );

  while ($row = $result->fetch_assoc()) {
    $products[] = $row;
  }
} catch (Exception $e) {
  $loadError = $e->getMessage();
}

// Pagination calculations
$totalProducts = count($products);
$totalPages = ceil($totalProducts / $productsPerPage);

// Ensure current page is valid
if ($currentPage < 1) {
  $currentPage = 1;
}
if ($currentPage > $totalPages && $totalPages > 0) {
  $currentPage = $totalPages;
}

// Calculate start index for array slicing
$startIndex = ($currentPage - 1) * $productsPerPage;
$paginatedProducts = array_slice($products, $startIndex, $productsPerPage);

// Calculate "showing X to Y of Z"
$showingStart = $totalProducts > 0 ? $startIndex + 1 : 0;
$showingEnd = min($startIndex + $productsPerPage, $totalProducts);

function e($value)
{
  return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}

function productIconClass($categoryName)
{
  $name = strtolower((string)$categoryName);

  if (strpos($name, 'fashion') !== false || strpos($name, 'shoe') !== false) {
    return 'fa-solid fa-shoe-prints';
  }

  if (strpos($name, 'home') !== false || strpos($name, 'furniture') !== false) {
    return 'fa-solid fa-chair';
  }

  if (strpos($name, 'accessor') !== false) {
    return 'fa-solid fa-mobile-screen-button';
  }

  return 'fa-solid fa-box';
}

function productThumbClass($categoryName)
{
  $name = strtolower((string)$categoryName);

  if (strpos($name, 'fashion') !== false || strpos($name, 'shoe') !== false) {
    return 'shoe';
  }

  if (strpos($name, 'home') !== false || strpos($name, 'furniture') !== false) {
    return 'chair';
  }

  if (strpos($name, 'accessor') !== false) {
    return 'watch';
  }

  return 'headphone';
}

function categoryBadgeClass($categoryName)
{
  $name = strtolower((string)$categoryName);

  if (strpos($name, 'fashion') !== false) {
    return 'fashion';
  }

  if (strpos($name, 'home') !== false) {
    return 'home';
  }

  return 'electronic';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
    <!-- <link rel="stylesheet" href="asset/css/admin/root.css"> -->
    <link rel="stylesheet" href="asset/css/admin/products.css">
</head>
<body>
    <!-- MAIN -->
    <main class="main">
      <div class="topbar">
        <div class="search">
          <i class="fa-solid fa-magnifying-glass"></i>
          <input type="text" placeholder="Tìm sản phẩm..."/>
        </div>

        <div class="actions">
          <a class="iconbtn" href="#" title="Notifications"><i class="fa-regular fa-bell"></i></a>
          <span class="tag">
            <i class="fa-solid fa-circle" style="color:rgba(34,197,94,.95)"></i>
            LIVE SERVER
          </span>
          <a class="iconbtn" href="#" title="Account"><i class="fa-regular fa-user"></i></a>
        </div>
      </div>

      <section class="page-head">
        <div>
          <h1>Product Management</h1>
          <p>
            Kiểm soát kho hàng, cập nhật giá bán và quản lý trạng thái hiển thị sản phẩm trên TechStore.
          </p>
        </div>

        <div class="head-actions">
          <a href="#" class="btn">
            <i class="fa-solid fa-layer-group"></i>
            Add Category
          </a>
          <a href="index1st.php?usecase=products_new" class="btn primary">
            <i class="fa-solid fa-plus"></i>
            Add New Product
          </a>
        </div>
      </section>

      <section class="product-card">
        <?php if ($loadError !== ''): ?>
          <div style="margin:0 0 12px; padding:12px 14px; border-radius:12px; border:1px solid #dc2626; background:#fee2e2; color:#7f1d1d;">
            <?php echo e($loadError); ?>
          </div>
        <?php endif; ?>

        <div class="table-toolbar">
          <div class="filter-group">
            <select class="filter-select">
              <option>CATEGORY: All Categories</option>
              <option>Electronics</option>
              <option>Fashion</option>
              <option>Home Decor</option>
            </select>

            <select class="filter-select">
              <option>STATUS: All Status</option>
              <option>Published</option>
              <option>Hidden</option>
              <option>Out of Stock</option>
            </select>
          </div>

          <div class="table-tools">
            <a href="#" class="tool-icon" title="Filter"><i class="fa-solid fa-filter"></i></a>
            <a href="#" class="tool-icon" title="Refresh"><i class="fa-solid fa-rotate-right"></i></a>
          </div>
        </div>

        <div class="table-wrap">
          <table class="product-table">
            <thead>
              <tr>
                <th>PRODUCT CODE</th>
                <th>PRODUCT NAME</th>
                <th>CATEGORY</th>
                <th>PRICE</th>
                <th>STOCK</th>
                <th>STATUS</th>
                <th style="text-align:center;">ACTIONS</th>
              </tr>
            </thead>

            <tbody>
              <?php if (empty($products)): ?>
                <tr>
                  <td colspan="7" style="text-align:center; padding:24px; color:#9ca3af;">Chua co san pham nao trong database.</td>
                </tr>
              <?php else: ?>
                <?php foreach ($paginatedProducts as $product): ?>
                  <?php
                    $stock = (int)($product['sl_ton_kho'] ?? 0);
                    $isActive = (int)($product['trang_thai'] ?? 0) === 1;
                    $stockDotClass = $stock > 10 ? 'green' : ($stock > 0 ? 'amber' : 'gray');
                    $categoryName = $product['ten_danh_muc'] ?: 'Uncategorized';
                  ?>
                  <tr>
                    <td><span class="code">#<?php echo e($product['ma_sp']); ?></span></td>
                    <td>
                      <div class="product-info">
                        <div class="thumb <?php echo e(productThumbClass($categoryName)); ?>"><i class="<?php echo e(productIconClass($categoryName)); ?>"></i></div>
                        <div class="product-name"><?php echo e($product['ten_sp']); ?></div>
                      </div>
                    </td>
                    <td><span class="badge cat <?php echo e(categoryBadgeClass($categoryName)); ?>"><?php echo e($categoryName); ?></span></td>
                    <td><span class="price">$<?php echo e(number_format((float)($product['gia_ban_hien_tai'] ?? 0), 2)); ?></span></td>
                    <td>
                      <div class="stock">
                        <span class="dot <?php echo e($stockDotClass); ?>"></span>
                        <?php echo e((string)$stock); ?> units
                      </div>
                    </td>
                    <td><span class="toggle <?php echo $isActive ? 'on' : ''; ?>"></span></td>
                    <td class="actions-col">
                      <div class="action-group">
                        <a href="#" class="action-btn restock" title="Restock">
                          <i class="fa-solid fa-boxes-stacked"></i>
                        </a>
                        <a href="#" class="action-btn edit" title="Edit">
                          <i class="fa-solid fa-pen"></i>
                        </a>
                      </div>
                    </td>
                  </tr>
                <?php endforeach; ?>
              <?php endif; ?>
            </tbody>
          </table>
        </div>

        <div class="table-footer">
          <div class="table-note">Showing <?php echo e((string)$showingStart); ?> to <?php echo e((string)$showingEnd); ?> of <?php echo e((string)$totalProducts); ?> products</div>

          <?php if ($totalPages > 1): ?>
            <div class="pagination">
              <?php if ($currentPage > 1): ?>
                <a href="?usecase=products&page=<?php echo $currentPage - 1; ?>" class="page-btn">Previous</a>
              <?php else: ?>
                <span class="page-btn" style="opacity: 0.5; cursor: not-allowed;">Previous</span>
              <?php endif; ?>

              <?php 
                // Show page numbers (max 5 pages visible)
                $startPage = max(1, $currentPage - 2);
                $endPage = min($totalPages, $currentPage + 2);
                
                if ($startPage > 1) {
                  echo '<a href="?usecase=products&page=1" class="page-btn">1</a>';
                  if ($startPage > 2) {
                    echo '<span class="page-btn" style="background: none; cursor: default;">...</span>';
                  }
                }
                
                for ($i = $startPage; $i <= $endPage; $i++) {
                  if ($i === $currentPage) {
                    echo '<a href="?usecase=products&page=' . $i . '" class="page-btn active">' . $i . '</a>';
                  } else {
                    echo '<a href="?usecase=products&page=' . $i . '" class="page-btn">' . $i . '</a>';
                  }
                }
                
                if ($endPage < $totalPages) {
                  if ($endPage < $totalPages - 1) {
                    echo '<span class="page-btn" style="background: none; cursor: default;">...</span>';
                  }
                  echo '<a href="?usecase=products&page=' . $totalPages . '" class="page-btn">' . $totalPages . '</a>';
                }
              ?>

              <?php if ($currentPage < $totalPages): ?>
                <a href="?usecase=products&page=<?php echo $currentPage + 1; ?>" class="page-btn">Next</a>
              <?php else: ?>
                <span class="page-btn" style="opacity: 0.5; cursor: not-allowed;">Next</span>
              <?php endif; ?>
            </div>
          <?php endif; ?>
        </div>
      </section>
    </main>
</body>
</html>