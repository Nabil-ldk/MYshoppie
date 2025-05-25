<?php
session_start();

// Determine location for dynamic path resolution
$current_path = $_SERVER['PHP_SELF'];

$is_user = str_contains($current_path, '/user/');
$is_admin = str_contains($current_path, '/admin/');

$prefix = $is_user ? '' : ($is_admin ? '../user/' : 'user/');
$img_path = $prefix . 'logo.png';
$cart_path = $prefix . 'viewCart.php';
$login_path = $prefix . 'form/login.php';
$logout_path = $prefix . 'form/logout.php';
$tshirt_path = $prefix . 'T-Shirt.php';
$hoodie_path = $prefix . 'Hoodie.php';
$mug_path = $prefix . 'Mug.php';
$admin_path = $is_admin ? 'mystore.php' : ($is_user ? '../admin/mystore.php' : 'admin/mystore.php');
$home_path = $is_user ? '../index.php' : ($is_admin ? '../index.php' : 'index.php');

$count = isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0;
?>

<!-- Header Starts -->
<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>
    .navbar-brand img {
        width: 200px;
        height: auto;
        margin-left: 10px;
    }
    .navbar {
        padding: 0.3rem 1rem;
    }
</style>

<nav class="navbar bg-body-tertiary">
    <div class="container-fluid font-monospace">
        <a class="navbar-brand pv-2" href="<?= $home_path ?>"><img src="<?= $img_path ?>" alt=""></a>
        <div class="d-flex">
            <a href="<?= $home_path ?>" class="text-warning text-decoration-none pe-2">
                | <i class="fa-solid fa-house-user"></i> Home |
            </a>
            <a href="<?= $cart_path ?>" class="text-warning text-decoration-none pe-2">
                <i class="fa-solid fa-cart-shopping"></i> Cart(<?= $count ?>) |
            </a>
            <span class="text-warning pe-2">
                <i class="fa-solid fa-user-tie"></i> Hello,
                <?php if(isset($_SESSION['user'])): ?>
                    <?= $_SESSION['user']; ?>
                    | <a href="<?= $logout_path ?>" class="text-warning text-decoration-none pe-2">
                        <i class="fa-solid fa-right-from-bracket"></i> Logout
                    </a>|
                <?php else: ?>
                    | <a href="<?= $login_path ?>" class="text-warning text-decoration-none pe-2">
                        <i class="fa-solid fa-right-to-bracket"></i> Login
                    </a>|
                <?php endif; ?>
                <a href="<?= $admin_path ?>" class="text-warning text-decoration-none pe-2">
                    <i class="fa-solid fa-screwdriver-wrench"></i> Admin
                </a>|
            </span>
        </div>
    </div>
</nav>

<div class="bg-danger sticky-top font-monospace">
    <ul class="list-unstyled d-flex justify-content-center m-0">
        <li><a href="<?= $tshirt_path ?>" class="text-decoration-none text-white fw-bold fs-4 px-5">T-SHIRT</a></li>
        <li><a href="<?= $hoodie_path ?>" class="text-decoration-none text-white fw-bold fs-4 px-5">HOODIE</a></li>
        <li><a href="<?= $mug_path ?>" class="text-decoration-none text-white fw-bold fs-4 px-5">MUG</a></li>
    </ul>
</div>
