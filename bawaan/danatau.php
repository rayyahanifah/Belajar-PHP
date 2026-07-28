<?php

// $uangmurid = 5000;
// $memory = 20000;
// $uangguru =30000;
// $totaluang = $uangmurid + $uangguru;

// if ($uangmurid > $memory || $uangguru > $memory) {
//     echo "Murid membeli memori dengan kembalian ".($totaluang - $memory);
// }
// else {
//     echo "Uang kurang" . ($memory - $totaluang) ."untuk membeli memmori";
// }

//nilai diatas 85 dan kehadiran 100
//kalau punya sertif dapet beasiswa
$nilai = 90;
$kehadiran = 100;
$lomba = false;

if ($lomba == true) {
    echo "Selamat, Anda mendapatkan Beasiswa";
}
elseif ($nilai >= 85 && $kehadiran == 100) {
    echo "Selamat, Anda mendapatkan Beasiswa";
}
else {
    echo "Belajar Lagi";
}

?>