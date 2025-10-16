<?php
require_once __DIR__ . '/../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $phone = $_POST['phone'] ?? '';
    
    $pdo = db_connect();
    
    // Check if email exists
    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->execute([$email]);
    if ($stmt->fetch()) {
        $error = 'Email already registered';
    } else {
        // Create new user
        $stmt = $pdo->prepare("INSERT INTO users (name, email, phone, password, role) VALUES (?, ?, ?, ?, 'customer')");
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        if ($stmt->execute([$name, $email, $phone, $hashed])) {
            header('Location: ' . BASE_URL . '/?page=login&registered=1');
            exit;
        }
        $error = 'Registration failed';
    }
}
?>

<section class="auth-section">
    <div class="auth-form glass">
        <h2>Register</h2>
        <?php if (isset($error)): ?>
            <div class="error"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>
        
        <form method="post" action="<?php echo BASE_URL; ?>/?page=register">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" required>
            </div>
            
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" required>
            </div>
            
            <div class="form-group">
                <label>Phone</label>
                <input type="text" name="phone" required>
            </div>
            
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" required minlength="6">
            </div>
            
            <button type="submit" class="btn primary">Register</button>
        </form>
        
        <p>Already have an account? <a href="<?php echo BASE_URL; ?>/?page=login">Login</a></p>
    </div>
</section>