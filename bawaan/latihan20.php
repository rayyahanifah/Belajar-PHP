<?php

class Siswa {

    public $nama;
    public $kelas;
    public $jurusan;
    public $nilai;

    public function setNama($nama) {
        $this->nama = $nama;
        return $this;
    }

    public function setKelas($kelas) {
        $this->kelas = $kelas;
        return $this; 
    }

    public function setJurusan($jurusan) {
        $this->jurusan = $jurusan;
        return $this;
    }

    public function setNilai($nilai) {
        $this->nilai = $nilai;
        return $this;
    }

    public function tampilkan() {
        echo "Nama    : " . $this->nama . "<br>";
        echo "Kelas   : " . $this->kelas . "<br>";
        echo "Jurusan : " . $this->jurusan . "<br>";
        echo "Nilai   : " . $this->nilai . "<br>";
        return $this;
    }
}


$siswa1 = new Siswa();
$siswa1->setNama("Galen Alvin adam Rezel Negroho")
       ->setKelas("XI RPL")
       ->setJurusan("Rekayasa Perangkat Lunak")
       ->setNilai(95)
       ->tampilkan();

?>
