<?php

class robot{
    public $suara;
    public $berat;

    public function set_suara($suara){
        $this->suara = $suara;
    }

    public function get_suara(){
        return $this->suara;
    }
}

$robot = new robot;
$robot->set_suara('hiiiaaaa');
echo 'bunyinya.. ' . $robot->get_suara() . '<br>';