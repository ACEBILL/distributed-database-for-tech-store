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
    <link rel="stylesheet" href="asset/css/admin/inventory.css">
</head>
<body>
    <!-- MAIN -->
    <main class="main">
      <div class="topbar">
        <div class="search">
          <i class="fa-solid fa-magnifying-glass"></i>
          <input type="text" placeholder="Tìm đơn hàng, sản phẩm, khách hàng..." />
        </div>

        <div class="actions">
          <a class="iconbtn" href="#" title="Notifications"><i class="fa-regular fa-bell"></i></a>
          <a class="iconbtn" href="#" title="Help"><i class="fa-regular fa-circle-question"></i></a>
          <span class="tag"><i class="fa-solid fa-circle" style="color:rgba(34,197,94,.95)"></i> LIVE SERVER</span>
          <a class="iconbtn" href="#" title="Account"><i class="fa-regular fa-user"></i></a>
        </div>
      </div>

      <section class="inventory-layout">

        <!-- LEFT SIDE -->
        <section class="card report-card">
          <div class="report-head">
            <div>
              <h1>Inventory & Statistics Report</h1>
              <p>Real-time insight into product movement and stock availability.</p>
            </div>

            <a href="#" class="btn primary">
              <i class="fa-solid fa-plus"></i>
              Add New Product
            </a>
          </div>

          <div class="stats">
            <div class="stat">
              <small>Total SKUs</small>
              <strong>1,284</strong>
              <span class="good">↗ +12 new</span>
            </div>

            <div class="stat">
              <small>In Stock Value</small>
              <strong>$45.2k</strong>
              <span>Across 3 warehouses</span>
            </div>

            <div class="stat">
              <small>Avg. Turnover</small>
              <strong>22 Days</strong>
              <span class="good">↘ -2 days</span>
            </div>

            <div class="stat">
              <small>Low Stock Alert</small>
              <strong style="color:#ff5b5b;">18</strong>
              <span class="danger">Requires attention</span>
            </div>
          </div>

          <div class="section-title">
            <i class="fa-solid fa-magnifying-glass-chart"></i>
            Product Lookup
          </div>

          <div class="lookup">
            <div class="search">
              <i class="fa-solid fa-magnifying-glass"></i>
              <input type="text" placeholder="Search by product name, SKU or category..." />
            </div>
          </div>

          <div class="mini-card">
            <h3>Generate In-Out-Stock Report</h3>

            <div class="report-form">
              <div class="field">
                <label>Start Date</label>
                <div class="input-wrap">
                  <input class="input" type="date" />
                  <i class="fa-regular fa-calendar input-icon"></i>
                </div>
              </div>

              <div class="field">
                <label>End Date</label>
                <div class="input-wrap">
                  <input class="input" type="date" />
                  <i class="fa-regular fa-calendar input-icon"></i>
                </div>
              </div>

              <button class="btn" type="button">
                <i class="fa-regular fa-eye"></i>
                Preview
              </button>

              <button class="btn primary" type="button">
                <i class="fa-solid fa-download"></i>
                Export PDF
              </button>
            </div>
          </div>

          <div class="table-title">Stock Activity History</div>

          <div class="table-wrap">
            <table class="table">
              <thead>
                <tr>
                  <th>Product</th>
                  <th>SKU</th>
                  <th>Inbound</th>
                  <th>Outbound</th>
                  <th>Status</th>
                  <th style="text-align:center;">Actions</th>
                </tr>
              </thead>

              <tbody>
                <tr>
                    <td>
                    <div class="product-cell">
                        <div class="product-thumb">⌚</div>
                        <strong>Smartwatch Gen 5</strong>
                    </div>
                    </td>
                    <td class="sku">SW-00124</td>
                    <td class="inbound">+45</td>
                    <td class="outbound">-12</td>
                    <td><span class="badge healthy">HEALTHY</span></td>
                    <td class="actions-col">
                    <div class="action-group">
                        <a href="restock.html" class="action-btn restock" data-product="Smartwatch Gen 5" title="Restock">
                        <i class="fa-solid fa-boxes-stacked"></i>
                        </a>
                    </div>
                    </td>
                </tr>

                <tr>
                    <td>
                    <div class="product-cell">
                        <div class="product-thumb">🔊</div>
                        <strong>Bluetooth Speaker Lite</strong>
                    </div>
                    </td>
                    <td class="sku">BS-04281</td>
                    <td class="inbound">+10</td>
                    <td class="outbound">-34</td>
                    <td><span class="badge moderate">MODERATE</span></td>
                    <td class="actions-col">
                    <div class="action-group">
                        <a href="restock.html" class="action-btn restock" data-product="Bluetooth Speaker Lite" title="Restock">
                        <i class="fa-solid fa-boxes-stacked"></i>
                        </a>
                    </div>
                    </td>
                </tr>

                <tr>
                    <td>
                    <div class="product-cell">
                        <div class="product-thumb">🎧</div>
                        <strong>Wireless Noise Headphones</strong>
                    </div>
                    </td>
                    <td class="sku">WH-99120</td>
                    <td class="inbound">+2</td>
                    <td class="outbound">-40</td>
                    <td><span class="badge critical">CRITICAL</span></td>
                    <td class="actions-col">
                    <div class="action-group">
                        <a href="restock.html" class="action-btn restock" data-product="Wireless Noise Headphones" title="Restock">
                        <i class="fa-solid fa-boxes-stacked"></i>
                        </a>
                    </div>
                    </td>
                </tr>
                </tbody>
            </table>
          </div>

          <div class="footer-inline">
            <span>© 2024 TechStore Inventory. All rights reserved.</span>
            <div class="footer-links">
              <a href="#">Documentation</a>
              <a href="#">Support Center</a>
              <a href="#">Privacy Policy</a>
            </div>
          </div>
        </section>

        <!-- RIGHT SIDE -->
        <div class="warning-stack">

        <!-- LOW STOCK -->
        <section class="card warning-card">
            <div class="warning-title">
            <i class="fa-solid fa-triangle-exclamation"></i>
            Low Stock Warning
            </div>

            <div class="warning-item">
            <div class="top">
                <b>Ultra-Light Laptop 15"</b>
                <span class="warning-pill">2 Left</span>
            </div>
            <div class="warning-bar"><span style="width:16%"></span></div>
            </div>

            <div class="warning-item">
            <div class="top">
                <b>Wireless Noise Headphones</b>
                <span class="warning-pill">5 Left</span>
            </div>
            <div class="warning-bar"><span style="width:26%"></span></div>
            </div>

            <a href="#" class="warning-link">View All Low Stock Items</a>
        </section>


        <!-- OUT OF STOCK -->
        <section class="card warning-card out">
            <div class="warning-title">
            <i class="fa-solid fa-box-open"></i>
            Out Of Stock
            </div>

            <div class="warning-item">
            <div class="top">
                <b>Gaming Mouse Pro</b>
                <span class="warning-pill">0 Left</span>
            </div>
            <div class="warning-bar"><span style="width:0%"></span></div>
            </div>

            <div class="warning-item">
            <div class="top">
                <b>Mechanical Keyboard K87</b>
                <span class="warning-pill">0 Left</span>
            </div>
            <div class="warning-bar"><span style="width:0%"></span></div>
            </div>

            <a href="#" class="warning-link">View All Out Of Stock</a>
        </section>

        </div>
      </section>
    </main>
</body>
</html>