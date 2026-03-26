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
    <link rel="stylesheet" href="asset/css/admin/orders.css">
</head>
<body>
    <!-- MAIN -->
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
        <div class="page-head">
          <div>
            <h1>Order Management</h1>
            <p>Manage and track all customer orders with advanced search and status tracking.</p>
          </div>

          <!-- <button class="btn primary">
            <i class="fa-solid fa-plus"></i>
            Create Manual Order
          </button> -->
        </div>

        <section class="card" id="filterCard">
          <div class="card-header">
            <div class="card-title">
              <i class="fa-solid fa-filter"></i>
              <span>Advanced Filters</span>
            </div>

            <button class="collapse-btn" id="collapseBtn" type="button">
              <i class="fa-solid fa-chevron-up"></i>
            </button>
          </div>

          <div class="filter-body" id="filterBody">
            <div class="filter-inner">
              <div>
                <div class="filter-label">Date Range Picker</div>

                <div class="calendar-stack">
                  <!-- October -->
                  <div class="calendar">
                    <div class="cal-top">
                      <button class="cal-nav" type="button" aria-label="Previous month">
                        <i class="fa-solid fa-chevron-left"></i>
                      </button>
                      <span class="month-title">October 2023</span>
                      <button class="cal-nav" type="button" aria-label="Next month">
                        <i class="fa-solid fa-chevron-right"></i>
                      </button>
                    </div>

                    <div class="weekdays">
                      <span>S</span><span>M</span><span>T</span><span>W</span><span>T</span><span>F</span><span>S</span>
                    </div>

                    <div class="days">
                      <span class="blank">0</span>
                      <span class="blank">0</span>
                      <span class="blank">0</span>
                      <span>1</span>
                      <span>2</span>
                      <span>3</span>
                      <span>4</span>

                      <span class="range-start">5</span>
                      <span class="range-middle">6</span>
                      <span class="range-middle">7</span>
                      <span class="range-middle">8</span>
                      <span class="range-middle">9</span>
                      <span class="range-middle">10</span>
                      <span class="range-middle">11</span>

                      <span class="range-middle">12</span>
                      <span class="range-middle">13</span>
                      <span class="range-middle">14</span>
                      <span class="range-middle">15</span>
                      <span class="range-middle">16</span>
                      <span class="range-middle">17</span>
                      <span class="range-middle">18</span>

                      <span class="dim">19</span>
                      <span class="blank">0</span>
                      <span class="blank">0</span>
                      <span class="blank">0</span>
                      <span class="blank">0</span>
                      <span class="blank">0</span>
                      <span class="blank">0</span>
                    </div>
                  </div>

                  <!-- November -->
                  <div class="calendar">
                    <div class="cal-top">
                      <button class="cal-nav" type="button" aria-label="Previous month">
                        <i class="fa-solid fa-chevron-left"></i>
                      </button>
                      <span class="month-title">November 2023</span>
                      <button class="cal-nav" type="button" aria-label="Next month">
                        <i class="fa-solid fa-chevron-right"></i>
                      </button>
                    </div>

                    <div class="weekdays">
                      <span>S</span><span>M</span><span>T</span><span>W</span><span>T</span><span>F</span><span>S</span>
                    </div>

                    <div class="days">
                      <span class="blank">0</span>
                      <span class="blank">0</span>
                      <span class="blank">0</span>
                      <span class="range-middle">1</span>
                      <span class="range-middle">2</span>
                      <span class="range-middle">3</span>
                      <span class="range-middle">4</span>

                      <span class="range-middle">5</span>
                      <span class="range-middle">6</span>
                      <span class="range-end">7</span>
                      <span>8</span>
                      <span>9</span>
                      <span>10</span>
                      <span>11</span>

                      <span>12</span>
                      <span class="blank">0</span>
                      <span class="blank">0</span>
                      <span class="blank">0</span>
                      <span class="blank">0</span>
                      <span class="blank">0</span>
                      <span class="blank">0</span>
                    </div>
                  </div>
                </div>
              </div>

              <div class="right-filter-col">
                <div class="filter-label">Status</div>

                <div class="status-group">
                  <button class="status-chip active" type="button">All Orders</button>
                  <button class="status-chip" type="button">Pending</button>
                  <button class="status-chip" type="button">Confirmed</button>
                  <button class="status-chip" type="button">Delivered</button>
                  <button class="status-chip" type="button">Cancelled</button>
                </div>

                <div class="filter-label">Sort & Regional Filters</div>

                <div class="form-row">
                  <div class="field">
                    <label>Sort By Delivery Address (Ward)</label>
                    <select class="select">
                      <option>All Wards</option>
                      <option>Ward 1</option>
                      <option>Ward 5</option>
                      <option>Ward 12</option>
                      <option>Thảo Điền</option>
                    </select>
                  </div>

                  <div class="field">
                    <label>Price Sort</label>
                    <select class="select">
                      <option>Highest to Lowest</option>
                      <option>Lowest to Highest</option>
                      <option>Newest First</option>
                      <option>Oldest First</option>
                    </select>
                  </div>
                </div>

                <div class="filter-actions">
                  <a href="#" class="reset-link">Reset All</a>
                  <button class="btn primary" type="button">Apply Filters</button>
                </div>
              </div>
            </div>
          </div>
        </section>

        <section class="card table-card">
          <div class="table-wrap">
            <table class="order-table">
              <thead>
                <tr>
                  <th>Order ID</th>
                  <th>Customer</th>
                  <th>Date</th>
                  <th>Delivery Ward</th>
                  <th>Total</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>

              <tbody>
                <tr>
                  <td><a href="#" class="order-id">#ORD-<br>90234</a></td>
                  <td>
                    <div class="customer">
                      <div class="customer-avatar av-amber">JD</div>
                      <div class="customer-meta">
                        <b>Jane Doe</b>
                        <span>jane@example.com</span>
                      </div>
                    </div>
                  </td>
                  <td class="muted">Oct 12,<br>2023</td>
                  <td class="muted">Ward 1, District<br>1</td>
                  <td class="amount">$1,240.00</td>
                  <td><span class="badge pending">Pending</span></td>
                  <td><a href="#" class="detail-link">View<br>Details</a></td>
                </tr>

                <tr>
                  <td><a href="#" class="order-id">#ORD-<br>90235</a></td>
                  <td>
                    <div class="customer">
                      <div class="customer-avatar av-green">MS</div>
                      <div class="customer-meta">
                        <b>Michael Smith</b>
                        <span>m.smith@mail.com</span>
                      </div>
                    </div>
                  </td>
                  <td class="muted">Oct 14,<br>2023</td>
                  <td class="muted">Ward 5, District<br>3</td>
                  <td class="amount">$450.25</td>
                  <td><span class="badge confirmed">Confirmed</span></td>
                  <td><a href="#" class="detail-link">View<br>Details</a></td>
                </tr>

                <tr>
                  <td><a href="#" class="order-id">#ORD-<br>90236</a></td>
                  <td>
                    <div class="customer">
                      <div class="customer-avatar av-blue">AW</div>
                      <div class="customer-meta">
                        <b>Alice Wong</b>
                        <span>alice.w@tech.io</span>
                      </div>
                    </div>
                  </td>
                  <td class="muted">Oct 15,<br>2023</td>
                  <td class="muted">Thao Dien,<br>District 2</td>
                  <td class="amount">$2,890.00</td>
                  <td><span class="badge delivered">Delivered</span></td>
                  <td><a href="#" class="detail-link">View<br>Details</a></td>
                </tr>

                <tr>
                  <td><a href="#" class="order-id">#ORD-<br>90237</a></td>
                  <td>
                    <div class="customer">
                      <div class="customer-avatar av-gray">RK</div>
                      <div class="customer-meta">
                        <b>Robert King</b>
                        <span>rking@service.co</span>
                      </div>
                    </div>
                  </td>
                  <td class="muted">Oct 18,<br>2023</td>
                  <td class="muted">Ward 12, Bình Thạnh</td>
                  <td class="amount">$125.00</td>
                  <td><span class="badge cancelled">Cancelled</span></td>
                  <td><a href="#" class="detail-link">View<br>Details</a></td>
                </tr>

                <tr>
                  <td><a href="#" class="order-id">#ORD-<br>90238</a></td>
                  <td>
                    <div class="customer">
                      <div class="customer-avatar av-indigo">CL</div>
                      <div class="customer-meta">
                        <b>Chris Lee</b>
                        <span>clee@site.net</span>
                      </div>
                    </div>
                  </td>
                  <td class="muted">Oct 20,<br>2023</td>
                  <td class="muted">Ward 1, District<br>1</td>
                  <td class="amount">$780.40</td>
                  <td><span class="badge pending">Pending</span></td>
                  <td><a href="#" class="detail-link">View<br>Details</a></td>
                </tr>
              </tbody>
            </table>
          </div>

          <div class="table-footer">
            <div class="table-note">Showing 1 to 5 of 2,430 orders</div>

            <div class="pagination">
              <a href="#" class="page-btn"><i class="fa-solid fa-chevron-left"></i></a>
              <a href="#" class="page-btn active">1</a>
              <a href="#" class="page-btn">2</a>
              <a href="#" class="page-btn">3</a>
              <span class="dots">...</span>
              <a href="#" class="page-btn">48</a>
              <a href="#" class="page-btn"><i class="fa-solid fa-chevron-right"></i></a>
            </div>
          </div>
        </section>
      </section>
    </main>
</body> 
<script src="asset/js/admin/orders.js"></script>
</html>