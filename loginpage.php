<?php
session_start();

if (!empty($_SESSION['is_logged_in'])) {
  header('Location: index1st.php?usecase=dashboard');
  exit;
}

$errorMessage = '';
$usernameInput = '';

if (isset($_GET['error']) && $_GET['error'] === 'forbidden') {
  $errorMessage = 'Tai khoan cua ban khong co quyen truy cap admin.';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $usernameInput = trim($_POST['username'] ?? '');
  $passwordInput = (string)($_POST['password'] ?? '');

  if ($usernameInput === '' || $passwordInput === '') {
    $errorMessage = 'Vui long nhap day du tai khoan va mat khau.';
  } else {
    require __DIR__ . '/connect.inc';
    $conn = mysqli_connect($host, $username, $password, $database, $port);

    if (!$conn) {
      $errorMessage = 'Khong ket noi duoc CSDL.';
    } else {
      mysqli_set_charset($conn, 'utf8mb4');

      $stmt = mysqli_prepare(
        $conn,
        'SELECT ma_tk, ten_tai_khoan, email, mat_khau, role, status FROM tai_khoan WHERE ten_tai_khoan = ? OR email = ? LIMIT 1'
      );

      if (!$stmt) {
        $errorMessage = 'Khong the xu ly dang nhap luc nay.';
      } else {
        mysqli_stmt_bind_param($stmt, 'ss', $usernameInput, $usernameInput);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $user = $result ? mysqli_fetch_assoc($result) : null;

        if (!$user) {
          $errorMessage = 'Sai tai khoan hoac mat khau.';
        } else {
          $storedPassword = (string)($user['mat_khau'] ?? '');
          $isPasswordValid = hash_equals($storedPassword, $passwordInput) || password_verify($passwordInput, $storedPassword);

          if (!$isPasswordValid) {
            $errorMessage = 'Sai tai khoan hoac mat khau.';
          } elseif ((int)($user['status'] ?? 0) !== 1) {
            $errorMessage = 'Tai khoan dang bi khoa.';
          } elseif ((int)($user['role'] ?? 0) !== 1) {
            $errorMessage = 'Tai khoan cua ban khong co quyen admin.';
          } else {
            session_regenerate_id(true);
            $_SESSION['is_logged_in'] = true;
            $_SESSION['user_id'] = $user['ma_tk'];
            $_SESSION['username'] = $user['ten_tai_khoan'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['role'] = (int)$user['role'];

            mysqli_stmt_close($stmt);
            mysqli_close($conn);

            header('Location: index1st.php?usecase=dashboard');
            exit;
          }
        }

        mysqli_stmt_close($stmt);
      }

      mysqli_close($conn);
    }
  }
}

function e($value)
{
  return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>TechStore Admin | Đăng nhập</title>

  <!-- Font + Icons -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>

  <style>
    :root{
      --bg0:#070c12;
      --bg1:#0b1624;
      --card:#0d1726cc;
      --card2:#0b1422cc;
      --stroke:rgba(255,255,255,.10);
      --stroke2:rgba(255,255,255,.14);

      --text:#e7eefc;
      --muted:#a9b7cf;

      --blue:#1d86ff;
      --blue2:#1676f0;

      --shadow: 0 28px 80px rgba(0,0,0,.55);
      --glow: 0 0 0 1px rgba(255,255,255,.06), 0 20px 50px rgba(0,0,0,.55);

      --r:18px;
    }

    *{box-sizing:border-box}
    html,body{height:100%}
    body{
      margin:0;
      font-family:Inter,system-ui,-apple-system,Segoe UI,Roboto,Arial,sans-serif;
      color:var(--text);
      background:
        radial-gradient(900px 500px at 20% 10%, rgba(29,134,255,.22), transparent 55%),
        radial-gradient(700px 420px at 80% 20%, rgba(0,255,200,.10), transparent 55%),
        radial-gradient(900px 540px at 60% 90%, rgba(120,80,255,.12), transparent 55%),
        linear-gradient(180deg, var(--bg1), var(--bg0));
      overflow-x:hidden;
    }

    /* layout */
    .page{
      min-height:100dvh;
      display:flex;
      flex-direction:column;
      align-items:center;
      justify-content:center;
      padding:44px 16px 90px;
      position:relative;
    }

    /* top brand */
    .brand{
      display:flex;
      flex-direction:column;
      align-items:center;
      gap:10px;
      margin-bottom:18px;
      text-align:center;
    }
    .brand .logo{
      width:54px;height:54px;
      border-radius:14px;
      display:grid;place-items:center;
      background: linear-gradient(180deg, rgba(29,134,255,.95), rgba(29,134,255,.70));
      box-shadow: 0 18px 35px rgba(29,134,255,.22), 0 0 0 1px rgba(255,255,255,.08) inset;
    }
    .brand .logo i{font-size:22px;color:#fff}
    .brand h1{
      margin:0;
      font-size:28px;
      letter-spacing:.2px;
      font-weight:800;
      line-height:1.1;
    }
    .brand p{
      margin:0;
      color:var(--muted);
      font-size:13px;
      letter-spacing:.2px;
    }

    /* card */
    .card{
      width:min(440px, 100%);
      background: linear-gradient(180deg, var(--card), var(--card2));
      border:1px solid var(--stroke);
      border-radius:22px;
      box-shadow: var(--shadow);
      padding:26px 22px 18px;
      backdrop-filter: blur(10px);
      position:relative;
    }
    .card:before{
      content:"";
      position:absolute; inset:0;
      border-radius:22px;
      pointer-events:none;
      background: radial-gradient(600px 240px at 40% 0%, rgba(29,134,255,.18), transparent 65%);
    }

    .card h2{
      margin:0;
      font-size:22px;
      font-weight:800;
      letter-spacing:.2px;
      position:relative;
    }
    .card .sub{
      margin:8px 0 18px;
      color:var(--muted);
      font-size:13px;
      position:relative;
    }

    .field{ margin:12px 0; position:relative; }
    .label-row{
      display:flex;
      align-items:center;
      justify-content:space-between;
      margin-bottom:8px;
      position:relative;
    }
    label{
      font-size:12px;
      color:#d6e2ff;
      opacity:.9;
      font-weight:600;
      letter-spacing:.2px;
    }
    .link{
      font-size:12px;
      color: rgba(29,134,255,.95);
      text-decoration:none;
      font-weight:600;
    }
    .link:hover{ text-decoration:underline; }

    .input{
      position:relative;
    }
    .input i.left{
      position:absolute;
      left:12px; top:50%;
      transform:translateY(-50%);
      color:rgba(231,238,252,.55);
      font-size:14px;
      pointer-events:none;
    }
    .input i.right{
      position:absolute;
      right:12px; top:50%;
      transform:translateY(-50%);
      color:rgba(231,238,252,.55);
      font-size:14px;
      pointer-events:none;
      opacity:.9;
    }
    input{
      width:100%;
      height:46px;
      border-radius:12px;
      border:1px solid var(--stroke2);
      background: rgba(7,12,18,.35);
      color:var(--text);
      outline:none;
      padding:0 42px 0 38px;
      font-size:14px;
      transition:.2s ease;
      box-shadow: 0 0 0 1px rgba(255,255,255,.03) inset;
    }
    input::placeholder{ color:rgba(169,183,207,.65); }
    input:focus{
      border-color: rgba(29,134,255,.65);
      box-shadow: 0 0 0 4px rgba(29,134,255,.16);
    }

    /* info box */
    .notice{
      margin:14px 0 16px;
      display:flex;
      gap:10px;
      align-items:flex-start;
      padding:12px 12px;
      border-radius:12px;
      background: rgba(29,134,255,.10);
      border:1px solid rgba(29,134,255,.18);
      color: rgba(231,238,252,.86);
      position:relative;
    }
    .notice i{
      margin-top:2px;
      color: rgba(29,134,255,.95);
    }
    .notice span{
      font-size:12px;
      line-height:1.45;
      color: rgba(231,238,252,.78);
    }

    .notice.error{
      background: rgba(220,38,38,.12);
      border:1px solid rgba(220,38,38,.28);
    }
    .notice.error i,
    .notice.error span{
      color: #fecaca;
    }

    /* button */
    .btn{
      width:100%;
      height:52px;
      border:0;
      border-radius:14px;
      cursor:pointer;
      font-weight:800;
      font-size:14px;
      color:#fff;
      background: linear-gradient(180deg, var(--blue), var(--blue2));
      box-shadow: 0 20px 38px rgba(29,134,255,.22), 0 0 0 1px rgba(255,255,255,.10) inset;
      display:flex;
      align-items:center;
      justify-content:center;
      gap:10px;
      transition:.2s ease;
      position:relative;
    }
    .btn:hover{ filter:brightness(1.06); transform: translateY(-1px); }
    .btn:active{ transform: translateY(0px); filter:brightness(.98); }

    /* bottom links */
    .footer-links{
      width:min(440px, 100%);
      display:flex;
      justify-content:center;
      gap:18px;
      margin-top:18px;
      color:rgba(169,183,207,.85);
      font-size:12px;
      flex-wrap:wrap;
    }
    .footer-links a{
      color:rgba(169,183,207,.85);
      text-decoration:none;
    }
    .footer-links a:hover{ color:#fff; text-decoration:underline; }
    .copy{
      margin-top:10px;
      color:rgba(169,183,207,.55);
      font-size:11px;
      text-align:center;
    }
  </style>
</head>

<body>
  <main class="page">
    <header class="brand">
      <div class="logo"><i class="fa-solid fa-bag-shopping"></i></div>
      <h1>TechStore Admin</h1>
      <p>Hệ thống quản trị • E-commerce Management</p>
    </header>

    <section class="card" aria-label="Admin Login">
      <h2>Chào mừng trở lại</h2>
      <p class="sub">Vui lòng nhập thông tin quản trị để tiếp tục.</p>

      <form method="post" action="loginpage.php" novalidate>
        <div class="field">
          <div class="label-row">
            <label for="user">Tài khoản / Email Admin</label>
          </div>
          <div class="input">
            <i class="fa-regular fa-at left"></i>
            <input id="user" name="username" type="text" placeholder="vd: admin@techstore.vn" autocomplete="username" value="<?php echo e($usernameInput); ?>" />
          </div>
        </div>

        <div class="field">
          <div class="label-row">
            <label for="pass">Mật khẩu</label>
            <a class="link" href="#">Quên mật khẩu?</a>
          </div>
          <div class="input">
            <i class="fa-solid fa-lock left"></i>
            <input id="pass" name="password" type="password" placeholder="Nhập mật khẩu" autocomplete="current-password" />
            <i class="fa-regular fa-eye right"></i>
          </div>
        </div>

        <?php if ($errorMessage !== ''): ?>
        <div class="notice error">
          <i class="fa-solid fa-circle-exclamation"></i>
          <span><?php echo e($errorMessage); ?></span>
        </div>
        <?php endif; ?>

        <div class="notice">
          <i class="fa-solid fa-shield-halved"></i>
          <span>
            Đây là khu vực quản trị an toàn. Địa chỉ IP có thể được ghi log để phục vụ mục đích bảo mật.
          </span>
        </div>

        <button class="btn" type="submit">
          Vào Dashboard
          <i class="fa-solid fa-arrow-right-to-bracket"></i>
        </button>
      </form>
    </section>

    <nav class="footer-links" aria-label="Footer">
      <a href="#">Trung tâm trợ giúp</a>
      <span>•</span>
      <a href="#">Chính sách bảo mật</a>
      <span>•</span>
      <a href="#">Liên hệ hỗ trợ</a>
    </nav>
    <div class="copy">© 2026 TechStore Admin. All rights reserved.</div>
  </main>
</body>
</html>