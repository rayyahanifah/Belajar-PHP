<?php
$uploadDir = __DIR__ . '/upload';

if (isset($_POST['submit'])) {
    $nama = $_FILES['gambar']['name'] ?? '';
    $asal = $_FILES['gambar']['tmp_name'] ?? '';
    $error = $_FILES['gambar']['error'] ?? 0;
    $size = $_FILES['gambar']['size'] ?? 0;
    $format = $_FILES['gambar']['type'] ?? '';

    if ($nama && is_uploaded_file($asal)) {
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $targetFile = $uploadDir . '/' . basename($nama);
        if (move_uploaded_file($asal, $targetFile)) {
            echo '<p>File berhasil diunggah: ' . htmlspecialchars($nama) . '</p>';
        } else {
            echo '<p>Gagal memindahkan file ke folder upload.</p>';
        }
    } else {
        echo '<p>Tidak ada file yang diunggah atau terjadi kesalahan.</p>';
    }
}

function listUploadedImages(string $dir): array
{
    $images = [];
    if (!is_dir($dir)) {
        return $images;
    }

    $files = scandir($dir);
    foreach ($files as $file) {
        if ($file === '.' || $file === '..') {
            continue;
        }

        $path = $dir . '/' . $file;
        if (is_file($path)) {
            $ext = strtolower(pathinfo($path, PATHINFO_EXTENSION));
            if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp'], true)) {
                $images[] = $file;
            }
        }
    }

    return $images;
}

$uploadedImages = listUploadedImages($uploadDir);
?>

<form action="index.php" method="post" enctype="multipart/form-data">
    <input type="file" name="gambar">
    <input type="submit" name="submit" value="Upload">
</form>

<?php if (!empty($uploadedImages)): ?>
    <h2>Gambar yang sudah diupload</h2>
    <div style="display:flex;flex-wrap:wrap;gap:16px;margin-top:12px;">
        <?php foreach ($uploadedImages as $image): ?>
            <div style="width:180px; text-align:center;">
                <img src="upload/<?php echo rawurlencode($image); ?>" alt="<?php echo htmlspecialchars($image); ?>" style="max-width:100%;height:auto;border:1px solid #ccc;padding:4px;">
                <div style="font-size:0.9rem;margin-top:8px;word-break:break-word;"><?php echo htmlspecialchars($image); ?></div>
            </div>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <p>Belum ada gambar yang diunggah.</p>
<?php endif; ?>