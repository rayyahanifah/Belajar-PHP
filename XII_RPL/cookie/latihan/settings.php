<?php
require_once __DIR__ . '/helpers/cookie_helper.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $theme = filter_input(INPUT_POST, 'theme', FILTER_DEFAULT);
    $lang  = filter_input(INPUT_POST, 'lang', FILTER_DEFAULT);

    $valid_theme = in_array($theme, ['light', 'dark'], true) ? $theme : 'light';
    $valid_lang  = in_array($lang, ['id', 'en'], true) ? $lang : 'id';

    $pref_data = [
        'theme' => $valid_theme,
        'lang'  => $valid_lang
    ];

    set_secure_cookie('user_pref', json_encode($pref_data), COOKIE_EXPIRE_PREF);
    
    header('Location: settings.php?status=success');
    exit;
}

if (isset($_GET['status']) && $_GET['status'] === 'success') {
    $message = 'Pengaturan berhasil disimpan!';
}

$pref = get_user_preferences();

// Dictionary Bahasa sederhana
$translations = [
    'id' => [
        'title' => 'Pengaturan Preferensi',
        'subtitle' => 'Atur tampilan dan bahasa aplikasi sesuai keinginanmu.',
        'theme_label' => 'Mode Tampilan',
        'lang_label' => 'Bahasa Aplikasi',
        'btn_save' => 'Simpan Pengaturan',
        'back' => 'Kembali ke Beranda',
        'success_msg' => 'Pengaturan berhasil diperbarui!'
    ],
    'en' => [
        'title' => 'Preference Settings',
        'subtitle' => 'Customize the display mode and application language.',
        'theme_label' => 'Display Mode',
        'lang_label' => 'Application Language',
        'btn_save' => 'Save Preferences',
        'back' => 'Back to Home',
        'success_msg' => 'Preferences successfully updated!'
    ]
];

$txt = $translations[$pref['lang']];
?>
<!DOCTYPE html>
<html lang="<?= $pref['lang'] ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $txt['title'] ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="<?= $pref['theme'] === 'dark' ? 'bg-gray-900 text-gray-100' : 'bg-gray-50 text-gray-800' ?> min-h-screen flex items-center justify-center p-4 transition-colors duration-200">

    <div class="max-w-md w-full rounded-2xl p-6 sm:p-8 shadow-xl border <?= $pref['theme'] === 'dark' ? 'bg-gray-800 border-gray-700' : 'bg-white border-gray-100' ?>">
        
        <!-- Header -->
        <div class="mb-6">
            <h1 class="text-2xl font-bold flex items-center gap-2">
                <i class="fa-solid fa-sliders text-indigo-500"></i> <?= $txt['title'] ?>
            </h1>
            <p class="text-sm text-gray-400 mt-1"><?= $txt['subtitle'] ?></p>
        </div>

        <!-- Alert Notification -->
        <?php if ($message): ?>
            <div class="mb-6 p-3 rounded-xl bg-emerald-500/10 border border-emerald-500/20 text-emerald-500 text-sm flex items-center gap-2">
                <i class="fa-solid fa-circle-check"></i>
                <span><?= $txt['success_msg'] ?></span>
            </div>
        <?php endif; ?>

        <!-- Form Pengaturan -->
        <form method="POST" action="settings.php" class="space-y-5">
            <div>
                <label class="block text-sm font-medium mb-2"><?= $txt['theme_label'] ?></label>
                <div class="grid grid-cols-2 gap-3">
                    <label class="cursor-pointer">
                        <input type="radio" name="theme" value="light" class="peer hidden" <?= $pref['theme'] === 'light' ? 'checked' : '' ?>>
                        <div class="p-3 text-center rounded-xl border border-gray-300 dark:border-gray-600 peer-checked:border-indigo-500 peer-checked:bg-indigo-500/10 peer-checked:text-indigo-500 transition">
                            <i class="fa-solid fa-sun block text-xl mb-1"></i>
                            <span class="text-xs font-semibold">Light</span>
                        </div>
                    </label>

                    <label class="cursor-pointer">
                        <input type="radio" name="theme" value="dark" class="peer hidden" <?= $pref['theme'] === 'dark' ? 'checked' : '' ?>>
                        <div class="p-3 text-center rounded-xl border border-gray-300 dark:border-gray-600 peer-checked:border-indigo-500 peer-checked:bg-indigo-500/10 peer-checked:text-indigo-500 transition">
                            <i class="fa-solid fa-moon block text-xl mb-1"></i>
                            <span class="text-xs font-semibold">Dark</span>
                        </div>
                    </label>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium mb-2"><?= $txt['lang_label'] ?></label>
                <select name="lang" class="w-full px-4 py-2.5 rounded-xl border text-sm font-medium focus:ring-2 focus:ring-indigo-500 outline-none <?= $pref['theme'] === 'dark' ? 'bg-gray-700 border-gray-600 text-white' : 'bg-gray-50 border-gray-200 text-gray-800' ?>">
                    <option value="id" <?= $pref['lang'] === 'id' ? 'selected' : '' ?>>🇮🇩 Bahasa Indonesia</option>
                    <option value="en" <?= $pref['lang'] === 'en' ? 'selected' : '' ?>>🇬🇧 English</option>
                </select>
            </div>

            <button type="submit" name="submit" class="w-full py-3 px-4 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl font-semibold text-sm shadow-lg shadow-indigo-500/25 transition">
                <i class="fa-solid fa-floppy-disk mr-1"></i> <?= $txt['btn_save'] ?>
            </button>
        </form>

        <div class="mt-6 text-center pt-4 border-t border-gray-200 dark:border-gray-700">
            <a href="index.php" class="text-sm font-medium text-gray-400 hover:text-indigo-500 transition flex items-center justify-center gap-2">
                <i class="fa-solid fa-arrow-left text-xs"></i> <?= $txt['back'] ?>
            </a>
        </div>

    </div>

</body>
</html>