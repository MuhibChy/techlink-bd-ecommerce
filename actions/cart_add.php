<?php
require_once __DIR__ . '/../config.php';
if ($_SERVER['REQUEST_METHOD'] !== 'POST') { header('Location: ' . BASE_URL); exit; }
$id = (int)($_POST['product_id'] ?? 0);
$qty = max(1, (int)($_POST['qty'] ?? 1));
if (!$id) { header('Location: ' . BASE_URL); exit; }
if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
if (isset($_SESSION['cart'][$id])) $_SESSION['cart'][$id] += $qty; else $_SESSION['cart'][$id] = $qty;
header('Location: ' . BASE_URL . '/?page=cart');
