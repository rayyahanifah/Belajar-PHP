<?php

session_start();

//111111
// $_SESSION['user_id'] = 101;
// $_SESSION['username'] = 'Rayya';
// $_SESSION['role'] = 'admin';

// echo "Data session berhasil disimpan";

//2222222
// if(isset($_SESSION['username'])) {
//     echo "Selamat Datang Kembali, " . $_SESSION['username'] . "!<br>";
// } else {
//     echo "Anda belum login. Silakan login terlebih dahulu.";
// }

//3333333
unset($_SESSION['role']);
$_SESSION = array(); // Menghapus semua data session
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
session_destroy();