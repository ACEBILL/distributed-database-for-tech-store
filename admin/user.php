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
    <link rel="stylesheet" href="asset/css/admin/user.css">
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

      <!-- PAGE HEAD -->
      <section class="page-head">
        <div>
          <h1>User Management</h1>
          <p>
            Quản lý tài khoản quản trị, phân quyền và trạng thái truy cập
            cho hệ thống TechStore.
          </p>
        </div>

        <a href="index1st.php?usecase=user_edit" class="add-btn">
          <i class="fa-solid fa-user-plus"></i>
          Add New Account
        </a>
      </section>

      <!-- USER TABLE CARD -->
      <section class="user-card">
        <div class="table-toolbar">
          <div class="table-left">
            <span>Show:</span>
            <select>
              <option>10 Entries</option>
              <option>20 Entries</option>
              <option>50 Entries</option>
            </select>
          </div>

          <div class="table-actions">
            <button class="tool-btn">
              <i class="fa-solid fa-filter"></i>
              Filter
            </button>
            <button class="tool-btn">
              <i class="fa-solid fa-download"></i>
              Export
            </button>
          </div>
        </div>

        <div class="table-wrap">
          <table class="user-table">
            <thead>
              <tr>
                <th>USERNAME</th>
                <th>EMAIL ADDRESS</th>
                <th>ROLE</th>
                <th>STATUS</th>
                <th style="text-align:center;">ACTIONS</th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <td>
                  <div class="user-info">
                    <div class="avatar">JD</div>
                    <span>jdoe_admin</span>
                  </div>
                </td>
                <td>john.doe@example.com</td>
                <td><span class="badge role purple">Super Admin</span></td>
                <td><span class="badge status green">● Active</span></td>
                <td>
                  <div class="action-group">
                    <a href="#" title="Edit"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a href="#" title="Reset"><i class="fa-solid fa-rotate-left"></i></a>
                    <a href="#" title="Lock"><i class="fa-solid fa-lock"></i></a>
                  </div>
                </td>
              </tr>

              <tr>
                <td>
                  <div class="user-info">
                    <div class="avatar">MS</div>
                    <span>m_smith</span>
                  </div>
                </td>
                <td>m.smith@store.com</td>
                <td><span class="badge role indigo">Editor</span></td>
                <td><span class="badge status green">● Active</span></td>
                <td>
                  <div class="action-group">
                    <a href="#" title="Edit"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a href="#" title="Reset"><i class="fa-solid fa-rotate-left"></i></a>
                    <a href="#" title="Lock"><i class="fa-solid fa-lock"></i></a>
                  </div>
                </td>
              </tr>

              <tr>
                <td>
                  <div class="user-info">
                    <div class="avatar">SG</div>
                    <span>sales_guy</span>
                  </div>
                </td>
                <td>sales@store.com</td>
                <td><span class="badge role teal">Sales</span></td>
                <td><span class="badge status red">● Locked</span></td>
                <td>
                  <div class="action-group">
                    <a href="#" title="Edit"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a href="#" title="Reset"><i class="fa-solid fa-rotate-left"></i></a>
                    <a href="#" title="Lock"><i class="fa-solid fa-lock"></i></a>
                  </div>
                </td>
              </tr>

              <tr>
                <td>
                  <div class="user-info">
                    <div class="avatar">S1</div>
                    <span>support_1</span>
                  </div>
                </td>
                <td>support@store.com</td>
                <td><span class="badge role orange">Support</span></td>
                <td><span class="badge status green">● Active</span></td>
                <td>
                  <div class="action-group">
                    <a href="#" title="Edit"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a href="#" title="Reset"><i class="fa-solid fa-rotate-left"></i></a>
                    <a href="#" title="Lock"><i class="fa-solid fa-lock"></i></a>
                  </div>
                </td>
              </tr>

              <tr>
                <td>
                  <div class="user-info">
                    <div class="avatar">AT</div>
                    <span>admin_tina</span>
                  </div>
                </td>
                <td>tina@techstore.vn</td>
                <td><span class="badge role indigo">Manager</span></td>
                <td><span class="badge status green">● Active</span></td>
                <td>
                  <div class="action-group">
                    <a href="#" title="Edit"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a href="#" title="Reset"><i class="fa-solid fa-rotate-left"></i></a>
                    <a href="#" title="Lock"><i class="fa-solid fa-lock"></i></a>
                  </div>
                </td>
              </tr>

              <tr>
                <td>
                  <div class="user-info">
                    <div class="avatar">NV</div>
                    <span>nv_kho</span>
                  </div>
                </td>
                <td>warehouse@techstore.vn</td>
                <td><span class="badge role teal">Inventory</span></td>
                <td><span class="badge status green">● Active</span></td>
                <td>
                  <div class="action-group">
                    <a href="#" title="Edit"><i class="fa-solid fa-pen-to-square"></i></a>
                    <a href="#" title="Reset"><i class="fa-solid fa-rotate-left"></i></a>
                    <a href="#" title="Lock"><i class="fa-solid fa-lock"></i></a>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <div class="table-footer">
          <div class="table-note">Showing 1 to 6 of 12 accounts</div>

          <div class="pagination">
            <a href="#" class="page-btn"><i class="fa-solid fa-chevron-left"></i></a>
            <a href="#" class="page-btn active">1</a>
            <a href="#" class="page-btn">2</a>
            <a href="#" class="page-btn">3</a>
            <span class="dots">...</span>
            <a href="#" class="page-btn">12</a>
            <a href="#" class="page-btn"><i class="fa-solid fa-chevron-right"></i></a>
          </div>
        </div>
      </section>
    </main>
</body>
</html>