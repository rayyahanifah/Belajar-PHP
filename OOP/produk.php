<?php

class Produk {
    public static $total_item = 100;

    public static function tampilkanHeader() {
        echo "Selamat Datang di Toko Kelontong XI RPL\n";
        echo "<br><br>";
    }

    public static function cekStok() {
        return self::$total_item;
    }
}


Produk::tampilkanHeader();

echo "Sisa stok saat ini adalah: " . Produk::cekStok() . " item.\n";

?>