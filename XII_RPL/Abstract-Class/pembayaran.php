<?php

abstract class pembayaran {
    protected $totalBayar;

    public function __construct($totalBayar) {
        $this->totalBayar = $totalBayar;
    }

    public function tampilkanNota() {
        echo "Total Bayar: Rp " .   number_format($this->totalBayar, 0, ',', '.') . "<br>";   
    }

    abstract public function prosesTransaksi();
}

?>
