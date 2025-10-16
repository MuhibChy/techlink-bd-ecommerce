<?php
// Basic shop listing with filters (brand, category, price range)
$pdo = db_connect();
$category = $_GET['category'] ?? '';
$brand = $_GET['brand'] ?? '';
$min = isset($_GET['min']) ? (float)$_GET['min'] : 0;
$max = isset($_GET['max']) ? (float)$_GET['max'] : 1000000;

$sql = "SELECT * FROM products WHERE price BETWEEN :min AND :max";
$params = ['min' => $min, 'max' => $max];
if ($category) { $sql .= " AND category = :cat"; $params['cat'] = $category; }
if ($brand) { $sql .= " AND brand = :brand"; $params['brand'] = $brand; }
$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$products = $stmt->fetchAll();
?>
<section>
    <h1>Shop</h1>
    <form method="get" class="filters">
        <input type="hidden" name="page" value="shop">
        <select name="category">
            <option value="">All Categories</option>
            <option value="Laptops">Laptops</option>
            <option value="Desktops">Desktops</option>
            <option value="Components">Components</option>
            <option value="Gadgets">Gadgets</option>
            <option value="Accessories">Accessories</option>
        </select>
        <input type="text" name="brand" placeholder="Brand" value="<?php echo htmlspecialchars($brand); ?>">
        <input type="number" name="min" placeholder="Min" value="<?php echo htmlspecialchars($min); ?>">
        <input type="number" name="max" placeholder="Max" value="<?php echo htmlspecialchars($max); ?>">
        <button class="btn">Filter</button>
    </form>

    <div class="product-grid">
        <?php foreach ($products as $p): ?>
            <div class="product-card glass">
                <img src="<?php echo BASE_URL; ?>/assets/images/<?php echo $p['image'] ?: 'placeholder.png'; ?>" alt="<?php echo htmlspecialchars($p['name']); ?>">
                <h3><?php echo htmlspecialchars($p['name']); ?></h3>
                <p class="price"><?php echo CURRENCY . ' ' . number_format($p['price'], 2); ?></p>
                <a href="<?php echo BASE_URL; ?>/?page=product&id=<?php echo $p['id']; ?>" class="btn small">View</a>
            </div>
        <?php endforeach; ?>
    </div>
</section>