<?php

class Buku {
    public $judul;
    public $jumlah;
    public $status;

    public function __construct($judul, $jumlah, $status)
    {
        $this->judul = $judul;
        $this->jumlah = $jumlah;
        $this->status = $status;
    }

    public function __toString()
    {
        return "Judul Buku : ". $this->judul. ", Jumlah Buku : ". $this->jumlah. ", Status Buku : ". $this->status;
    }
}

$perpus = new Buku ("Pemrograman Web", 10, "Tersedia");

echo $perpus;

?>