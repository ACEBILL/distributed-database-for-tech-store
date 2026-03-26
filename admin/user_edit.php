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
    <link rel="stylesheet" href="asset/css/admin/user_edit_new.css">
</head>
<body>
    <!-- MAIN -->
    <main class="main">
      <div class="topbar">
        <div class="search">
          <i class="fa-solid fa-magnifying-glass"></i>
          <input type="text" placeholder="Tìm người dùng, email..." />
        </div>

        <div class="actions">
          <a class="iconbtn" href="#" title="Notifications"><i class="fa-regular fa-bell"></i></a>
          <a class="iconbtn" href="#" title="Help"><i class="fa-regular fa-circle-question"></i></a>
          <span class="tag"><i class="fa-solid fa-circle" style="color:rgba(34,197,94,.95)"></i> LIVE SERVER</span>
          <a class="iconbtn" href="#" title="Account"><i class="fa-regular fa-user"></i></a>
        </div>
      </div>

      <section class="page">
        <div class="hero">
          <h1>Edit User</h1>
          <p>Modify account details and security settings for John Doe.</p>
        </div>

        <section class="card upload-card">
          <div class="avatar-wrap">
            <div class="big-avatar">
              <i class="fa-solid fa-user"></i>
            </div>
            <button class="camera-btn" type="button" title="Change photo">
              <i class="fa-solid fa-camera"></i>
            </button>
          </div>

          <div class="dropzone">
            <div class="inner">
              <i class="fa-solid fa-cloud-arrow-up"></i>
              <p>Drag and drop or <a href="#">click to upload</a></p>
              <small>PNG JPG Up to 5MB</small>
            </div>
          </div>
        </section>

        <div class="section-title">Personal Information</div>
        <div class="section-line"></div>

        <section class="form-grid">
          <div class="field">
            <label>Full Name</label>
            <input class="input" type="text" value="John Doe" />
          </div>

          <div class="field">
            <label>Email Address</label>
            <input class="input" type="email" value="john.doe@example.com" />
          </div>

          <div class="field">
            <label>Phone Number</label>
            <input class="input" type="text" value="+1 (555) 000-1234" />
          </div>

          <div class="field">
            <label>User Role</label>
            <select class="select">
              <option>Administrator</option>
              <option>Manager</option>
              <option>Editor</option>
              <option>Support</option>
            </select>
          </div>
        </section>

        <div class="section-title">Security & Account Status</div>
        <div class="section-line"></div>

        <section class="card security-box">
          <div class="security-row">
            <div>
              <h4>Password Reset</h4>
              <p>Send a password reset link to user's email.</p>
            </div>
            <button class="mini-btn blue" type="button">Trigger Reset</button>
          </div>

          <div class="security-row">
            <div>
              <h4>Account Locking</h4>
              <p>Temporarily disable access for this user.</p>
            </div>
            <button class="mini-btn red" type="button">Lock Account</button>
          </div>
        </section>

        <div class="bottom">
          <button class="btn" type="button">Cancel</button>
          <button class="btn primary" type="button">Save Changes</button>
        </div>

        <div class="footnote">
          © 2024 Admin Panel. All system actions are logged for security.
        </div>
      </section>
    </main>
</body>
</html>