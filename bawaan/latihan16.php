<?php

class Robot{
    public $suara;
    public $berat;

    public function __construct($suara, $berat) {
        $this->suara = $suara;
        $this->berat = $berat;
    }
}
