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
    <link rel="stylesheet" href="asset/css/admin/orders_detail.css">
</head>
<body>
    <!-- MAIN -->
    <main class="main">
      <div class="topbar">
        <div class="search">
          <i class="fa-solid fa-magnifying-glass"></i>
          <input type="text" placeholder="Tìm đơn hàng, khách hàng..." />
        </div>

        <div class="actions">
          <a class="iconbtn" href="#"><i class="fa-regular fa-bell"></i></a>
          <a class="iconbtn" href="#"><i class="fa-regular fa-circle-question"></i></a>
          <span class="tag"><i class="fa-solid fa-circle" style="color:rgba(34,197,94,.95)"></i> LIVE SERVER</span>
          <a class="iconbtn" href="#"><i class="fa-regular fa-user"></i></a>
        </div>
      </div>

      <section class="page">
        <div class="page-top">
          <div class="title-left">
            <a href="#" class="back-btn"><i class="fa-solid fa-arrow-left"></i></a>
            <div>
              <h1>Order #ORD-90234</h1>
              <p>Placed on Oct 24, 2023, 10:45 AM</p>
            </div>
          </div>

          <div class="header-actions">
            <button class="btn">
              <i class="fa-solid fa-print"></i>
              Print Invoice
            </button>
            <button class="btn primary">
              <i class="fa-solid fa-floppy-disk"></i>
              Update Order
            </button>
          </div>
        </div>

        <div class="full-card status-card">
          <div class="section-label">Current Order Status</div>
          <div class="status-track">
            <div class="status-step">Pending</div>
            <div class="status-step active">Confirmed</div>
            <div class="status-step">Shipped</div>
            <div class="status-step">Delivered</div>
            <div class="status-step cancel">Cancelled</div>
          </div>
        </div>

        <div class="wrap">
          <!-- LEFT -->
          <div>
            <div class="card">
              <div class="card-head">
                <h3>Order Summary</h3>
                <span class="chip">3 ITEMS</span>
              </div>

              <table class="order-table">
                <thead>
                  <tr>
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Subtotal</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      <div class="product-row">
                        <div class="thumb">🎧</div>
                        <div>
                          <b>Premium Wireless Headphones</b>
                          <span>Color: Midnight Black</span>
                        </div>
                      </div>
                    </td>
                    <td>1</td>
                    <td>$299.00</td>
                    <td class="subtotal">$299.00</td>
                  </tr>

                  <tr>
                    <td>
                      <div class="product-row">
                        <div class="thumb">⌨️</div>
                        <div>
                          <b>Mechanical Gaming Keyboard</b>
                          <span>Switch: Cherry MX Blue</span>
                        </div>
                      </div>
                    </td>
                    <td>1</td>
                    <td>$159.00</td>
                    <td class="subtotal">$159.00</td>
                  </tr>

                  <tr>
                    <td>
                      <div class="product-row">
                        <div class="thumb">💻</div>
                        <div>
                          <b>Protective Laptop Sleeve</b>
                          <span>Size: 14-inch</span>
                        </div>
                      </div>
                    </td>
                    <td>2</td>
                    <td>$35.00</td>
                    <td class="subtotal">$70.00</td>
                  </tr>
                </tbody>
              </table>

              <div style="padding:14px 16px 16px;">
                <div class="bottom-grid">
                  <div class="inner-card">
                    <h4>Payment Info</h4>

                    <div class="pay-method">
                      <div class="pay-icon"><i class="fa-solid fa-credit-card"></i></div>
                      <div>
                        <b>Visa Ending in 4242</b>
                        <span>Transaction ID: TXN_90321102</span>
                      </div>
                    </div>

                    <div class="success">Payment Successful</div>
                  </div>

                  <div class="inner-card">
                    <div class="totals">
                      <div class="row"><span>Subtotal</span><span>$528.00</span></div>
                      <div class="row"><span>Shipping (Standard)</span><span>$15.00</span></div>
                      <div class="row"><span>Taxes (8%)</span><span>$42.24</span></div>
                      <div class="row total"><span>Total Amount</span><b>$585.24</b></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- RIGHT -->
          <div class="side-col">
            <div class="card side-card">
              <h3><i class="fa-solid fa-user"></i> Customer Information</h3>

              <div class="customer-top">
                <div class="customer-avatar">JD</div>
                <div>
                  <b>Johnathan Doe</b>
                  <span>Customer ID: #C-1002</span>
                </div>
              </div>

              <div class="info-group">
                <small>Email Address</small>
                <p>john.doe@example.com</p>
              </div>

              <div class="info-group">
                <small>Phone Number</small>
                <p>+1 (555) 902-3456</p>
              </div>

              <div class="info-group" style="margin-bottom:0;">
                <small>Delivery Address</small>
                <p>
                  123 Skyline Terrace, Apartment 4B<br>
                  District 7, Phu My Hung Ward<br>
                  Ho Chi Minh City, 70000<br>
                  Vietnam
                </p>
              </div>
            </div>

            <div class="card side-card">
              <h3><i class="fa-solid fa-clock-rotate-left"></i> Order Timeline</h3>

              <div class="timeline">
                <div class="event">
                  <b>Order Confirmed</b>
                  <span>Oct 24, 2023 - 02:30 PM</span>
                  <span>Confirmed by Admin: Alice Smith</span>
                </div>

                <div class="event">
                  <b>Payment Verified</b>
                  <span>Oct 24, 2023 - 11:00 AM</span>
                </div>

                <div class="event">
                  <b>Order Placed</b>
                  <span>Oct 24, 2023 - 10:45 AM</span>
                </div>
              </div>
            </div>

            <div class="card side-card notes">
              <h3><i class="fa-solid fa-note-sticky"></i> Internal Notes</h3>
              <textarea placeholder="Add a note for the staff..."></textarea>
              <button type="button">ADD NOTE</button>
            </div>
          </div>
        </div>

        <div class="footer-actions">
          <span>4 staff members viewed this today</span>

          <div class="buttons">
            <button class="btn danger">Cancel Order</button>
            <button class="btn primary">Mark as Shipped</button>
          </div>
        </div>
      </section>
    </main>
</body>
</html>