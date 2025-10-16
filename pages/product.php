<?php
$id = $_GET['id'] ?? 0;
$pdo = db_connect();
$stmt = $pdo->prepare("SELECT * FROM products WHERE id = :id");
$stmt->execute(['id' => $id]);
$product = $stmt->fetch();
if (!$product) {
    echo '<h2>Product not found</h2>';
    return;
}
?>
<section class="product-detail">
    <div class="prod-left glass">
        <img src="<?php echo BASE_URL; ?>/assets/images/<?php echo $product['image'] ?: 'placeholder.png'; ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
    </div>
    <div class="prod-right glass">
        <h1><?php echo htmlspecialchars($product['name']); ?></h1>
        <p class="price"><?php echo CURRENCY . ' ' . number_format($product['price'], 2); ?></p>
        <p><?php echo nl2br(htmlspecialchars($product['description'])); ?></p>
        <form method="post" action="<?php echo BASE_URL; ?>/actions/cart_add.php">
            <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
            <label>Quantity</label>
            <input type="number" name="qty" value="1" min="1">
            <button class="btn primary">Add to Cart</button>
        </form>
    </div>
</section>