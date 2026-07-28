<?php

//TUGAS 1
echo '<hr>';
echo '<b>1. Pengkondisian Nilai</b>' . '<br>';
$nilai = 80;
if ($nilai > 80){
    echo 'Selamat anda mendapatkan niai terbaik';
} elseif ($nilai == 80){
    echo 'Selamat anda lulus';
} else {
    echo 'Semangat belajar';
};

//TUGAS 2
echo '<hr>';
echo '<b>2. Switch Case Harga Buah</b>' . '<br>';
$namabuah = 'jeruk';
$jumlahbeli = 3;
$total = 0;

switch ($namabuah) {
    case "apel";
        $harga = 2000;
        break;
    case "jeruk";
        $harga = 1500;
        break;
    case "mangga";
        $harga = 2500;
        break;
    default:
        echo "buah sedang kosong";
        break;
}

$totalharga = $jumlahbeli * $harga;
echo "Buah yang dibeli : $namabuah <br>";
echo "Jumlah buah yang dibeli : $jumlahbeli <br>";
echo "Total harga : $totalharga";

//TUGAS 3
echo '<hr>';
echo '<b>3. Perulangan While Membeli Buah</b>' . '<br>';
$harga = 10000;
$jumlah = 3;
$total = $harga * $jumlah;

$a = 1;
while ($a <= $jumlah) {
    echo "saya membeli buah ". $a. '<br>';
    $a++;
}

echo "total harganya senilai ". $total;

//TUGAS 4
echo '<hr>';
echo '<b>4. Daftar Stok Buah</b>' . '<br>';
$buah = ['apel', 'jeruk', 'mangga', 'semangka', 'anggur'];

echo '<strong>A (for):</strong>' . '<br>';
for ($i=0; $i < count($buah); $i++) {
    echo 'Buah ke-'. ($i) . ' : ' . $buah[$i] . '<br>';
}
echo '<br>';
echo '<strong>B (foreach):</strong>' . '<br>';
foreach ($buah as $item) {
    echo 'Buah : '. $item . '<br>';
}

//TUGAS 5
echo '<hr>';
echo '<b>5. Array Data Mahasiswa</b>' . '<br>';
$kkm = 80;

$data_mahasiswa = [
    "nama" => "Andi Saputra",
    "nilai" => "80",
    "kkm" => $kkm
];

$data_mahasiswa2 = [
    "nama" => "Budi Santoso",
    "nilai" => "93",
    "kkm" => $kkm
];

$data_mahasiswa3 = [
    "nama" => "Sarah Wijayanto",
    "nilai" => "75",
    "kkm" => $kkm
];

$database_mahasiswa = [
    $data_mahasiswa,
    $data_mahasiswa2,
    $data_mahasiswa3
];

echo "<pre>";
print_r($database_mahasiswa);
echo "</pre>";

//TUGAS 6
echo '<hr>';
echo '<b>6. Menghitung Luas, Menentukan Lulus, dan Perulangan</b>' . '<br>';
$panjang = 10;
$lebar = 5;
$luas = $panjang * $lebar;

echo "Menghitung Luas Persegi Panjang <br>";
echo "Panjang : " . $panjang . "<br>";
echo "Lebar : " . $lebar . "<br>";
echo "Luas Persegi Panjang : " . $luas;
echo "<hr>";
echo "Menentukan Nilai Lulus atau Tidak <br>";
$nilai = 90;
$kkm = 80;
if ($nilai >= $kkm) {
    echo "Nilai Anda : " . $nilai . "<br>";
    echo "Keterangan : Lulus";
} else {
    echo "Nilai Anda : " . $nilai . "<br>";
    echo "Keterangan : Tidak Lulus";
}
echo "<hr>";
echo "Program Perulangan Angka 1-10 <br>";
$a = 1;
while ($a <= 10) {
    echo $a. '<br>';
    $a++;
}

//TUGAS 7
echo '<hr>';
echo '<b>7. Array Jenis Hewan dan Perulangan</b>' . '<br>';
$jenishewan = ['miaw', 'guguk', 'rabbrab', 'wekwek', 'sstt','dinosor'];
for ($i=0; $i < count($jenishewan); $i++) { 
    echo "=======> ";
    echo "Saya punya hewan peliharaan jenis " . $jenishewan[$i] . "<br>";
}

//TUGAS 8
$hargaBarang = 5000;
$jumlahBarang = 3;

function hitungHarga($hargaBarang, $jumlahBarang) {
    $total = $hargaBarang * $jumlahBarang * 0.9;
    return $total;
};

echo '<hr>';
echo '<b>8. Function Hitung Harga</b>' . '<br>';
echo 'Harga Barang' . ' : ' . $hargaBarang . '<br>';
echo 'Jumlah Barang' . ' : ' . $jumlahBarang . '<br>';
echo 'Harga sebelum diskon' . ' : ' . $hargaBarang * $jumlahBarang . '<br>';
echo 'Total Harga setelah diskon 10%' . ' : ' . hitungHarga($hargaBarang, $jumlahBarang) . '<br>';
echo '<hr>';

//TUGAS 9
$nilai = 90;
$hadir = 90;
$sertif = true;

echo '<b>9. And dan Or</b>' . '<br>';
if ($sertif = true){
    echo 'Selamat, Anda mendapatkan Beasiswa';
}
elseif ($nilai >= 85 && $hadir == 100) {
    echo 'Selamat, Anda mendapatkan Beasiswa';
}
else {
    echo 'Belajar Lagi';
}

//TUGAS 10
echo '<hr>';
$hargaProduk = 50000;
$biayaKirim = 10000;
$pajak = 2000;

function totalHarga() {
    global $hargaProduk, $biayaKirim, $pajak;
    $total = $hargaProduk + $biayaKirim + $pajak;
    return $total;
}

echo '<b>10. Function Total Harga</b>' . '<br>';
echo 'Harga Produk : ' . $hargaProduk . '<br>';
echo 'Biaya Kirim : ' . $biayaKirim . '<br>';
echo 'Pajak : ' . $pajak . '<br>';
echo 'Total : ' . totalHarga() . '<br>';

//TUGAS 11
echo '<hr>';
