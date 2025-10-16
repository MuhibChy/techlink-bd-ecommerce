<?php
if (empty($_SESSION['cart'])) {
    echo '<p>Your cart is empty. <a href="?page=shop">Shop now</a></p>';
    return;
}
$pdo = db_connect();
$cart = $_SESSION['cart'];
$ids = array_keys($cart);
$in = implode(',', array_fill(0, count($ids), '?'));
$stmt = $pdo->prepare("SELECT id,price FROM products WHERE id IN ($in)");
$stmt->execute($ids);
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
$total = 0;
foreach ($products as $p) { $total += $p['price'] * $cart[$p['id']]; }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // create order (simplified)
    $customer_name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $payment_method = $_POST['payment_method'];
    $stmt = $pdo->prepare("INSERT INTO orders (customer_name,phone,address,total,payment_method,status,created_at) VALUES (?,?,?,?,?,?,NOW())");
    $stmt->execute([$customer_name,$phone,$address,$total,$payment_method,'pending']);
    $orderId = $pdo->lastInsertId();
    foreach ($products as $p) {
        $qty = $cart[$p['id']];
        $stmt = $pdo->prepare("INSERT INTO order_items (order_id,product_id,price,qty) VALUES (?,?,?,?)");
        $stmt->execute([$orderId,$p['id'],$p['price'],$qty]);
    }
    // clear cart
    unset($_SESSION['cart']);
    echo "<h2>Order placed</h2><p>Your order #$orderId has been placed. We'll contact you shortly.</p>";
    return;
}
?>
<section>
    <h1>Checkout</h1>
    <form method="post" class="checkout-form glass">
        <label>Name</label>
        <input name="name" required>
        <label>Phone</label>
        <input name="phone" required>
        <label>Address</label>
        <textarea name="address" required></textarea>
        <label>Payment Method</label>
        <select name="payment_method">
            <option value="cod">Cash on Delivery</option>
            <option value="bkash">bKash (QR / Mobile)</option>
            <option value="nagad">Nagad</option>
            <option value="rocket">Rocket</option>
            <option value="upay">Upay</option>
        </select>
        <div class="order-summary">
            <p>Total: <?php echo CURRENCY . ' ' . number_format($total,2); ?></p>
        </div>
        <button class="btn primary">Place Order</button>
    </form>
</section>