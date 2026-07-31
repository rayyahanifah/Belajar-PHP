<?php
session_start();

$message = $_SESSION['flash_success'] ?? null;
unset($_SESSION['flash_success']);

if (!$message) {
    header("Location: step1.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pendaftaran Sukses</title>
</head>
<body>
    <h2 style="color: green;"><?= htmlspecialchars($message) ?></h2>
    <p>Terima kasih telah mendaftar.</p>
    <a href="step1.php">Daftar Baru</a>
</body>
</html>