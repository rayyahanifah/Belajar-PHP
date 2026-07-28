<?php

//class produk {

//    public $nama;
//    public $harga;

//    public function set_nama($nama){
//        $this->nama = $nama;
//    }

//    public function get_harga(){
//        return $this->harga;
//    }
//}

//$laptop = new produk;
//$laptop->set_nama("Laptop");
//$laptop->harga = 15000000; 

//$mouse = new produk;
//$mouse->set_nama("Mouse");
//$mouse->harga = 150000; 

//echo "Produk: " . $laptop->nama . "<br>";
//echo "Harga: Rp" . $laptop->get_harga() . "<br><br>";

//echo "Produk: " . $mouse->nama . "<br>";
//echo "Harga: Rp" . $mouse->get_harga();

class produk{
    public $nama;
    public $harga;

    public function setNama($nama){
        $this->nama = $nama;
    }

    public function getNama(){
        return $this->nama;
    }

    public function setHarga($harga){
        $this->harga = $harga;
    }

    public function getHarga(){
        return $this->harga;
    }
}

$produk1 = new produk;
$produk1->setNama("Laptop");
$produk1->setHarga(15000000);

$produk2 = new produk;
$produk2->setNama("Mouse");
$produk2->setHarga(150000);

echo "produk 1: " . $produk1->getNama() . " dengan harga "  . $produk1->getHarga() . "<br>";
echo "produk 2: " . $produk2->getNama() . " dengan harga "  . $produk2->getHarga() . "<br>";
