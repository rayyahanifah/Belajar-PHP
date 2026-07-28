<?php

$kkm = 80;

$data_mahasiswa = [
    "nama" => "Andi Saputra",
    "nilai" => "80",
    "kkm" => $kkm
];

$data_mahasiswa2 = [
    "nama" => "Budi Santoso",
    "nilai" => "93",
    "kkm" => $kkm
];

$data_mahasiswa3 = [
    "nama" => "Sarah Wijayanto",
    "nilai" => "75",
    "kkm" => $kkm
];

$database_mahasiswa = [
    $data_mahasiswa,
    $data_mahasiswa2,
    $data_mahasiswa3
];

echo "<pre>";
print_r($database_mahasiswa);
echo "</pre>";