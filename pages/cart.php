<?php
$cart = $_SESSION['cart'] ?? [];
$ids = array_keys($cart);
$products = [];
if ($ids) {
    $pdo = db_connect();
    $in = implode(',', array_fill(0, count($ids), '?'));
    $stmt = $pdo->prepare("SELECT id,name,price FROM products WHERE id IN ($in)");
    $stmt->execute($ids);
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
$subtotal = 0;
?>
<section>
    <h1>Your Cart</h1>
    <?php if (!$products): ?>
        <p>Your cart is empty.</p>
    <?php else: ?>
        <table class="cart-table">
            <tr><th>Product</th><th>Price</th><th>Qty</th><th>Total</th></tr>
            <?php foreach ($products as $p): $qty = $cart[$p['id']]; $line = $p['price'] * $qty; $subtotal += $line; ?>
                <tr>
                    <td><?php echo htmlspecialchars($p['name']); ?></td>
                    <td><?php echo CURRENCY . ' ' . number_format($p['price'],2); ?></td>
                    <td><?php echo $qty; ?></td>
                    <td><?php echo CURRENCY . ' ' . number_format($line,2); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <div class="cart-summary glass">
            <p>Subtotal: <?php echo CURRENCY . ' ' . number_format($subtotal,2); ?></p>
            <a href="<?php echo BASE_URL; ?>/?page=checkout" class="btn primary">Checkout</a>
        </div>
    <?php endif; ?>
</section>