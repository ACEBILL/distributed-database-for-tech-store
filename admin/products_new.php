<?php
require_once __DIR__ . '/../connectdb.php';

$errors = [];
$successMessage = '';
$categories = [];
$db = null;

$formData = [
    'ma_sp' => '',
    'ten_sp' => '',
    'danh_muc_id' => '',
    'mo_ta' => '',
    'gia_nhap_hien_tai' => '0',
    'gia_ban_hien_tai' => '0',
    'ti_le_loi_nhuan' => '0',
    'sl_ton_kho' => '0',
    'don_vi' => 'Pieces (pcs)',
    'trang_thai' => '1',
    'new_danh_muc_id' => '',
    'new_ten_danh_muc' => '',
];

try {
    $db = new DataProvider();
    $categoryResult = $db->executeQuery("SELECT danh_muc_id, ten_danh_muc FROM danh_muc ORDER BY ten_danh_muc ASC");
    while ($row = $categoryResult->fetch_assoc()) {
        $categories[] = $row;
    }
} catch (Exception $e) {
    $errors[] = $e->getMessage();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create_product'])) {
    $formData['ma_sp'] = trim($_POST['ma_sp'] ?? '');
    $formData['ten_sp'] = trim($_POST['ten_sp'] ?? '');
    $formData['danh_muc_id'] = trim($_POST['danh_muc_id'] ?? '');
    $formData['mo_ta'] = trim($_POST['mo_ta'] ?? '');
    $formData['gia_nhap_hien_tai'] = trim($_POST['gia_nhap_hien_tai'] ?? '0');
    $formData['gia_ban_hien_tai'] = trim($_POST['gia_ban_hien_tai'] ?? '0');
    $formData['ti_le_loi_nhuan'] = trim($_POST['ti_le_loi_nhuan'] ?? '0');
    $formData['sl_ton_kho'] = trim($_POST['sl_ton_kho'] ?? '0');
    $formData['don_vi'] = trim($_POST['don_vi'] ?? 'Pieces (pcs)');
    $formData['trang_thai'] = ($_POST['trang_thai'] ?? '1') === '0' ? '0' : '1';
    $formData['new_danh_muc_id'] = trim($_POST['new_danh_muc_id'] ?? '');
    $formData['new_ten_danh_muc'] = trim($_POST['new_ten_danh_muc'] ?? '');

    if ($formData['ma_sp'] === '' || $formData['ten_sp'] === '') {
        $errors[] = 'Vui long nhap ma san pham va ten san pham.';
    }

    if (!is_numeric($formData['gia_nhap_hien_tai']) || !is_numeric($formData['gia_ban_hien_tai']) || !is_numeric($formData['ti_le_loi_nhuan']) || !is_numeric($formData['sl_ton_kho'])) {
        $errors[] = 'Gia, ti le loi nhuan va ton kho phai la so.';
    }

    if ($formData['danh_muc_id'] === '' && ($formData['new_danh_muc_id'] === '' || $formData['new_ten_danh_muc'] === '')) {
      $errors[] = 'Vui long chon danh muc hoac tao danh muc moi.';
    }

    if (empty($errors)) {
        try {
        if (!$db) {
          $db = new DataProvider();
        }

        if ($formData['danh_muc_id'] === '') {
          $formData['danh_muc_id'] = $db->createCategory(
            $formData['new_danh_muc_id'],
            $formData['new_ten_danh_muc'],
            1
          );
        }

        $createdImageId = null;
        $savedImageAbsolutePath = null;
        $uploadError = $_FILES['product_image']['error'] ?? UPLOAD_ERR_NO_FILE;

        if ($uploadError !== UPLOAD_ERR_NO_FILE) {
          if ($uploadError !== UPLOAD_ERR_OK) {
            throw new Exception('Tai anh that bai. Vui long thu lai.');
          }

          $imageSize = (int)($_FILES['product_image']['size'] ?? 0);
          if ($imageSize <= 0 || $imageSize > 5 * 1024 * 1024) {
            throw new Exception('Anh phai co dung luong trong khoang 0-5MB.');
          }

          $fileName = (string)($_FILES['product_image']['name'] ?? '');
          $extension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
          $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp'];
          if (!in_array($extension, $allowedExtensions, true)) {
            throw new Exception('Chi ho tro dinh dang JPG, PNG, WEBP.');
          }

          $uploadDir = __DIR__ . '/../asset/public/uploads/products';
          if (!is_dir($uploadDir) && !mkdir($uploadDir, 0777, true) && !is_dir($uploadDir)) {
            throw new Exception('Khong the tao thu muc upload anh.');
          }

          $newFileName = 'sp_' . time() . '_' . bin2hex(random_bytes(4)) . '.' . $extension;
          $savedImageAbsolutePath = $uploadDir . '/' . $newFileName;
          $tmpPath = (string)($_FILES['product_image']['tmp_name'] ?? '');

          if (!move_uploaded_file($tmpPath, $savedImageAbsolutePath)) {
            throw new Exception('Khong the luu file anh len server.');
          }

          $savedImageRelativePath = 'asset/public/uploads/products/' . $newFileName;
          $createdImageId = $db->addImageRecord($savedImageRelativePath);
          $formData['ma_anh'] = $createdImageId;
        }

            $db->addProduct($formData);
            $successMessage = 'Them san pham thanh cong.';

            $formData = [
                'ma_sp' => '',
                'ten_sp' => '',
                'danh_muc_id' => '',
                'mo_ta' => '',
                'gia_nhap_hien_tai' => '0',
                'gia_ban_hien_tai' => '0',
                'ti_le_loi_nhuan' => '0',
                'sl_ton_kho' => '0',
                'don_vi' => 'Pieces (pcs)',
                'trang_thai' => '1',
                'new_danh_muc_id' => '',
                'new_ten_danh_muc' => '',
            ];

              $categories = [];
              $categoryResult = $db->executeQuery("SELECT danh_muc_id, ten_danh_muc FROM danh_muc ORDER BY ten_danh_muc ASC");
              while ($row = $categoryResult->fetch_assoc()) {
                $categories[] = $row;
              }
        } catch (Exception $e) {
            $errors[] = $e->getMessage();
        }
    }
}

function e($value)
{
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
    <link rel="stylesheet" href="asset/css/admin/products_edit_new.css">
</head>
<body>
    <main class="main">
      <div class="topbar">
        <div class="search">
          <i class="fa-solid fa-magnifying-glass"></i>
          <input type="text" placeholder="Search orders, products..." />
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

      <section class="page">
        <div class="breadcrumb">
          <a href="#">Home</a>
          <i class="fa-solid fa-chevron-right" style="font-size:10px;"></i>
          <a href="#">Inventory</a>
          <i class="fa-solid fa-chevron-right" style="font-size:10px;"></i>
          <span style="color:#eef4ff;">Add New Product</span>
        </div>

        <div class="page-head">
          <div>
            <h1>Product Details</h1>
            <p>Configure your product's core information, pricing, and stock levels.</p>
          </div>

          <div class="head-actions">
            <a href="index1st.php?usecase=products" class="btn">Cancel</a>
            <button class="btn primary" type="submit" form="create-product-form" name="create_product" value="1">Save Product</button>
          </div>
        </div>

        <?php if ($successMessage !== ''): ?>
          <div style="margin-bottom:16px;padding:12px 14px;border:1px solid #16a34a;border-radius:12px;background:#dcfce7;color:#166534;">
            <?php echo e($successMessage); ?>
          </div>
        <?php endif; ?>

        <?php if (!empty($errors)): ?>
          <div style="margin-bottom:16px;padding:12px 14px;border:1px solid #dc2626;border-radius:12px;background:#fee2e2;color:#7f1d1d;">
            <?php foreach ($errors as $error): ?>
              <div><?php echo e($error); ?></div>
            <?php endforeach; ?>
          </div>
        <?php endif; ?>

        <form id="create-product-form" method="post" enctype="multipart/form-data">
          <div class="content-grid">
            <div class="left-col">
              <section class="card">
                <div class="card-title">
                  <span class="title-icon"><i class="fa-solid fa-info"></i></span>
                  <span>General Information</span>
                </div>

                <div class="form-grid">
                  <div class="field">
                    <label>Product Name</label>
                    <input class="input" type="text" name="ten_sp" value="<?php echo e($formData['ten_sp']); ?>" placeholder="e.g. Ergonomic Office Chair" required>
                  </div>

                  <div class="field">
                    <label>Product Code / SKU</label>
                    <input class="input" type="text" name="ma_sp" value="<?php echo e($formData['ma_sp']); ?>" placeholder="SKU-123456" required>
                  </div>

                  <div class="field">
                    <label>Category</label>
                    <select class="select" name="danh_muc_id">
                      <option value="">Select Category</option>
                      <?php foreach ($categories as $category): ?>
                        <option value="<?php echo e($category['danh_muc_id']); ?>" <?php echo $formData['danh_muc_id'] === (string)$category['danh_muc_id'] ? 'selected' : ''; ?>>
                          <?php echo e($category['ten_danh_muc']); ?>
                        </option>
                      <?php endforeach; ?>
                    </select>
                  </div>

                  <div class="field">
                    <label>New Category ID (optional)</label>
                    <input class="input" type="text" name="new_danh_muc_id" value="<?php echo e($formData['new_danh_muc_id']); ?>" placeholder="VD: DM-001">
                  </div>

                  <div class="field">
                    <label>New Category Name (optional)</label>
                    <input class="input" type="text" name="new_ten_danh_muc" value="<?php echo e($formData['new_ten_danh_muc']); ?>" placeholder="VD: Laptop Gaming">
                  </div>

                  <div class="field">
                    <label>Status</label>
                    <select class="select" name="trang_thai">
                      <option value="1" <?php echo $formData['trang_thai'] === '1' ? 'selected' : ''; ?>>Active</option>
                      <option value="0" <?php echo $formData['trang_thai'] === '0' ? 'selected' : ''; ?>>Hidden</option>
                    </select>
                  </div>

                  <div class="field full">
                    <label>Description</label>
                    <textarea class="textarea" name="mo_ta" placeholder="Enter a detailed description of the product features..."><?php echo e($formData['mo_ta']); ?></textarea>
                  </div>
                </div>
              </section>

              <section class="card">
                <div class="card-title">
                  <span class="title-icon square"><i class="fa-solid fa-money-bill-wave"></i></span>
                  <span>Pricing &amp; Stock</span>
                </div>

                <div class="form-grid">
                  <div class="field">
                    <label>Import Price ($)</label>
                    <input class="input" type="number" step="0.01" min="0" name="gia_nhap_hien_tai" value="<?php echo e($formData['gia_nhap_hien_tai']); ?>" placeholder="0.00">
                  </div>

                  <div class="field">
                    <label>Selling Price ($)</label>
                    <input class="input" type="number" step="0.01" min="0" name="gia_ban_hien_tai" value="<?php echo e($formData['gia_ban_hien_tai']); ?>" placeholder="0.00">
                  </div>

                  <div class="field">
                    <label>Profit Margin (%)</label>
                    <div class="input-wrap">
                      <input class="input" type="number" step="0.01" min="0" name="ti_le_loi_nhuan" value="<?php echo e($formData['ti_le_loi_nhuan']); ?>" placeholder="25">
                      <span class="suffix">%</span>
                    </div>
                  </div>

                  <div class="field">
                    <label>Initial Stock</label>
                    <input class="input" type="number" min="0" name="sl_ton_kho" value="<?php echo e($formData['sl_ton_kho']); ?>" placeholder="0">
                  </div>

                  <div class="field">
                    <label>Stock Unit</label>
                    <select class="select" name="don_vi">
                      <option value="Pieces (pcs)" <?php echo $formData['don_vi'] === 'Pieces (pcs)' ? 'selected' : ''; ?>>Pieces (pcs)</option>
                      <option value="Boxes" <?php echo $formData['don_vi'] === 'Boxes' ? 'selected' : ''; ?>>Boxes</option>
                      <option value="Sets" <?php echo $formData['don_vi'] === 'Sets' ? 'selected' : ''; ?>>Sets</option>
                      <option value="Kilograms" <?php echo $formData['don_vi'] === 'Kilograms' ? 'selected' : ''; ?>>Kilograms</option>
                    </select>
                  </div>
                </div>
              </section>
            </div>

            <div class="right-col">
              <section class="card">
                <div class="card-title">
                  <span class="title-icon square"><i class="fa-regular fa-image"></i></span>
                  <span>Product Image</span>
                </div>

                <div class="upload-box">
                  <div class="inner">
                    <i class="fa-solid fa-cloud-arrow-up"></i>
                    <b>Click to upload or drag &amp; drop</b>
                    <span>PNG, JPG or WEBP (Max. 5MB)</span>
                  </div>
                </div>

                <input
                  class="input"
                  type="file"
                  name="product_image"
                  accept=".jpg,.jpeg,.png,.webp"
                  style="margin-top:12px;"
                >

                <button class="browse-btn" type="button">Browse Library</button>
              </section>

              <section class="card smart">
                <div class="smart-icon">
                  <i class="fa-solid fa-chart-simple"></i>
                </div>

                <h3>Smart Analysis</h3>
                <div class="sub">Pricing optimization</div>
                <p>
                  Enter your own product code, pricing, and stock to create a product directly in database.
                </p>
              </section>
            </div>
          </div>

          <div class="bottom-action">
            <a href="index1st.php?usecase=products" class="discard">Discard Changes</a>
            <button type="submit" class="btn primary create-btn" name="create_product" value="1">Create Product</button>
          </div>
        </form>

        <div class="footer-note">
          © 2026 TechStore Admin. All systems operational.
        </div>
      </section>
    </main>
</body>
</html>
