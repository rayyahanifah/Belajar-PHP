<?php

$hargaProduk = 50000;
$biayaKirim = 10000;
$pajak = 2000;

echo "<h3>Hasil Perhitungan Total Belanja</h3>";
echo "Harga Produk: Rp " . number_format($hargaProduk) . "<br>";
echo "Biaya Kirim: Rp " . number_format($biayaKirim) . "<br>";
echo "Pajak: Rp " . number_format($pajak) . "<br><hr>";

function hitungTotal_MetodeA() {
    global $hargaProduk, $biayaKirim, $pajak;

    $total = $hargaProduk + $biayaKirim + $pajak;
    return $total;
}

function hitungTotal_MetodeB() {
    $total = $GLOBALS['hargaProduk'] + $GLOBALS['biayaKirim'] + $GLOBALS['pajak'];
    return $total;
}

$hasilA = hitungTotal_MetodeA();
echo "<strong>Output Metode A (Keyword global):</strong><br>";
echo "Total yang harus dibayar: Rp " . number_format($hasilA) . "<br><br>";

$hasilB = hitungTotal_MetodeB();
echo "<strong>Output Metode B (Array \$GLOBALS):</strong><br>";
echo "Total yang harus dibayar: Rp " . number_format($hasilB);

?>
