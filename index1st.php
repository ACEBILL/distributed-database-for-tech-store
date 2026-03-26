<?php
session_start();

if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    $_SESSION = [];

    if (ini_get('session.use_cookies')) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000, $params['path'], $params['domain'], $params['secure'], $params['httponly']);
    }

    session_destroy();
    header('Location: loginpage.php');
    exit;
}

if (empty($_SESSION['is_logged_in'])) {
    header('Location: loginpage.php');
    exit;
}

if ((int)($_SESSION['role'] ?? 0) !== 1) {
    $_SESSION = [];
    session_destroy();
    header('Location: loginpage.php?error=forbidden');
    exit;
}

$usecase = $_GET['usecase'] ?? 'dashboard';
$allowedUsecases = [
    'dashboard' => __DIR__ . '/admin/dashboard.php',
    'user' => __DIR__ . '/admin/user.php',
    'user_new' => __DIR__ . '/admin/user_new.php',
    'user_edit' => __DIR__ . '/admin/user_edit.php',
    'categories' => __DIR__ . '/admin/categories.php',
    'categories_new' => __DIR__ . '/admin/categories_new.php',
    'products' => __DIR__ . '/admin/products.php',
    'products_new' => __DIR__ . '/admin/products_new.php',
    'products_edit' => __DIR__ . '/admin/products_edit.php',
    'order' => __DIR__ . '/admin/orders.php',
    'order_detail' => __DIR__ . '/admin/orders_detail.php',
    'inventory' => __DIR__ . '/admin/inventory.php',
];

if (!array_key_exists($usecase, $allowedUsecases)) {
    $usecase = 'dashboard';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="asset/css/admin/root.css">
    <link rel="stylesheet" href="asset/css/admin/sidebar.css">
</head>
<body>
    <div class="app">
        <?php include __DIR__ . '/admin/sidebar.php'; ?>
        <?php include $allowedUsecases[$usecase]; ?>
    </div>
</body>
</html>