<?php

class robot {
    public $suara = 'halo';
    public $berat = 20;
}

$robot1 = new robot();
echo 'suara robot 1 : ' . $robot1->suara . '<br>';
echo 'berat robot 1 : ' . $robot1->berat . ' kg' . '<br>';