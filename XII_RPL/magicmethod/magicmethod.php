<?php

class Produk {
    public $nama;
    public $harga;

    public function __construct($nama, $harga)
    {
        $this->nama = $nama;
        $this->harga = $harga;
    }

    public function __toString()
    {
        return "Informasi Produk - Nama: ". $this->nama ." Harga: Rp ". $this->harga;
    }
}

$gadget = new Produk("Handphone Iphone", 10000);

echo $gadget;

?>