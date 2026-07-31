<?php
session_start();

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = trim($_POST['nama'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $telepon = trim($_POST['telepon'] ?? '');

    if (empty($nama) || empty($email) || empty($telepon)) {
        $errors[] = "Semua field wajib diisi!";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Format email tidak valid!";
    }

    if (empty($errors)) {
        $_SESSION['step1'] = [
            'nama' => $nama,
            'email' => $email,
            'telepon' => $telepon
        ];
        header("Location: step2.php");
        exit;
    }
}

$guard_error = $_SESSION['error'] ?? null;
unset($_SESSION['error']);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Langkah 1: Data Diri</title>
</head>
<body>
    <h2>Langkah 1: Data Diri</h2>

    <?php if ($guard_error): ?>
        <p style="color: red;"><?= htmlspecialchars($guard_error) ?></p>
    <?php endif; ?>

    <?php foreach ($errors as $err): ?>
        <p style="color: red;"><?= htmlspecialchars($err) ?></p>
    <?php endforeach; ?>

    <form action="" method="POST">
        <label>Nama Lengkap:</label><br>
        <input type="text" name="nama" value="<?= htmlspecialchars($_SESSION['step1']['nama'] ?? '') ?>"><br><br>

        <label>Email:</label><br>
        <input type="email" name="email" value="<?= htmlspecialchars($_SESSION['step1']['email'] ?? '') ?>"><br><br>

        <label>Nomor Telepon:</label><br>
        <input type="text" name="telepon" value="<?= htmlspecialchars($_SESSION['step1']['telepon'] ?? '') ?>"><br><br>

        <button type="submit">Lanjut ke Langkah 2 &raquo;</button>
    </form>
</body>
</html>