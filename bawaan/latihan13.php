<?php

class hero{
    public $nama = 'Praroro';
    public $nyawa = 100;
    public $kekuatan = 'MBG';

    public function __construct($nama = 'Praroro', $nyawa = 100, $kekuatan = 'MBG'){
        $this->nama = $nama;
        $this->nyawa = $nyawa;
        $this->kekuatan = $kekuatan;
    }

    public function serangan(){
        echo 'Nama hero: ' . $this->nama . ' dengan kekuatan ' . $this->kekuatan;
    }
    public function cek_status(){
        return 'Status hero: ' . $this->nama . ' dengan nyawa ' . $this->nyawa;
    }
}
$hero1 = new hero;
$hero1->serangan();
echo '<br>';
echo $hero1->cek_status();
