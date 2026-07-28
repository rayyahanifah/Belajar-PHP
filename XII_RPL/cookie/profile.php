<?php
// Ambil nama dari cookie jika ada, jika tidak dari parameter URL
$nama = isset($_COOKIE['nama_user'])
    ? htmlspecialchars($_COOKIE['nama_user'], ENT_QUOTES, 'UTF-8')
    : (isset($_GET['nama']) ? htmlspecialchars($_GET['nama'], ENT_QUOTES, 'UTF-8') : 'Tamu');
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Saya</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f4f6f9;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .profile-card {
            background: #ffffff;
            padding: 2.5rem;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .avatar {
            width: 80px;
            height: 80px;
            background-color: #4f46e5;
            color: #ffffff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            font-weight: bold;
            margin: 0 auto 1.5rem auto;
            text-transform: uppercase;
        }

        .profile-card h1 {
            font-size: 1.5rem;
            color: #1f2937;
            margin-bottom: 0.5rem;
        }

        .profile-card p {
            color: #6b7280;
            font-size: 0.95rem;
            margin-bottom: 2rem;
        }

        .user-name {
            color: #4f46e5;
            text-transform: capitalize;
        }

        .btn-logout {
            display: inline-block;
            width: 100%;
            padding: 0.75rem;
            background-color: #ef4444;
            color: #ffffff;
            text-decoration: none;
            border-radius: 6px;
            font-size: 0.95rem;
            font-weight: 600;
            transition: background-color 0.2s ease;
        }

        .btn-logout:hover {
            background-color: #dc2626;
        }
    </style>
</head>
<body>

<div class="profile-card">
    <!-- Mengambil huruf pertama dari nama untuk Avatar -->
    <div class="avatar">
        <?= strtoupper(substr($nama, 0, 1)) ?>
    </div>

    <h1>Selamat Datang!</h1>
    <p>Ini adalah halaman profil untuk <strong class="user-name"><?= $nama ?></strong>.</p>

    <a href="index.php" class="btn-logout">Logout / Kembali</a>
</div>

</body>
</html>