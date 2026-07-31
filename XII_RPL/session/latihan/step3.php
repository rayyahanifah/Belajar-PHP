<?php
session_start();

if (!isset($_SESSION['step1'])) {
    $_SESSION['error'] = "Silakan isi data diri terlebih dahulu.";
    header("Location: step1.php");
    exit;
}

if (!isset($_SESSION['step2'])) {
    header("Location: step2.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && $_POST['action'] === 'confirm') {
        $registration_data = [
            'id' => time(),
            'data_diri' => $_SESSION['step1'],
            'pilihan' => $_SESSION['step2'],
            'created_at' => date('Y-m-d H:i:s')
        ];

        $file = 'pendaftaran.json';
        $current_data = file_exists($file) ? json_decode(file_get_contents($file), true) : [];
        $current_data[] = $registration_data;
        file_put_contents($file, json_encode($current_data, JSON_PRETTY_PRINT));

        unset($_SESSION['step1']);
        unset($_SESSION['step2']);

        $_SESSION['flash_success'] = "Pendaftaran berhasil dikonfirmasi dan disimpan!";
        header("Location: success.php");
        exit;

    } elseif (isset($_POST['action']) && $_POST['action'] === 'reset') {
        unset($_SESSION['step1']);
        unset($_SESSION['step2']);
        header("Location: step1.php");
        exit;
    }
}

$step1 = $_SESSION['step1'];
$step2 = $_SESSION['step2'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Langkah 3: Ringkasan & Konfirmasi</title>
</head>
<body>
    <h2>Langkah 3: Ringkasan & Konfirmasi</h2>

    <table border="1" cellpadding="8" cellspacing="0">
        <tr>
            <th colspan="2">Data Diri</th>
        </tr>
        <tr>
            <td>Nama Lengkap</td>
            <td><?= htmlspecialchars($step1['nama']) ?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><?= htmlspecialchars($step1['email']) ?></td>
        </tr>
        <tr>
            <td>Nomor Telepon</td>
            <td><?= htmlspecialchars($step1['telepon']) ?></td>
        </tr>
        <tr>
            <th colspan="2">Pilihan Tiket & Workshop</th>
        </tr>
        <tr>
            <td>Tipe Tiket</td>
            <td><?= htmlspecialchars($step2['tipe_tiket']) ?></td>
        </tr>
        <tr>
            <td>Workshop</td>
            <td>
                <?= !empty($step2['workshop']) ? htmlspecialchars(implode(', ', $step2['workshop'])) : '<em>Tidak memilih workshop</em>' ?>
            </td>
        </tr>
    </table>

    <br>

    <form action="" method="POST" style="display:inline;">
        <button type="submit" name="action" value="reset" onclick="return confirm('Apakah Anda yakin ingin membatalkan?')">Batal / Reset</button>
        <button type="submit" name="action" value="confirm">Konfirmasi & Simpan</button>
    </form>
</body>
</html>