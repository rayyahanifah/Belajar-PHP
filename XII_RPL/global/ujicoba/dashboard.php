<?php
require_once 'auth.php'; 
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="auth-container" style="max-width: 500px; text-align: center;">
        <div class="auth-header">
            <h2>Selamat Datang, <?= htmlspecialchars($_SESSION['username']) ?>! 👋</h2>
            <p>Ini adalah halaman dashboard terlindungi.</p>
        </div>

        <div style="background-color: var(--bg-color); padding: 1.25rem; border-radius: 8px; margin-bottom: 1.5rem;">
            <p style="font-size: 0.9rem; color: var(--text-muted); margin-bottom: 0.25rem;">Login sebagai:</p>
            <strong style="color: var(--text-color); font-size: 1rem;"><?= htmlspecialchars($_SESSION['email']) ?></strong>
        </div>

        <div style="display: flex; gap: 10px; justify-content: center;">
            <a href="profile.php" class="btn" style="text-decoration: none;">Pengaturan Profil</a>
            <a href="logout.php" class="btn btn-secondary" style="background-color: var(--danger-bg); color: var(--danger-color);">Logout</a>
        </div>
    </div>
</body>
</html>