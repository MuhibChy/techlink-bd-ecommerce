<?php
require_once __DIR__ . '/config.php';

try {
    $pdo = db_connect();
    
    // Create admin user if doesn't exist
    $email = 'admin@techlink.com';
    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->execute([$email]);
    if (!$stmt->fetch()) {
        $stmt = $pdo->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, 'admin')");
        $password = 'admin123!@#'; // Change this in production!
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $stmt->execute(['Admin User', $email, $hashed]);
        echo "Admin user created successfully!\n";
    } else {
        echo "Admin user already exists.\n";
    }
    
} catch (Exception $e) {
    die("Error: " . $e->getMessage());
}