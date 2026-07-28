<?php
include 'koneksi.php';

// Ambil data
$nama   = $_POST['nama'];
$alamat = $_POST['alamat'];

// Simpan data
mysqli_query($conn, "INSERT INTO mahasiswa VALUES ('$nama', '$alamat')");
echo "<h3>Data Tersimpan!</h3>";

// Tampilkan data dengan WHILE
$ambil = mysqli_query($conn, "SELECT * FROM mahasiswa");
echo "<table border='1'>
        <tr><th>No</th><th>Nama</th><th>Alamat</th></tr>";

$no = 1;
while ($row = mysqli_fetch_array($ambil)) {
    echo "<tr>
            <td>$no</td>
            <td>{$row['nama']}</td>
            <td>{$row['alamat']}</td>
          </tr>";
    $no++;
}
echo "</table>";

// Contoh FOR (Menghitung total data yang ada)
echo "<br>Riwayat entri: ";
for ($i = 1; $i < $no; $i++) {
    echo "[$i] ";
}

echo "<br><br><a href='form.html'>Kembali</a>";
?>
