<?php

$hargaBarang = 150000; 
$persenPajak = 0.1;    

function hitungTotalBelanja() {
    global $hargaBarang;
    
    $pajak = $hargaBarang * $GLOBALS['persenPajak']; 
    
    $total = $hargaBarang + $pajak;
    return $total;
}

echo "Total belanja yang harus dibayar: Rp " . hitungTotalBelanja(); 
?>
