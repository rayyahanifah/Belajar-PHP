<?php

// $profilUtama = [
//     'nama'  => 'Rayya',
//     'umur'  => 17,
//     'kerja' => 'Pelajar'
// ];

// $detailTambahan = [
//     "hobi"   => "Membaca",
//     "laptop" => "Victus"
// ];

// $profilLengkap = array_merge($profilUtama, $detailTambahan);

// echo "<pre>";
// print_r($profilLengkap);
// echo "</pre>";

function print_text ($text) {
    $text = 'gedung' . ' ' . $text;    
    echo "======>";
    echo $text;
    echo "======>";
}

function jarak(){
    echo "<br>";
}

print_text('koding');
jarak();
print_text('belajar koding');
jarak();
print_text('di kelas RPL');
jarak();

?>