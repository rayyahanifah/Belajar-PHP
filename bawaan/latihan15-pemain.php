<?php

class Pemain {
    public $suara;
    public $berat;

    public function __construct($suara, $berat) {
        $this->suara = $suara;
        $this->berat = $berat;
    }

    public function set_berat($berat_baru) {
        $this->berat = $berat_baru;
    }
}

class PemainGoni extends Pemain {
    public $kekuatan;

    function set_kekuatan($kekuatan_baru) {
        $this->kekuatan = $kekuatan_baru;
    }

    function get_kekuatan() {
        return $this->kekuatan;
    }
}
