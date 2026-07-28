<?php

$data_mahasiswa = [
    "nama" => "Andi Wijaya",
    "nim" => "123456789",
    "jurusan" => "Teknik Informatika",
    "umur" => 21,
    "alamat" => "Jl. Merdeka No. 10, Jakarta"
];

$data_mahasiswa2 = [
    "nama" => "Siti Aminah",
    "nim" => "987654321",
    "jurusan" => "Sistem Informasi",
    "umur" => 22,
    "alamat" => "Jl. Sudirman No. 20, Bandung"
];

$data_mahasiswa3 = [
    "nama" => "Budi Santoso",
    "nim" => "192837465",
    "jurusan" => "Teknik Komputer",
    "umur" => 20,
    "alamat" => "Jl. Thamrin No. 30, Surabaya"
];

$database_mahasiswa = [
    $data_mahasiswa,
    $data_mahasiswa2,
    $data_mahasiswa3
];

echo "<pre>";
print_r($database_mahasiswa);
echo "</pre>";