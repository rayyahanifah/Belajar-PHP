<?php

define('COOKIE_EXPIRE_PREF', 30);
define('COOKIE_EXPIRE_HISTORY', 7);

function set_secure_cookie(string $name, string $value, int $days): bool {
    $options = [
        'expires'  => time() + ($days * 86400),
        'path'     => '/',
        'domain'   => '', 
        'secure'   => isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on', 
        'httponly' => true, 
        'samesite' => 'Lax'  
    ];

    return setcookie($name, $value, $options); //[cite: 1]
}

function delete_cookie(string $name): bool {
    if (isset($_COOKIE[$name])) {
        unset($_COOKIE[$name]);
        return setcookie($name, '', [
            'expires'  => time() - 3600,
            'path'     => '/',
            'httponly' => true, //[cite: 1]
            'samesite' => 'Lax'  //[cite: 1]
        ]); //[cite: 1]
    }
    return false;
}

function get_user_preferences(): array {
    $defaults = [
        'theme' => 'light',
        'lang'  => 'id'
    ];

    if (!isset($_COOKIE['user_pref'])) {
        return $defaults;
    }

    $data = json_decode($_COOKIE['user_pref'], true); //[cite: 1]

    if (!is_array($data)) {
        return $defaults;
    }

    $theme = filter_var($data['theme'] ?? '', FILTER_DEFAULT);
    $lang  = filter_var($data['lang'] ?? '', FILTER_DEFAULT);

    return [
        'theme' => in_array($theme, ['light', 'dark'], true) ? $theme : $defaults['theme'],
        'lang'  => in_array($lang, ['id', 'en'], true) ? $lang : $defaults['lang']
    ];
}

function get_recent_products(): array {
    if (!isset($_COOKIE['recent_products'])) {
        return [];
    }

    $data = json_decode($_COOKIE['recent_products'], true); 

    if (!is_array($data)) {
        return [];
    }

    $clean_ids = [];
    foreach ($data as $id) {
        $valid_id = filter_var($id, FILTER_VALIDATE_INT);
        if ($valid_id !== false && $valid_id > 0) {
            $clean_ids[] = $valid_id;
        }
    }

    return array_slice($clean_ids, 0, 5);
}

function add_recent_product(int $product_id): void {
    if ($product_id <= 0) {
        return;
    }

    $current_items = get_recent_products();

    $current_items = array_diff($current_items, [$product_id]);

    array_unshift($current_items, $product_id);

    $updated_items = array_slice($current_items, 0, 5);

    set_secure_cookie('recent_products', json_encode($updated_items), COOKIE_EXPIRE_HISTORY); //[cite: 1]
}