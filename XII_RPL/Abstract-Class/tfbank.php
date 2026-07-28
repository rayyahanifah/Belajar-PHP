<?php

class TransferBank extends pembayaran {
    private $nomorRekening;

    public function __construct($totalBayar, $nomorRekening) {
        parent::__construct($totalBayar);
        $this->nomorRekening = $nomorRekening;
    }

    public function prosesTransaksi() {
        echo "Mengirimkan instruksi transfer ke nomor rekening :  " . $this->nomorRekening . "<br>";
        echo "Transfer sebesar Rp " . number_format($this->totalBayar, 0, ',', '.') . " berhasil dilakukan.<br>";
    }
}
