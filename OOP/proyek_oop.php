<?php

class laptop {
    public $merk = ['Victus', 'Asus', 'Lenovo'];
    public $harga = ['10000', '15000', '20000'];
}

$laptop_saya = new laptop();
echo 'Nama Barang : ' . $laptop_saya->merk[0] . ', Harga : ' . $laptop_saya->harga[0] . '<br>';
echo 'Nama Barang : ' . $laptop_saya->merk[1] . ', Harga : ' . $laptop_saya->harga[1] . '<br>';
echo 'Nama Barang : ' . $laptop_saya->merk[2] . ', Harga : ' . $laptop_saya->harga[2] . '<br>';