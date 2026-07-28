<?php

class produk {
    public $nama;
    public $harga;

    public function set_nama($nama){
        $this->nama = $nama;
    }

    public function get_nama(){
        return $this->nama;
    }

    public function set_harga($harga){
        $this->harga = $harga;
    }

    public function get_harga(){
        return $this->harga;
    }
}

$objek1 = new produk;
$objek2 = new produk;

$objek1->set_nama("Laptop");
$objek1->get_harga(1000000);

$objek1->set_nama("Mouse");
$objek2->get_harga(50000);

echo 'Nama produk 1: ' . $objek1->nama . '<br>';
echo 'Harga produk 1: ' . $objek1->harga . '<br>';
echo 'Nama produk 2: ' . $objek2->nama . '<br>';
echo 'Harga produk 2: ' . $objek2->harga . '<br>';