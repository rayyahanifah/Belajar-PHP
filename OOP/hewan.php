<?php

class Hewan {
    public $suara;
    public $berat;

    public function set_suara($suara){
        $this->suara = $suara;
    }

    public function get_suara(){
        return $this->suara;
    }

    public function set_berat($berat){
        $this->berat = $berat;
    }

    public function get_berat(){
        return $this->berat;
    }
}