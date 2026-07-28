<?php
require_once __DIR__ . '/helpers/cookie_helper.php';

$pref = get_user_preferences();
$recent_products = get_recent_products();

$translations = [
    'id' => [
        'catalog_title' => 'Katalog Produk',
        'catalog_sub' => 'Klik salah satu produk untuk mensimulasikan pencatatan cookie riwayat.',
        'history_title' => 'Terakhir Dilihat',
        'history_sub' => 'Maksimal 5 item (Cookie 7 Hari)',
        'empty_history' => 'Belum ada riwayat produk yang kamu lihat.',
        'btn_reset' => 'Reset Activity (Hapus Cookie)',
        'settings' => 'Pengaturan',
        'clear_alert' => 'Semua cookie preferensi dan riwayat produk berhasil dibersihkan!'
    ],
    'en' => [
        'catalog_title' => 'Product Catalog',
        'catalog_sub' => 'Click on any product to simulate history cookie tracking.',
        'history_title' => 'Recently Viewed',
        'history_sub' => 'Max 5 items (7 Days Cookie)',
        'empty_history' => 'No recently viewed products yet.',
        'btn_reset' => 'Reset Activity (Clear Cookies)',
        'settings' => 'Settings',
        'clear_alert' => 'All preference and history cookies cleared successfully!'
    ]
];

$txt = $translations[$pref['lang']];

// Daftar nama produk bilingual
$products = [
    101 => ['name' => ['id' => 'Jaket Denim', 'en' => 'Denim Jacket'], 'icon' => 'fa-shirt'],
    102 => ['name' => ['id' => 'Kaos Polos', 'en' => 'Plain T-Shirt'], 'icon' => 'fa-shirt'],
    103 => ['name' => ['id' => 'Sepatu Sneaker', 'en' => 'Sneaker Shoes'], 'icon' => 'fa-shoe-prints'],
    104 => ['name' => ['id' => 'Celana Chino', 'en' => 'Chino Pants'], 'icon' => 'fa-user-nurse'],
    105 => ['name' => ['id' => 'Topi Snapback', 'en' => 'Snapback Cap'], 'icon' => 'fa-hat-cowboy'],
    106 => ['name' => ['id' => 'Kacamata Hitam', 'en' => 'Sunglasses'], 'icon' => 'fa-glasses'],
];
?>
<!DOCTYPE html>
<html lang="<?= $pref['lang'] ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RayyaStore</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="<?= $pref['theme'] === 'dark' ? 'bg-gray-900 text-gray-100' : 'bg-gray-50 text-gray-800' ?> min-h-screen transition-colors duration-200">

    <!-- Header -->
    <header class="<?= $pref['theme'] === 'dark' ? 'bg-gray-800 border-gray-700' : 'bg-white border-gray-200' ?> border-b sticky top-0 z-10 shadow-sm">
        <div class="max-w-5xl mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-xl font-bold flex items-center gap-2">
                <i class="fa-solid fa-bag-shopping text-indigo-500"></i> RayyaStore
            </h1>
            <div class="flex items-center gap-4 text-sm">
                <span class="px-3 py-1 rounded-full text-xs font-semibold <?= $pref['theme'] === 'dark' ? 'bg-gray-700 text-gray-300' : 'bg-gray-100 text-gray-600' ?>">
                    <i class="fa-solid fa-circle-half-stroke mr-1"></i> <?= strtoupper($pref['theme']) ?> | <?= strtoupper($pref['lang']) ?>
                </span>
                <a href="settings.php" class="text-indigo-500 hover:text-indigo-600 font-medium flex items-center gap-1">
                    <i class="fa-solid fa-gear"></i> <?= $txt['settings'] ?>
                </a>
            </div>
        </div>
    </header>

    <main class="max-w-5xl mx-auto px-4 py-8 space-y-8">

        <!-- Notification Banner -->
        <?php if (isset($_GET['status']) && $_GET['status'] === 'cleared'): ?>
            <div class="p-4 rounded-xl bg-red-500/10 border border-red-500/20 text-red-500 flex items-center gap-3">
                <i class="fa-solid fa-circle-check text-lg"></i>
                <span><?= $txt['clear_alert'] ?></span>
            </div>
        <?php endif; ?>

        <!-- Catalog Section -->
        <section class="space-y-4">
            <div>
                <h2 class="text-2xl font-bold"><?= $txt['catalog_title'] ?></h2>
                <p class="<?= $pref['theme'] === 'dark' ? 'text-gray-400' : 'text-gray-500' ?> text-sm"><?= $txt['catalog_sub'] ?></p>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-6 gap-4">
                <?php foreach ($products as $id => $item): ?>
                    <a href="product.php?id=<?= $id ?>" class="group block p-4 rounded-xl <?= $pref['theme'] === 'dark' ? 'bg-gray-800 hover:bg-gray-750 border-gray-700' : 'bg-white hover:bg-gray-50 border-gray-200' ?> border shadow-sm transition hover:-translate-y-1 text-center">
                        <div class="w-12 h-12 mx-auto mb-3 rounded-lg bg-indigo-500/10 text-indigo-500 flex items-center justify-center text-xl group-hover:scale-110 transition-transform">
                            <i class="fa-solid <?= $item['icon'] ?>"></i>
                        </div>
                        <h3 class="font-medium text-sm text-ellipsis overflow-hidden whitespace-nowrap"><?= $item['name'][$pref['lang']] ?></h3>
                        <span class="text-xs text-indigo-500 font-semibold mt-1 block">#<?= $id ?></span>
                    </a>
                <?php endforeach; ?>
            </div>
        </section>

        <!-- History Section -->
        <section class="p-6 rounded-2xl <?= $pref['theme'] === 'dark' ? 'bg-gray-800/50 border-gray-700' : 'bg-white border-gray-200' ?> border shadow-sm space-y-4">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-bold flex items-center gap-2">
                    <i class="fa-solid fa-clock-rotate-left text-indigo-500"></i> <?= $txt['history_title'] ?>
                </h3>
                <span class="text-xs text-gray-400"><?= $txt['history_sub'] ?></span>
            </div>

            <?php if (!empty($recent_products)): ?>
                <div class="flex flex-wrap gap-3">
                    <?php foreach ($recent_products as $item_id): ?>
                        <a href="product.php?id=<?= $item_id ?>" class="px-4 py-2 rounded-lg text-sm font-medium <?= $pref['theme'] === 'dark' ? 'bg-gray-700 hover:bg-gray-600 text-gray-200' : 'bg-gray-100 hover:bg-gray-200 text-gray-700' ?> flex items-center gap-2 transition">
                            <i class="fa-solid fa-eye text-xs text-indigo-400"></i>
                            <span><?= $products[$item_id]['name'][$pref['lang']] ?? 'Product #' . $item_id ?></span>
                        </a>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div class="text-center py-6 border-2 border-dashed rounded-xl <?= $pref['theme'] === 'dark' ? 'border-gray-700 text-gray-500' : 'border-gray-200 text-gray-400' ?>">
                    <i class="fa-solid fa-ghost text-3xl mb-2 block"></i>
                    <p class="text-sm"><?= $txt['empty_history'] ?></p>
                </div>
            <?php endif; ?>
        </section>

        <!-- Reset Button -->
        <div class="pt-4 flex justify-end">
            <a href="clear-cookie.php" onclick="return confirm('<?= $pref['lang'] === 'en' ? 'Are you sure?' : 'Yakin ingin menghapus semua cookie?' ?>');">
                <button type="button" class="px-4 py-2.5 rounded-xl bg-red-500/10 hover:bg-red-500/20 text-red-500 font-medium text-sm flex items-center gap-2 transition">
                    <i class="fa-solid fa-trash-can"></i> <?= $txt['btn_reset'] ?>
                </button>
            </a>
        </div>

    </main>

</body>
</html>