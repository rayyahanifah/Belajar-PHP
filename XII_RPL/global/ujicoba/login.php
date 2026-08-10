<?php
require_once 'config.php';

if (isset($_SESSION['user_id'])) {
    header("Location: dashboard.php");
    exit();
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $remember = isset($_POST['remember']);

    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        session_regenerate_id(true);

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['email'] = $user['email'];

        if ($remember) {
            $selector = bin2hex(random_bytes(16));
            $validator = bin2hex(random_bytes(32));
            $validator_hash = hash('sha256', $validator);

            $expires_seconds = 30 * 24 * 60 * 60; 
            $expires_at = date('Y-m-d H:i:s', time() + $expires_seconds);

            $stmtUpdate = $pdo->prepare("UPDATE users SET remember_selector = ?, remember_validator_hash = ?, remember_expires_at = ? WHERE id = ?");
            $stmtUpdate->execute([$selector, $validator_hash, $expires_at, $user['id']]);

            setcookie(
                'remember_me',
                $selector . ':' . $validator,
                [
                    'expires'  => time() + $expires_seconds,
                    'path'     => '/',
                    'domain'   => '',
                    'secure'   => isset($_SERVER['HTTPS']), 
                    'httponly' => true,                     
                    'samesite' => 'Lax'                     
                ]
            );
        }

        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Email atau password salah.";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Aplikasi Saya</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="auth-container">
        <div class="auth-header">
            <h2>Selamat Datang Kembali</h2>
            <p>Silakan masuk ke akun Anda</p>
        </div>

        <?php if (isset($_GET['registered'])): ?>
            <div class="alert alert-success">Pendaftaran berhasil! Silakan login.</div>
        <?php endif; ?>

        <?php if ($error): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <form action="login.php" method="POST">
            <div class="form-group">
                <label for="email">Email</label>
    <input type="email" id="email" name="email" class="form-control" autocomplete="email" placeholder="nama@email.com" required>
</div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="••••••••" required>
            </div>

            <div class="form-group checkbox-group">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Ingat Saya</label>
            </div>

            <button type="submit" class="btn">Login</button>
        </form>

        <div class="auth-footer">
            Belum punya akun? <a href="register.php">Daftar sekarang</a>
        </div>
    </div>
</body>
</html>