<?php

class Handphone {
    public $merk = "Samsung Galaxy";
    public $warna = "Hitam";
    public $storage = "128GB";
    public $ram = "8GB";
}

$handphoneBaru = new Handphone();

$handphoneLama = new Handphone();
$handphoneLama->merk = "Xiaomi Redmi";


$handphoneLama->warna = "Putih";
$handphoneLama->storage = "64GB";
$handphoneLama->ram = "4GB";

echo "Daftar Inventaris:<br>";
echo "Nama Barang: $handphoneBaru->merk, Warna: $handphoneBaru->warna, Storage: $handphoneBaru->storage, RAM: $handphoneBaru->ram.<br>";
echo "Nama Barang: $handphoneLama->merk, Warna: $handphoneLama->warna, Storage: $handphoneLama->storage, RAM: $handphoneLama->ram.<br>";

echo "<br><strong>Validasi Object:</strong><br>";
echo "<pre>";
var_dump($handphoneBaru);
var_dump($handphoneLama);
echo "</pre>";
