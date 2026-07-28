<?php
echo "<hr>";
$panjang = 10;
$lebar = 5;
$luas = $panjang * $lebar;

echo "Menghitung Luas Persegi Panjang <br>";
echo "Panjang : " . $panjang . "<br>";
echo "Lebar : " . $lebar . "<br>";
echo "Luas Persegi Panjang : " . $luas;
echo "<hr>";

echo "<br>";
echo "<br>";

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

echo "<br>";
echo "<br>";

echo "<hr>";
echo "Program Perulangan Angka 1-10 <br>";
$a = 1;
while ($a <= 10) {
    echo $a. '<br>';
    $a++;
}
echo "<hr>";