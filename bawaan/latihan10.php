<?php

$tampilkanPesan = function($nama) {                
    echo "Halo $nama, selamat belajar Anonymous Function di PHP!<br>";
};

$pesanSiswa = $tampilkanPesan;

$pesanSiswa("Budi");

$perkalian = function($angka1, $angka2) {
    return $angka1 * $angka2;
};
echo "Hasil perkalian: " . $perkalian(5, 10);
?>
