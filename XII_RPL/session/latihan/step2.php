<?php
session_start();

if (!isset($_SESSION['step1'])) {
    $_SESSION['error'] = "Silakan isi data diri terlebih dahulu sebelum mengakses Langkah 2.";
    header("Location: step1.php");
    exit;
}

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tipe_tiket = $_POST['tipe_tiket'] ?? '';
    $workshop = $_POST['workshop'] ?? [];

    if (empty($tipe_tiket)) {
        $errors[] = "Silakan pilih tipe tiket.";
    }

    if (empty($errors)) {
        $_SESSION['step2'] = [
            'tipe_tiket' => $tipe_tiket,
            'workshop' => $workshop
        ];
        header("Location: step3.php");
        exit;
    }
}

$saved_ticket = $_SESSION['step2']['tipe_tiket'] ?? '';
$saved_workshops = $_SESSION['step2']['workshop'] ?? [];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Langkah 2: Pilih Tiket & Workshop</title>
</head>
<body>
    <h2>Langkah 2: Pilih Tiket & Workshop</h2>

    <?php foreach ($errors as $err): ?>
        <p style="color: red;"><?= htmlspecialchars($err) ?></p>
    <?php endforeach; ?>

    <form action="" method="POST">
        <h3>Tipe Tiket:</h3>
        <label>
            <input type="radio" name="tipe_tiket" value="Regular" <?= $saved_ticket === 'Regular' ? 'checked' : '' ?>> Regular
        </label><br>
        <label>
            <input type="radio" name="tipe_tiket" value="VIP" <?= $saved_ticket === 'VIP' ? 'checked' : '' ?>> VIP
        </label><br>

        <h3>Pilih Workshop:</h3>
        <label>
            <input type="checkbox" name="workshop[]" value="PHP Security" <?= in_array('PHP Security', $saved_workshops) ? 'checked' : '' ?>> PHP Security
        </label><br>
        <label>
            <input type="checkbox" name="workshop[]" value="Laravel Masterclass" <?= in_array('Laravel Masterclass', $saved_workshops) ? 'checked' : '' ?>> Laravel Masterclass
        </label><br>
        <label>
            <input type="checkbox" name="workshop[]" value="Database Optimization" <?= in_array('Database Optimization', $saved_workshops) ? 'checked' : '' ?>> Database Optimization
        </label><br><br>

        <a href="step1.php">&laquo; Kembali</a> | 
        <button type="submit">Lanjut ke Ringkasan &raquo;</button>
    </form>
</body>
</html>