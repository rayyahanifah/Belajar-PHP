<?php

class Ewallet extends pembayaran {
    private $nomorHp;

    public function __construct($totalBayar, $nomorHp) {
        parent::__construct($totalBayar);
        $this->nomorHp = $nomorHp;
    }

    public function prosesTransaksi() {
        echo "Mengirimkan instruksi pembayaran ke nomor e-wallet :  " . $this->nomorHp   . "<br>";
        echo "Saldo dipotong sebesar Rp " . number_format($this->totalBayar, 0, ',', '.') . " berhasil dilakukan.<br>";
    }
}

?>