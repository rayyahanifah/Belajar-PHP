<?php

class pemain {
    public $suara;
    public $berat;

    // public function __construct()
    // {
    //     echo 'halo pemain... <br>';
    // }

    public function set_suara($suara){
        $this->suara = $suara;
    }

    public function get_suara(){
        return $this->suara;
    }

    public function set_berat($berat_baru){
        $this->berat = $berat_baru;
    }

    public function get_berat(){
        return $this->berat;
    }
}