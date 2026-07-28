<?php

require_once 'latihan15-pemain-03032026.php';

$pemain1 = new Pemain("yes, saya belajar koding", 20);
$pemain2 = new Pemain("titut titut", 15);

echo "Pemain 1 bersuara: " . $pemain1->suara . " dengan berat: " . $pemain1->berat . "<br>";

$pemain1->set_berat(25);
echo "Berat Pemain 1 setelah diubah: " . $pemain1->berat . "<br>";

echo "<br>";

echo "Pemain 2 bersuara: " . $pemain2->suara . " dengan berat: " . $pemain2->berat . "<br>";
$pemain3 = new PemainGoni ("MBG", 30);
$pemain3 -> set_kekuatan("sangat kuat");
echo "Pemain 3 bersuara: " . $pemain3->suara . " dengan berat: " . $pemain3->berat . " dan kekuatan: " . $pemain3->get_kekuatan();
?>
