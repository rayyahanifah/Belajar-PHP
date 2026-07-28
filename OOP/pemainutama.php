<?php

require_once 'pemain.php';

$pemain1 = new pemain('yes, saya belajar coding', 20);
$pemain2 = new pemain('no, saya tidak belajar coding', 30);

$pemain1->set_suara('yes, saya belajar coding');
$pemain1->set_berat(20);
echo 'pemain 1 bersuara : ' . $pemain1->get_suara() . '<br>';
echo 'pemain 1 berat : ' . $pemain1->get_berat() . '<br>';

$pemain2->set_suara('no, saya tidak belajar coding');
$pemain2->set_berat(30);
echo 'pemain 2 bersuara : ' . $pemain2->get_suara() . '<br>';
echo 'pemain 2 berat : ' . $pemain2->get_berat() . '<br>';