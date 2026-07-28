<?php

session_start();

$_SESSION['user_id'] = 101;
$_SESSION['username'] = 'Rayya';
$_SESSION['role'] = 'admin';

echo "Data session berhasil disimpan";