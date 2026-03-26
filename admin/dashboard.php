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
    <link rel="stylesheet" href="asset/css/admin/dashboard.css">

</head>
<body>
    <!-- ===== MAIN ===== -->
    <main class="main">
      <!-- TOPBAR -->
      <div class="topbar">
        <div class="search">
          <i class="fa-solid fa-magnifying-glass"></i>
          <input type="text" placeholder="Tìm đơn hàng, sản phẩm, khách hàng..." />
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

      <!-- HEADER -->
      <section class="header">
        <div>
          <h1>Dashboard Overview</h1>
          <p>Chào buổi sáng, Lan Hương. Đây là tình hình cửa hàng hôm nay.</p>
        </div>

        <div class="right">
          <a class="btn" href="#"><i class="fa-regular fa-calendar"></i> Last 30 Days</a>
          <a class="btn primary" href="#"><i class="fa-solid fa-download"></i> Export Data</a>
        </div>
      </section>

      <!-- GRID -->
      <section class="grid">

        <!-- Total Sales -->
        <article class="card span-4">
          <div class="c-top">
            <div class="c-ic"><i class="fa-solid fa-sack-dollar"></i></div>
            <div class="chip good"><i class="fa-solid fa-arrow-trend-up"></i> 12.5%</div>
          </div>

          <div class="c-body">
            <div class="k">Total Sales</div>
            <div class="v">$128,430.00</div>

            <div class="sub">
              <span>Target: $150,000.00</span>
              <span style="color:rgba(34,197,94,.85); font-weight:900;">85%</span>
            </div>
            <div class="bar"><span></span></div>
          </div>
        </article>

        <!-- New Orders -->
        <article class="card span-4">
          <div class="c-top">
            <div class="c-ic"><i class="fa-solid fa-cart-plus"></i></div>
            <div class="chip info"><i class="fa-solid fa-arrow-trend-up"></i> 5.2%</div>
          </div>

          <div class="c-body">
            <div class="k">New Orders</div>
            <div class="v">1,452</div>

            <div class="avatars" aria-label="Customers">
              <div class="a"></div>
              <div class="a"></div>
              <div class="a"></div>
              <div class="more">+49</div>
            </div>
          </div>
        </article>

        <!-- Low Stock -->
        <article class="card span-4">
          <div class="c-top">
            <div class="c-ic" style="color:rgba(245,158,11,.95); background:rgba(245,158,11,.10); border-color:rgba(245,158,11,.20)">
              <i class="fa-solid fa-triangle-exclamation"></i>
            </div>
            <div class="chip warn"><i class="fa-solid fa-bolt"></i> Urgent</div>
          </div>

          <div class="c-body">
            <div class="k">Low Stock Alerts</div>
            <div class="v">12 Items</div>

            <div class="low">
              <div class="it">
                <span>Wireless Headphones (Pro)</span>
                <b>2 left</b>
              </div>
              <div class="it">
                <span>Mechanical Keyboard</span>
                <b>5 left</b>
              </div>
            </div>
          </div>
        </article>

        <!-- Recent Performance -->
        <article class="card span-12">
          <div class="card-head">
            <h3>Recent Performance</h3>
            <a href="#">View All Activity</a>
          </div>

          <div class="list">
            <div class="row">
              <div class="left">
                <div class="dot blue"><i class="fa-solid fa-cart-shopping"></i></div>
                <div class="txt">
                  <b>New order received #88432</b>
                  <span>Customer: Sarah Mitchell • 2 items • $124.00</span>
                </div>
              </div>
              <div class="right">
                <div class="time">2 mins ago</div>
                <div class="status paid">PAID</div>
              </div>
            </div>

            <div class="row">
              <div class="left">
                <div class="dot blue"><i class="fa-solid fa-user-plus"></i></div>
                <div class="txt">
                  <b>New customer registered</b>
                  <span>Michael Chen (m.chen@example.com)</span>
                </div>
              </div>
              <div class="right">
                <div class="time">15 mins ago</div>
                <div class="status verified">VERIFIED</div>
              </div>
            </div>

            <div class="row">
              <div class="left">
                <div class="dot amber"><i class="fa-solid fa-clipboard-check"></i></div>
                <div class="txt">
                  <b>Inventory Alert: Low Stock</b>
                  <span>Smart Watch Series 5 (Silver) dropped below 10 units</span>
                </div>
              </div>
              <div class="right">
                <div class="time">1 hour ago</div>
                <div class="status warning">WARNING</div>
              </div>
            </div>

            <div class="row">
              <div class="left">
                <div class="dot green"><i class="fa-solid fa-truck-fast"></i></div>
                <div class="txt">
                  <b>Order Shipped #88410</b>
                  <span>Tracking: UPS-74823940293 • 4 items</span>
                </div>
              </div>
              <div class="right">
                <div class="time">3 hours ago</div>
                <div class="status transit">IN TRANSIT</div>
              </div>
            </div>
          </div>
        </article>

        <!-- Sales Trends -->
        <article class="card span-6">
          <div class="card-head">
            <h3>Sales Trends</h3>
            <span class="chip" style="opacity:.9"><i class="fa-solid fa-calendar-week"></i> Weekly</span>
          </div>

          <div class="chart" aria-label="Bar chart placeholder">
            <div class="bars">
              <div class="barv" style="height:28%"></div>
              <div class="barv"></div>
              <div class="barv"></div>
              <div class="barv"></div>
              <div class="barv"></div>
              <div class="barv"></div>
              <div class="barv"></div>
            </div>
          </div>
        </article>

        <!-- Device Traffic -->
        <article class="card span-6">
          <div class="card-head">
            <h3>Device Traffic</h3>
            <a href="#" style="opacity:.9"><i class="fa-solid fa-ellipsis"></i></a>
          </div>

          <div class="donut" aria-label="Donut chart placeholder">
            <div class="ring" aria-hidden="true"></div>
            <div class="legend">
              <div class="lg"><span class="sw b"></span> Desktop (65%)</div>
              <div class="lg"><span class="sw g"></span> Mobile (25%)</div>
              <div class="lg"><span class="sw y"></span> Tablet (10%)</div>
            </div>
          </div>
        </article>

      </section>
    </main>
</body>
</html>