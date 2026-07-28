<?php

$produk = [
    "Nama" => "Laptop",
    "Merk" => "Victus",
    "Harga" => 1000000000000,
    "Garansi" => 10 . ' Tahun'
];

foreach ($produk as $key => $value) {
    echo $key . " : " . $value . "<br>";
}