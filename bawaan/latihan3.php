<?php
$harga = 10000;
$jumlah = 3;
$total = $harga * $jumlah;

$a = 1;
while ($a <= $jumlah) {
    echo "saya membeli buah ". $a. '<br>';
    $a++;
}

echo "total harganya senilai ". $total;