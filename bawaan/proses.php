<?php
include 'koneksi.php';

$nama    = $_POST['nama'];
$alamat  = $_POST['alamat'];
$no_telp = $_POST['no_telp'];
$email   = $_POST['email'];

$query = "INSERT INTO mahasiswa (nama, alamat, no_telp, email) 
          VALUES ('$nama', '$alamat', '$no_telp', '$email')";

if (mysqli_query($conn, $query)) {
    echo "<h3>Data Berhasil Tersimpan!</h3>";
} else {
    echo "Error: " . mysqli_error($conn);
}

$ambil = mysqli_query($conn, "SELECT * FROM mahasiswa");

echo "<table border='1' cellpadding='10' cellspacing='0'>
        <tr bgcolor='#eee'>
            <th>No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th>No. Telp</th>
            <th>Email</th>
        </tr>";

$no = 1;
while ($row = mysqli_fetch_array($ambil)) {
    echo "<tr>
            <td>$no</td>
            <td>{$row['nama']}</td>
            <td>{$row['alamat']}</td>
            <td>{$row['no_telp']}</td>
            <td>{$row['email']}</td>
          </tr>";
    $no++;
}
echo "</table>";

// 4. Contoh FOR (Riwayat entri berdasarkan jumlah nomor)
echo "<br>Riwayat entri data: ";
for ($i = 1; $i < $no; $i++) {
    echo "[$i] ";
}

echo "<br><br><a href='form.html'>Tambah Data Lagi</a>";
?>