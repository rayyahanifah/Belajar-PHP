<?php
require_once 'auth.php'; 

$message = '';
$error = '';

$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['avatar'])) {
    $file = $_FILES['avatar'];

    if ($file['error'] !== UPLOAD_ERR_OK) {
        $error = "Terjadi kesalahan saat mengunggah berkas. Kode error: " . $file['error'];
    }
    elseif ($file['size'] > 2 * 1024 * 1024) {
        $error = "Ukuran file terlalu besar. Maksimal 2 MB.";
    }
    else {
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimeType = finfo_file($finfo, $file['tmp_name']);
        finfo_close($finfo);

        $allowedMimeTypes = [
            'image/jpeg' => 'jpg',
            'image/png'  => 'png',
            'image/webp' => 'webp'
        ];

        if (!array_key_exists($mimeType, $allowedMimeTypes)) {
            $error = "Format file tidak diizinkan. Hanya format JPG, PNG, dan WebP yang diperbolehkan.";
        } else {
            $ext = $allowedMimeTypes[$mimeType];
            $newFilename = bin2hex(random_bytes(16)) . '.' . $ext;

            $uploadDir = __DIR__ . '/uploads/avatars/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }

            $targetPath = $uploadDir . $newFilename;

            if (move_uploaded_file($file['tmp_name'], $targetPath)) {
                if ($user['avatar'] !== 'default.png' && file_exists($uploadDir . $user['avatar'])) {
                    unlink($uploadDir . $user['avatar']);
                }

                $updateStmt = $pdo->prepare("UPDATE users SET avatar = ? WHERE id = ?");
                $updateStmt->execute([$newFilename, $_SESSION['user_id']]);

                $message = "Foto profil berhasil diperbarui!";
                $user['avatar'] = $newFilename; // Update state tampilan
            } else {
                $error = "Gagal memindahkan file yang diunggah.";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="auth-container">
        <div class="auth-header">
            <h2>Profil Pengguna</h2>
            <p>Kelola data akun dan foto profil</p>
        </div>

        <?php if ($message): ?>
            <div class="alert alert-success"><?= htmlspecialchars($message) ?></div>
        <?php endif; ?>

        <?php if ($error): ?>
            <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <img src="uploads/avatars/<?= htmlspecialchars($user['avatar']) ?>" alt="Avatar" class="avatar-preview">

        <div style="text-align: center; margin-bottom: 1.5rem;">
            <h3><?= htmlspecialchars($user['username']) ?></h3>
            <p style="color: var(--text-muted); font-size: 0.9rem;"><?= htmlspecialchars($user['email']) ?></p>
        </div>

        <form action="profile.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Ganti Foto Profil (Maks 2MB)</label>
                <input type="file" name="avatar" class="form-control" accept="image/jpeg,image/png,image/webp" required>
            </div>

            <button type="submit" class="btn">Unggah Foto Baru</button>
        </form>

        <div class="auth-footer" style="display: flex; gap: 10px; justify-content: center; margin-top: 1.5rem;">
            <a href="dashboard.php" class="btn btn-secondary">Dashboard</a>
            <a href="logout.php" class="btn btn-secondary" style="background-color: var(--danger-bg); color: var(--danger-color);">Logout</a>
        </div>
    </div>
</body>
</html>