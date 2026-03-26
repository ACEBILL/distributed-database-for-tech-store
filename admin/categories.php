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
    <link rel="stylesheet" href="asset/css/admin/categories.css">
</head>
<body>
    <!-- MAIN -->
    <main class="main">
      <!-- TOPBAR -->
      <div class="topbar">
        <div class="search">
          <i class="fa-solid fa-magnifying-glass"></i>
          <input type="text" placeholder="Tìm tài khoản, role, trạng thái..." />
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

      <section class="content">
        <div class="page-head">
          <div>
            <h1>Category List</h1>
            <p>Manage and organize your product catalog hierarchies.</p>
          </div>

          <a class="primary-btn" href="index1st.php?usecase=categories_new">
            <i class="fa-solid fa-circle-plus"></i>
            Add New Category
          </a>
        </div>

        <section class="table-card">
          <div class="table-toolbar">
            <div class="filter-input">
              <i class="fa-solid fa-filter"></i>
              <input type="text" placeholder="Filter by category name..." />
            </div>

            <div class="toolbar-actions">
              <button class="ghost-btn" type="button">Export</button>
              <button class="ghost-btn" type="button">
                <i class="fa-solid fa-bars-staggered"></i>
                Sort
              </button>
            </div>
          </div>

          <div class="table-wrap">
            <table>
              <thead>
                <tr>
                  <th>Category Name</th>
                  <th>Visibility</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>

              <tbody>
                <tr>
                  <td>
                    <div class="category-name">
                      <b>Electronics</b>
                      <span>ID: CAT-001</span>
                    </div>
                  </td>
                  <td>
                    <span class="visibility-badge">
                      <i class="fa-solid fa-eye"></i>
                      Hiện
                    </span>
                  </td>
                  <td>
                    <span class="status-badge active">Active</span>
                  </td>
                  <td>
                    <a href="#" class="action-delete">
                      <i class="fa-solid fa-trash"></i>
                      Xóa
                    </a>
                  </td>
                </tr>

                <tr>
                  <td>
                    <div class="category-name">
                      <b>Home & Living</b>
                      <span>ID: CAT-002</span>
                    </div>
                  </td>
                  <td>
                    <span class="visibility-badge">
                      <i class="fa-solid fa-eye"></i>
                      Hiện
                    </span>
                  </td>
                  <td>
                    <span class="status-badge active">Active</span>
                  </td>
                  <td>
                    <a href="#" class="action-delete">
                      <i class="fa-solid fa-trash"></i>
                      Xóa
                    </a>
                  </td>
                </tr>

                <tr>
                  <td>
                    <div class="category-name">
                      <b>Books & Stationery</b>
                      <span>ID: CAT-003</span>
                    </div>
                  </td>
                  <td>
                    <span class="visibility-badge hidden">
                      <i class="fa-solid fa-eye-slash"></i>
                      Ẩn
                    </span>
                  </td>
                  <td>
                    <span class="status-badge inactive">Inactive</span>
                  </td>
                  <td>
                    <a href="#" class="action-delete">
                      <i class="fa-solid fa-trash"></i>
                      Xóa
                    </a>
                  </td>
                </tr>

                <tr>
                  <td>
                    <div class="category-name">
                      <b>Fashion</b>
                      <span>ID: CAT-004</span>
                    </div>
                  </td>
                  <td>
                    <span class="visibility-badge">
                      <i class="fa-solid fa-eye"></i>
                      Hiện
                    </span>
                  </td>
                  <td>
                    <span class="status-badge active">Active</span>
                  </td>
                  <td>
                    <a href="#" class="action-delete">
                      <i class="fa-solid fa-trash"></i>
                      Xóa
                    </a>
                  </td>
                </tr>

                <tr>
                  <td>
                    <div class="category-name">
                      <b>Beauty & Care</b>
                      <span>ID: CAT-005</span>
                    </div>
                  </td>
                  <td>
                    <span class="visibility-badge">
                      <i class="fa-solid fa-eye"></i>
                      Hiện
                    </span>
                  </td>
                  <td>
                    <span class="status-badge active">Active</span>
                  </td>
                  <td>
                    <a href="#" class="action-delete">
                      <i class="fa-solid fa-trash"></i>
                      Xóa
                    </a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>

          <div class="table-footer">
            <p>Showing 1 to 5 of 24 categories</p>

            <div class="pagination">
              <a href="#" class="page-btn"><i class="fa-solid fa-chevron-left"></i></a>
              <a href="#" class="page-btn active">1</a>
              <span class="page-num">2</span>
              <span class="page-num">3</span>
              <span class="page-dots">...</span>
              <span class="page-num">5</span>
              <a href="#" class="page-btn"><i class="fa-solid fa-chevron-right"></i></a>
            </div>
          </div>
        </section>
      </section>
    </main>
</body>
</html>