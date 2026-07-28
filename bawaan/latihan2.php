<?php

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