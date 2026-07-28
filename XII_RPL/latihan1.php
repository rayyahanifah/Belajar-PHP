<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tugas Pemrosesan Formulir PHP</title>
</head>
<body>

    <!-- 1. Struktur HTML Formulir -->
    <h2>Formulir Komentar</h2>
    <form action="" method="POST">
        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="komentar">Isi Komentar:</label><br>
        <textarea id="komentar" name="komentar" rows="4" cols="50" required></textarea><br><br>

        <button type="submit" name="submit">Kirim</button>
    </form>

    <hr>

    <?php
    // 2 & 3. Kode Pemrosesan PHP
    if (isset($_POST['submit'])) {
        // Mengambil input dari form
        $input_nama = $_POST['nama'];
        $input_email = $_POST['email'];
        $input_komentar = $_POST['komentar'];

        // Menampilkan tanggal pemrosesan menggunakan fungsi date()
        $tanggal_kirim = date("d-m-Y H:i:s");

        // Memproses komentar dengan trim() dan strip_tags()
        $komentar_bersih = strip_tags(trim($input_komentar));

        // Menghitung jumlah karakter sebelum dan sesudah di-trim() menggunakan strlen()
        $panjang_sebelum = strlen($input_komentar);
        $panjang_sesudah = strlen(trim($input_komentar));

        echo "<h3>Hasil Pemrosesan:</h3>";
        echo "<b>Tanggal Kirim:</b> " . $tanggal_kirim . "<br>";
        echo "<b>Nama:</b> " . htmlspecialchars($input_nama) . "<br>";
        echo "<b>Email:</b> " . htmlspecialchars($input_email) . "<br>";
        echo "<b>Komentar (Setelah Bersih):</b> " . $komentar_bersih . "<br><br>";

        echo "<h4>Perbandingan Jumlah Karakter Komentar:</h4>";
        echo "* Panjang sebelum trim(): <b>" . $panjang_sebelum . "</b> karakter<br>";
        echo "* Panjang sesudah trim(): <b>" . $panjang_sesudah . "</b> karakter<br>";
        echo "* Selisih karakter yang terbuang (spasi): <b>" . ($panjang_sebelum - $panjang_sesudah) . "</b> karakter";
    }
    ?>

</body>
</html>