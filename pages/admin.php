<?php
require_once __DIR__ . '/../config.php';

// Check if user is logged in and is admin
if (empty($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header('Location: ' . BASE_URL . '/?page=login');
    exit;
}

$pdo = db_connect();

// Get basic stats
$stats = [
    'products' => $pdo->query("SELECT COUNT(*) FROM products")->fetchColumn(),
    'orders' => $pdo->query("SELECT COUNT(*) FROM orders")->fetchColumn(),
    'users' => $pdo->query("SELECT COUNT(*) FROM users")->fetchColumn(),
    'revenue' => $pdo->query("SELECT SUM(total) FROM orders WHERE status != 'cancelled'")->fetchColumn()
];

// Get recent orders
$orders = $pdo->query("SELECT * FROM orders ORDER BY created_at DESC LIMIT 5")->fetchAll();
?>

<section class="admin-dashboard">
    <h1>Admin Dashboard</h1>
    
    <div class="stats-grid">
        <div class="stat-card glass">
            <h3>Products</h3>
            <p><?php echo $stats['products']; ?></p>
        </div>
        <div class="stat-card glass">
            <h3>Orders</h3>
            <p><?php echo $stats['orders']; ?></p>
        </div>
        <div class="stat-card glass">
            <h3>Users</h3>
            <p><?php echo $stats['users']; ?></p>
        </div>
        <div class="stat-card glass">
            <h3>Revenue</h3>
            <p><?php echo CURRENCY . ' ' . number_format($stats['revenue'], 2); ?></p>
        </div>
    </div>
    
    <div class="admin-actions glass">
        <h3>Quick Actions</h3>
        <a href="<?php echo BASE_URL; ?>/?page=admin&section=products" class="btn">Manage Products</a>
        <a href="<?php echo BASE_URL; ?>/?page=admin&section=orders" class="btn">View Orders</a>
        <a href="<?php echo BASE_URL; ?>/?page=admin&section=users" class="btn">Manage Users</a>
    </div>
    
    <div class="recent-orders glass">
        <h3>Recent Orders</h3>
        <table>
            <tr>
                <th>Order ID</th>
                <th>Customer</th>
                <th>Total</th>
                <th>Status</th>
                <th>Date</th>
            </tr>
            <?php foreach ($orders as $order): ?>
            <tr>
                <td>#<?php echo $order['id']; ?></td>
                <td><?php echo htmlspecialchars($order['customer_name']); ?></td>
                <td><?php echo CURRENCY . ' ' . number_format($order['total'], 2); ?></td>
                <td><?php echo htmlspecialchars($order['status']); ?></td>
                <td><?php echo date('Y-m-d', strtotime($order['created_at'])); ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
    </div>
</section>