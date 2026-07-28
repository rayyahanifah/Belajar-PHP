<?php
$nilaiRataRata = 80;
$kehadiran = 100;
$punyaSertifikat = true;

if (($nilaiRataRata > 85 && $kehadiran == 100) || $punyaSertifikat) {
    echo "Selamat, Anda mendapatkan Beasiswa!";
} else {
    echo "Maaf, Anda tidak lolos.";
}

