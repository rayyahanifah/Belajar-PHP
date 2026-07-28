<?php
require_once __DIR__ . '/helpers/cookie_helper.php';

$product_id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

if ($product_id && $product_id > 0) {
    add_recent_product($product_id);
}

$pref = get_user_preferences();

// Data Dummy Produk lengkap dengan Terjemahan
$products_database = [
    101 => ['name' => ['id' => 'Jaket Denim', 'en' => 'Denim Jacket'], 'price' => 'Rp 350.000', 'icon' => 'fa-shirt', 'desc' => ['id' => 'Jaket denim berkualitas tinggi dengan bahan katun premium yang nyaman dipakai seharian.', 'en' => 'High-quality denim jacket made with premium cotton for all-day comfort.']],
    102 => ['name' => ['id' => 'Kaos Polos', 'en' => 'Plain T-Shirt'], 'price' => 'Rp 85.000', 'icon' => 'fa-shirt', 'desc' => ['id' => 'Kaos polos berbahan Combed 30s yang adem dan menyerap keringat.', 'en' => 'Breathable 30s Combed cotton plain t-shirt with great sweat absorption.']],
    103 => ['name' => ['id' => 'Sepatu Sneaker', 'en' => 'Sneaker Shoes'], 'price' => 'Rp 450.000', 'icon' => 'fa-shoe-prints', 'desc' => ['id' => 'Sneaker casual modern cocok untuk dipakai nongkrong maupun aktivitas harian.', 'en' => 'Modern casual sneakers perfect for hanging out or daily activities.']],
    104 => ['name' => ['id' => 'Celana Chino', 'en' => 'Chino Pants'], 'price' => 'Rp 210.000', 'icon' => 'fa-user-nurse', 'desc' => ['id' => 'Celana chino slim-fit fleksibel untuk acara formal maupun santai.', 'en' => 'Flexible slim-fit chino pants suitable for formal or casual occasions.']],
    105 => ['name' => ['id' => 'Topi Snapback', 'en' => 'Snapback Cap'], 'price' => 'Rp 75.000', 'icon' => 'fa-hat-cowboy', 'desc' => ['id' => 'Topi snapback gaya streetwear dengan bahan kanvas tebal.', 'en' => 'Streetwear style snapback cap made from durable canvas material.']],
    106 => ['name' => ['id' => 'Kacamata Hitam', 'en' => 'Sunglasses'], 'price' => 'Rp 120.000', 'icon' => 'fa-glasses', 'desc' => ['id' => 'Kacamata hitam dengan lensa UV400 pelindung dari sinar matahari.', 'en' => 'Sunglasses with UV400 lenses to protect your eyes from sunlight.']],
];

$product = $products_database[$product_id] ?? null;

// Kamus Teks
$translations = [
    'id' => [
        'not_found' => 'Produk Tidak Ditemukan',
        'not_found_sub' => 'ID produk tidak valid atau produk sudah tidak tersedia.',
        'added_history' => 'Produk ini telah ditambahkan ke riwayat cookie!',
        'back' => 'Kembali ke Beranda',
        'buy_now' => 'Beli Sekarang'
    ],
    'en' => [
        'not_found' => 'Product Not Found',
        'not_found_sub' => 'Invalid product ID or product is no longer available.',
        'added_history' => 'This product has been added to your cookie history!',
        'back' => 'Back to Home',
        'buy_now' => 'Buy Now'
    ]
];

$txt = $translations[$pref['lang']];
?>
<!DOCTYPE html>
<html lang="<?= $pref['lang'] ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $product ? $product['name'][$pref['lang']] : $txt['not_found'] ?> - FashionStore</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="<?= $pref['theme'] === 'dark' ? 'bg-gray-900 text-gray-100' : 'bg-gray-50 text-gray-800' ?> min-h-screen flex items-center justify-center p-4 transition-colors duration-200">

    <div class="max-w-xl w-full rounded-2xl p-6 sm:p-8 shadow-xl border <?= $pref['theme'] === 'dark' ? 'bg-gray-800 border-gray-700' : 'bg-white border-gray-100' ?>">
        
        <?php if ($product): ?>
            <!-- Tag Cookie Info -->
            <div class="mb-4 inline-flex items-center gap-2 px-3 py-1 rounded-full text-xs font-semibold bg-indigo-500/10 text-indigo-500">
                <i class="fa-solid fa-cookie-bite"></i>
                <span><?= $txt['added_history'] ?></span>
            </div>

            <div class="flex flex-col sm:flex-row gap-6 items-center sm:items-start my-4">
                <div class="w-28 h-28 shrink-0 rounded-2xl bg-indigo-500/10 text-indigo-500 flex items-center justify-center text-4xl shadow-inner">
                    <i class="fa-solid <?= $product['icon'] ?>"></i>
                </div>

                <div class="space-y-2 text-center sm:text-left flex-1">
                    <span class="text-xs text-indigo-400 font-bold tracking-wider">PRODUCT #<?= $product_id ?></span>
                    <h1 class="text-2xl font-bold"><?= $product['name'][$pref['lang']] ?></h1>
                    <p class="text-xl font-bold text-emerald-500"><?= $product['price'] ?></p>
                    <p class="text-sm <?= $pref['theme'] === 'dark' ? 'text-gray-400' : 'text-gray-500' ?>">
                        <?= $product['desc'][$pref['lang']] ?>
                    </p>
                </div>
            </div>

            <!-- Tombol Aksi -->
            <div class="mt-8 flex flex-col sm:flex-row gap-3">
                <button type="button" class="flex-1 py-3 px-4 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl font-semibold text-sm shadow-lg shadow-indigo-500/25 transition flex items-center justify-center gap-2">
                    <i class="fa-solid fa-cart-shopping"></i> <?= $txt['buy_now'] ?>
                </button>
                <a href="index.php" class="py-3 px-4 rounded-xl border border-gray-300 dark:border-gray-600 hover:bg-gray-500/10 text-sm font-semibold text-center transition">
                    <?= $txt['back'] ?>
                </a>
            </div>

        <?php else: ?>
            <div class="text-center py-8 space-y-4">
                <div class="w-16 h-16 mx-auto rounded-full bg-red-500/10 text-red-500 flex items-center justify-center text-2xl">
                    <i class="fa-solid fa-triangle-exclamation"></i>
                </div>
                <h1 class="text-2xl font-bold"><?= $txt['not_found'] ?></h1>
                <p class="text-sm text-gray-400"><?= $txt['not_found_sub'] ?></p>
                <a href="index.php" class="inline-block mt-4 py-2.5 px-6 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl font-semibold text-sm transition">
                    <?= $txt['back'] ?>
                </a>
            </div>
        <?php endif; ?>

    </div>

</body>
</html>