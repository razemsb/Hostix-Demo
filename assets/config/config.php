<?php
session_start();
mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');

/* отладка */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/*===============================================*
/* ГЛОБАЛЬНЫЕ НАСТРОЙКИ */
/*===============================================*/


/* url */
$protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https://" : "http://";
$host = $_SERVER['HTTP_HOST'];
$path = rtrim(dirname($_SERVER['SCRIPT_NAME']), '\\/');

define('BASE_URL', $protocol.$host.$path.'/');

/* текущая страница для меню */
$current_page = basename($_SERVER['REQUEST_URI'], '.php');
$current_page = str_replace('/', '', $current_page);

if (empty($current_page) || $current_page === '') {
    $current_page = 'index';
}

$menu_items = [
    'index' => true,
    'account' => true, 
    'services' => true,
    'billing' => true,
    'settings' => true,
    'support' => true
];

switch ($current_page) {
    case 'index':
        $menu_items['index'] = false;
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

/*===============================================*
/* тестовые данные */
/*===============================================*/

$_SESSION['user'] = [
    'Name' => 'Иван',
    'Family' => 'Иванов',
    'email' => 'ivan.goida@gmail.com',
    'password' => 'password123',
    'balance' => 1000,
    'is_admin' => true
];

$hosting_services = [
    [
        'id' => 1,
        'name' => 'Business План',
        'domain' => 'mysite.ru',
        'plan' => 'Business',
        'status' => 'active',
        'expires' => '2024-12-15',
        'disk_used' => 15.6,
        'disk_total' => 50,
        'bandwidth_used' => 125.3,
        'bandwidth_total' => 0, 
        'last_backup' => '2024-01-20 03:30'
    ],
    [
        'id' => 2,
        'name' => 'Starter План',
        'domain' => 'testsite.com',
        'plan' => 'Starter',
        'status' => 'suspended',
        'expires' => '2024-02-10',
        'disk_used' => 8.2,
        'disk_total' => 10,
        'bandwidth_used' => 45.1,
        'bandwidth_total' => 100,
        'last_backup' => '2024-01-19 03:30'
    ]
];

$recent_invoices = [
    ['id' => '#INV-2024-001', 'date' => '2024-01-15', 'amount' => 699, 'status' => 'paid', 'description' => 'Business План - январь 2024'],
    ['id' => '#INV-2024-002', 'date' => '2024-01-10', 'amount' => 299, 'status' => 'overdue', 'description' => 'Starter План - январь 2024'],
    ['id' => '#INV-2023-145', 'date' => '2023-12-15', 'amount' => 699, 'status' => 'paid', 'description' => 'Business План - декабрь 2023']
];

$support_tickets = [
    ['id' => '#TICKET-789', 'subject' => 'Проблема с SSL сертификатом', 'status' => 'open', 'priority' => 'high', 'date' => '2024-01-19'],
    ['id' => '#TICKET-756', 'subject' => 'Увеличение дискового пространства', 'status' => 'resolved', 'priority' => 'medium', 'date' => '2024-01-15'],
    ['id' => '#TICKET-723', 'subject' => 'Настройка DNS записей', 'status' => 'closed', 'priority' => 'low', 'date' => '2024-01-10']
];
?>