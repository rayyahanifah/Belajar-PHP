<?php
$uploadedImages = [];
if (is_dir('upload')) {
    $uploadedImages = array_values(array_diff(scandir('upload'), ['.', '..']));
}

$message = '';
$messageType = '';

if (isset($_POST['submit'])) {
    $nama = $_FILES['gambar']['name'] ?? '';
    $asal = $_FILES['gambar']['tmp_name'] ?? '';
    $error = $_FILES['gambar']['error'] ?? 0;
    $size = $_FILES['gambar']['size'] ?? 0;
    $format = $_FILES['gambar']['type'] ?? '';

    if($error == 0){
        if($size < 1000000){
            if($format == 'image/jpeg' || $format == 'image/png' || $format == 'image/jpg'){
                $target_dir = 'upload/';
                if (!is_dir($target_dir)) {
                    mkdir($target_dir, 0755, true);
                }
                $target_file = $target_dir . basename($nama);
                
                if (move_uploaded_file($asal, $target_file)) {
                    $message = 'File berhasil diupload!';
                    $messageType = 'success';
                    $uploadedImages = array_values(array_diff(scandir('upload'), ['.', '..']));
                } else {
                    $message = 'Gagal memindahkan file.';
                    $messageType = 'error';
                }
            }
            else{
                $message = 'Hanya format JPG, JPEG, dan PNG yang diperbolehkan.';
                $messageType = 'error';
            }
        }
        else{
            $message = 'Ukuran file terlalu besar. Maksimal 1MB.';
            $messageType = 'error';
        }
    }else{
        $message = 'Terjadi kesalahan saat mengunggah file.';
        $messageType = 'error';
    }
}

?>

<form action="index2.php" method="post" enctype="multipart/form-data">
    <input type="file" name="gambar" accept=".jpg,.jpeg,.png,image/jpeg,image/png" required>
    <input type="submit" name="submit" value="Upload">
</form>

<?php if (!empty($message)): ?>
    <p style="color: <?php echo $messageType === 'success' ? 'green' : 'red'; ?>; margin-top: 10px;">
        <?php echo htmlspecialchars($message); ?>
    </p>
<?php endif; ?>

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