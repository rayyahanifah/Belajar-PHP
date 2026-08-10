<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Akun</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: radial-gradient(circle at top left, rgba(99, 102, 241, 0.3), transparent 35%);
            min-height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            color: #0f172a;
        }

        .form-container {
            width: 100%;
            max-width: 440px;
            background: #ffffff;
            padding: 32px 30px;
            border-radius: 24px;
            box-shadow: 0 24px 60px rgba(15, 23, 42, 0.14);
            border: 1px solid rgba(148, 163, 184, 0.18);
        }

        .form-container h2 {
            margin: 0 0 8px;
            font-size: 1.9rem;
            color: #111827;
        }

        .form-container .subtitle {
            margin: 0 0 24px;
            color: #475569;
            line-height: 1.6;
        }

        .input-group {
            margin-bottom: 18px;
        }

        .input-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #334155;
        }

        .input-group input {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #cbd5e1;
            border-radius: 14px;
            background: #f8fafc;
            transition: border-color 0.2s ease, box-shadow 0.2s ease, background 0.2s ease;
            box-sizing: border-box;
        }

        .input-group input:focus {
            outline: none;
            border-color: #6366f1;
            background: #ffffff;
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.12);
        }

        button {
            width: 100%;
            padding: 14px 16px;
            font-size: 1rem;
            font-weight: 700;
            color: #ffffff;
            background: #4f46e5;
            border: none;
            border-radius: 14px;
            cursor: pointer;
            transition: transform 0.15s ease, background 0.15s ease;
        }

        button:hover {
            background: #4338ca;
            transform: translateY(-1px);
        }

        .alert {
            padding: 14px 16px;
            margin-bottom: 18px;
            border-radius: 14px;
            font-size: 0.95rem;
            line-height: 1.5;
        }

        .alert-error {
            background-color: #fee2e2;
            color: #b91c1c;
            border: 1px solid #fecaca;
        }

        .alert-success {
            background-color: #dcfce7;
            color: #166534;
            border: 1px solid #bbf7d0;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Form Pendaftaran</h2>

    <?php
    if (isset($_SESSION['pesan_error'])) {
        echo '<div class="alert alert-error">' . htmlspecialchars($_SESSION['pesan_error']) . '</div>';
        unset($_SESSION['pesan_error']);
    }

    if (isset($_SESSION['pesan_sukses'])) {
        echo '<div class="alert alert-success">' . htmlspecialchars($_SESSION['pesan_sukses']) . '</div>';
        unset($_SESSION['pesan_sukses']);
    }
    ?>

    <form action="proses_daftar.php" method="POST">
        <div class="input-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>

        <div class="input-group">
            <label for="nama_lengkap">Nama Lengkap:</label>
            <input type="text" id="nama_lengkap" name="nama_lengkap" required>
        </div>

        <div class="input-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>

        <button type="submit">Daftar</button>
    </form>
</div>

</body>
</html>