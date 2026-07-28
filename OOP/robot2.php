<?php

require_once 'robot.php';

$robot1 = new robotHewan();
$robot2 = new robotHewan();

$robot1->set_suara('hiiiaaaa');
$robot2->set_suara('yuhuuuu');
$robot1->set_kekuatan(" Lari");
$robot2->set_kekuatan(" Terbang");

echo 'robot 1 bunyinya : ' . $robot1->get_suara() . '<br>'; 
echo 'robot 2 bunyinya : ' . $robot2->get_suara() . '<br>';

echo 'robot 2 kekuatan :' . $robot2->get_kekuatan() . '<br>';
echo 'robot 1 kekuatan :' . $robot1->get_kekuatan() . '<br>';
