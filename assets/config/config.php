<?php
session_start();
/* отладка */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/* настройки */
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://";
$host = $_SERVER['HTTP_HOST'];
$path = rtrim(dirname($_SERVER['SCRIPT_NAME']), '\\/');
if ($path === '/site') {
    define('BASE_URL', $protocol.$host.'/site/');
} 
else {
    define('BASE_URL', $protocol.$host.$path.'/');
}
$current_page = basename($_SERVER['REQUEST_URI'], '.php');
$current_page = str_replace('/', '', $current_page);

if (empty($current_page) || $current_page === '') {
    $current_page = 'index';
}

$menu_items = [
    'home' => true,
    'account' => true,
    'services' => true,
    'billing' => true,
    'settings' => true,
    'support' => true
];

switch ($current_page) {
    case 'index':
        $menu_items['home'] = false;
        break;
    case 'account':
        $menu_items['account'] = false;
        break;
    case 'services':
        $menu_items['services'] = false;
        break;
    case 'billing':
        $menu_items['billing'] = false;
        break;
    case 'settings':
        $menu_items['settings'] = false;
        break;
    case 'support':
        $menu_items['support'] = false;
        break;
}
?>