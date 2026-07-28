<?php

class Mahasiswa
{
    public function isiNama($nama)
    {
        echo "Nama: $nama <br>";
        return $this;
    }

    public function isiKelas($kelas)
    {
        echo "Kelas: $kelas <br>";
        return $this;
    }

    public function isiJurusan($jurusan)
    {
        echo "Jurusan: $jurusan <br>";
        return $this;
    }
}
$mhs = new Mahasiswa();
$mhs->isiNama("Galen Alvin adam Rezel Negroho Putra 
Adrianno Barus Gibran Abimani Rezqi Maleke Zafir 
Zamzami Wibowo Shafwan Rompis Rais Sabilah Ahmad Ramdan 
Rafif Andhini Shodiq Hanifah Gracia TiNENENdeng Hakim Ivander Ican Muzaking Malik Salahuddin Qutbi Azmir ")
->isiKelas("XI RPL")
->isiJurusan("Rekayasa Perangkat Lunak");
