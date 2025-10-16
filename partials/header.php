<?php
require_once __DIR__ . '/../config.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo SITE_NAME; ?></title>
    <meta name="description" content="Your Trusted Tech Partner in Bangladesh - gadgets, computer parts, and IT services">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>/assets/css/styles.css">
    <script>const BASE_URL = '<?php echo BASE_URL; ?>';</script>
</head>
<body class="app-bg">
<header class="site-header glass">
    <div class="container">
        <div class="brand">
            <div class="logo-placeholder">TechLink</div>
            <div class="tagline">Your Trusted Tech Partner in Bangladesh</div>
        </div>
        <nav class="main-nav">
            <a href="<?php echo BASE_URL; ?>">Home</a>
            <a href="<?php echo BASE_URL; ?>/?page=shop">Shop</a>
            <a href="<?php echo BASE_URL; ?>/?page=services">Services</a>
            <a href="<?php echo BASE_URL; ?>/?page=about">About</a>
            <a href="<?php echo BASE_URL; ?>/?page=blog">Blog</a>
            <a href="<?php echo BASE_URL; ?>/?page=contact">Contact</a>
        </nav>
        <div class="header-actions">
            <a href="<?php echo BASE_URL; ?>/?page=cart" class="cart-link">Cart (<span id="cart-count">0</span>)</a>
            <?php if (empty($_SESSION['user'])): ?>
                <a href="<?php echo BASE_URL; ?>/?page=login" class="btn">Login</a>
            <?php else: ?>
                <a href="<?php echo BASE_URL; ?>/?page=dashboard" class="btn">Dashboard</a>
            <?php endif; ?>
        </div>
    </div>
</header>
<main class="container content">