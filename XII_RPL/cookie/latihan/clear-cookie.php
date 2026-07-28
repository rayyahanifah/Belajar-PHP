<?php
require_once __DIR__ . '/helpers/cookie_helper.php';

delete_cookie('user_pref');
delete_cookie('recent_products');

header('Location: index.php?status=cleared'); 
exit;