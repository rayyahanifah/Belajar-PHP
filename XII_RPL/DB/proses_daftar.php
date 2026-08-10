<?php
session_start();
require_once __DIR__ . '/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username     = strtolower(trim($_POST['username']));
    $nama_lengkap = trim($_POST['nama_lengkap']);
    $password_raw = trim($_POST['password']);

    if (empty($username) || empty($nama_lengkap) || empty($password_raw)) {
        $_SESSION['pesan_error'] = "Semua kolom input wajib diisi!";
        header("Location: register.php");
        exit();
    }

    $query_cek = "SELECT id FROM users WHERE username = ?";
    $stmt_cek  = mysqli_prepare($koneksi, $query_cek);

    mysqli_stmt_bind_param($stmt_cek, "s", $username);
    mysqli_stmt_execute($stmt_cek);
    mysqli_stmt_store_result($stmt_cek);

    if (mysqli_stmt_num_rows($stmt_cek) > 0) {
        $_SESSION['pesan_error'] = "Username '$username' sudah terdaftar! Gunakan username lain.";
        mysqli_stmt_close($stmt_cek);
        header("Location: register.php");
        exit();
    }
    mysqli_stmt_close($stmt_cek);

    $password_hashed = password_hash($password_raw, PASSWORD_DEFAULT);

    $query_insert = "INSERT INTO users (username, nama_lengkap, password) VALUES (?, ?, ?)";
    $stmt_insert  = mysqli_prepare($koneksi, $query_insert);

    mysqli_stmt_bind_param($stmt_insert, "sss", $username, $nama_lengkap, $password_hashed);

    if (mysqli_stmt_execute($stmt_insert)) {
        $_SESSION['pesan_sukses'] = "Pendaftaran berhasil! Silakan login.";
    } else {
        $_SESSION['pesan_error'] = "Terjadi kesalahan sistem saat mendaftar.";
    }

    mysqli_stmt_close($stmt_insert);
    mysqli_close($koneksi);

    header("Location: register.php");
    exit();
} else {
    header("Location: register.php");
    exit();
}
?>