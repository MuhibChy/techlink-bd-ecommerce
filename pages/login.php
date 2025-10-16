<?php
require_once __DIR__ . '/../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    
    $pdo = db_connect();
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();
    
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = [
            'id' => $user['id'],
            'email' => $user['email'],
            'name' => $user['name'],
            'role' => $user['role']
        ];
        header('Location: ' . BASE_URL . ($user['role'] === 'admin' ? '/?page=admin' : '/?page=dashboard'));
        exit;
    }
    $error = 'Invalid credentials';
}
?>

<section class="auth-section">
    <div class="auth-form glass">
        <h2>Login</h2>
        <?php if (isset($error)): ?>
            <div class="error"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>
        
        <form method="post" action="<?php echo BASE_URL; ?>/?page=login">
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" required>
            </div>
            
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required>
            </div>
            
            <button type="submit" class="btn primary">Login</button>
        </form>
        
        <p>Don't have an account? <a href="<?php echo BASE_URL; ?>/?page=register">Register</a></p>
    </div>
</section>