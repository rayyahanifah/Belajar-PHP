<?php
// Pengaturan keamanan sesi sebelum session_start()
ini_set('session.cookie_httponly', 1);
ini_set('session.use_only_cookies', 1);
ini_set('session.cookie_samesite', 'Lax');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Koneksi Database
$host = 'localhost';
$db   = 'db_ujicoba';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass, [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ]);
} catch (PDOException $e) {
    die("Koneksi Database Gagal: " . $e->getMessage());
}

if (!isset($_SESSION['user_id']) && isset($_COOKIE['remember_me'])) {
    $cookieParts = explode(':', $_COOKIE['remember_me']);

    if (count($cookieParts) === 2) {
        list($selector, $validator) = $cookieParts;

        $stmt = $pdo->prepare("SELECT * FROM users WHERE remember_selector = ? AND remember_expires_at > NOW()");
        $stmt->execute([$selector]);
        $user = $stmt->fetch();

        if ($user && hash_equals($user['remember_validator_hash'], hash('sha256', $validator))) {
            session_regenerate_id(true);

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
        }
    }
}