<?php
$user = 'rara';
$password = '123';
$error = '';

if (isset($_POST['submit'])) {
    if ($_POST['nama'] == $user && $_POST['password'] == $password) {
        $cookiePath = '/Belajar_PHP/XII_RPL/cookie/';
        setcookie('nama_user', $_POST['nama'], time() + 3600, $cookiePath);
        header('Location: profile.php?nama=' . urlencode($_POST['nama']));
        exit();
    } else {
        $error = "Nama atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login System</title>
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

        .login-card {
            background: #ffffff;
            padding: 2.5rem;
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            width: 100%;
            max-width: 380px;
        }

        .login-card h2 {
            margin-bottom: 0.5rem;
            color: #333333;
            text-align: center;
        }

        .login-card p.subtitle {
            color: #666666;
            font-size: 0.9rem;
            text-align: center;
            margin-bottom: 1.5rem;
        }

        .alert-error {
            background-color: #fee2e2;
            color: #dc2626;
            padding: 0.75rem;
            border-radius: 6px;
            font-size: 0.875rem;
            margin-bottom: 1rem;
            text-align: center;
            border: 1px solid #fca5a5;
        }

        .form-group {
            margin-bottom: 1.2rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.4rem;
            color: #4b5563;
            font-size: 0.9rem;
            font-weight: 600;
        }

        .form-group input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            font-size: 0.95rem;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        .form-group input:focus {
            outline: none;
            border-color: #4f46e5;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.15);
        }

        .btn-submit {
            width: 100%;
            padding: 0.75rem;
            background-color: #4f46e5;
            color: #ffffff;
            border: none;
            border-radius: 6px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s ease;
            margin-top: 0.5rem;
        }

        .btn-submit:hover {
            background-color: #4338ca;
        }
    </style>
</head>
<body>

<div class="login-card">
    <h2>Selamat Datang</h2>
    <p class="subtitle">Silakan masuk ke akun Anda</p>

    <?php if ($error): ?>
        <div class="alert-error"><?= $error ?></div>
    <?php endif; ?>

    <form action="index.php" method="POST">
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama" placeholder="Masukkan nama" required autocomplete="off">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Masukkan password" required>
        </div>

        <button type="submit" name="submit" class="btn-submit">Login</button>
    </form>
</div>

</body>
</html>