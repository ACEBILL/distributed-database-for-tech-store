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
    <link rel="stylesheet" href="asset/css/admin/categories_edit_new.css">
</head>
<body>
    <!-- MAIN -->
    <main class="main">
      <div class="topbar">
        <div class="search">
          <i class="fa-solid fa-magnifying-glass"></i>
          <input type="text" placeholder="Tìm kiếm nhanh..." />
        </div>

        <div class="top-actions">
          <button class="iconbtn" title="Thông báo">
            <i class="fa-solid fa-bell"></i>
          </button>

          <button class="iconbtn" title="Cài đặt">
            <i class="fa-solid fa-gear"></i>
          </button>

          <button class="profile-btn" title="Tài khoản">
            <i class="fa-regular fa-file-lines"></i>
          </button>
        </div>
      </div>

      <section class="content">
        <div class="breadcrumb">
          <a href="#">Trang chủ</a>
          <i class="fa-solid fa-chevron-right" style="font-size:10px;"></i>
          <a href="index1st.php?usecase=categories">Danh mục</a>
          <i class="fa-solid fa-chevron-right" style="font-size:10px;"></i>
          <span class="current">Tạo mới</span>
        </div>

        <div class="hero">
          <h1>Tạo Danh mục Sản phẩm</h1>
          <p>Cấu hình thông tin cho nhóm sản phẩm mới của bạn.</p>
        </div>

        <section class="card form-card">
          <div class="field">
            <label for="categoryName">Tên danh mục <span class="required">*</span></label>
            <input
              id="categoryName"
              class="input"
              type="text"
              placeholder="Ví dụ: Đồ điện tử, Thời trang Nam..."
            />
          </div>

          <div class="field">
            <label>Trạng thái</label>
            <div class="toggle-row">
              <label class="switch">
                <input type="checkbox" checked />
                <span class="slider"></span>
              </label>
              <span class="toggle-label">Đang hoạt động</span>
            </div>
          </div>

          <div class="form-divider"></div>

          <div class="actions-row">
            <button class="btn" type="button">Hủy</button>
            <button class="btn primary" type="button">
              <i class="fa-solid fa-circle-plus"></i>
              Tạo
            </button>
          </div>
        </section>

        <section class="card hint-card">
          <div class="hint-icon">
            <i class="fa-solid fa-info"></i>
          </div>
          <div class="hint-text">
            <b>Mẹo:</b>
            <p>Tên danh mục nên ngắn gọn và súc tích để khách hàng dễ dàng nhận diện khi duyệt qua thanh điều hướng của cửa hàng.</p>
          </div>
        </section>
      </section>
    </main>
</body>
</html>