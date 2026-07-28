<?php

class robot {
    public $suara;
    public $berat;

    public function __construct()
    {
        echo 'halo robot... <br>';
    }

    public function set_suara($suara){
        $this->suara = $suara;
    }

    public function get_suara(){
        return $this->suara;
    }
}

class robotHewan extends robot {
    public $kekuatan;

    public function set_kekuatan($kekuatan){
        $this->kekuatan = $kekuatan;
    }

    public function get_kekuatan(){
        return $this->kekuatan;
    }
}