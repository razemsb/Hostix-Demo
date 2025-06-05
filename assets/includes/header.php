<?php include_once 'assets/config/config.php'; ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enigma Cloud - <?= $current_page ?? 'Профессиональный хостинг' ?></title>
    <link rel="icon" type="image/png" href="<?= BASE_URL ?>assets/img/favicon-96x96.png" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="<?= BASE_URL ?>assets/img/favicon.svg" />
    <link rel="shortcut icon" href="<?= BASE_URL ?>assets/img/favicon.ico" />
    <link rel="apple-touch-icon" sizes="180x180" href="<?= BASE_URL ?>assets/img/apple-touch-icon.png" />
    <meta name="apple-mobile-web-app-title" content="EnigmaCloud" />
    <link rel="manifest" href="<?= BASE_URL ?>assets/img/site.webmanifest" />
    <link rel="preload" href="<?= BASE_URL ?>assets/css/styles.css" as="style">
    <link rel="preload" href="<?= BASE_URL ?>assets/js/script.js" as="script">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/vendors/fontawesome-free-6.7.2-web/css/all.min.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/styles.css">
    <script src="<?= BASE_URL ?>assets/js/script.js" defer></script>
</head>
<body>
<nav class="navbar" id="navbar">
    <div class="nav-container">
        <a href="<?= BASE_URL ?>index.php" class="logo">
            <div class="logo-container">
                <img src="<?= BASE_URL ?>assets/img/favicon.svg" alt="Enigma Cloud" class="logo-img">
                <span class="logo-text">
                    <span class="logo-main">Enigma</span>
                    <span class="logo-sub">Cloud</span>
                </span>
            </div>
        </a>
        <ul class="nav-menu" id="navMenu">
            <li><a href="#features" class="nav-link"><i class="fas fa-server"></i> Хостинг</a></li>
            <li><a href="#pricing" class="nav-link"><i class="fas fa-desktop"></i> VPS</a></li>
            <li><a href="#" class="nav-link"><i class="fas fa-globe"></i> Домены</a></li>
            <li><a href="#" class="nav-link"><i class="fas fa-headset"></i> Поддержка</a></li>
            <?php if(isset($_SESSION['user']) || $_SESSION['user']['is_admin'] == true): ?>
            <li><a href="<?= BASE_URL ?>admin.php" class="nav-link"><i class="fas fa-user"></i> Админ панель</a></li>
            <?php endif; ?>
            <?php if (!isset($_SESSION['user'])): ?>
                <li><a href="#" class="cta-btn"><i class="fas fa-user-circle"></i> Войти</a></li>
            <?php else: ?>
            <li class="user-profile">
                <div class="username">
                    <span><?= $_SESSION['user']['Name'] . ' ' . $_SESSION['user']['Family'] ?></span>
                </div>
                <div class="user-avatar"><?= mb_strtoupper(mb_substr($_SESSION['user']['Name'], 0, 1, 'UTF-8'), 'UTF-8') . mb_strtoupper(mb_substr($_SESSION['user']['Family'], 0, 1, 'UTF-8'), 'UTF-8') ?></div>
                <div class="user-dropdown">
                    <div class="dropdown-header">
                        <div class="dropdown-user-name"><?= $_SESSION['user']['Name'] . ' ' . $_SESSION['user']['Family'] ?></div>
                        <div class="dropdown-user-balance">Баланс: <?= $_SESSION['user']['balance'] ?> руб.</div>
                        <div class="dropdown-user-email"><?= $_SESSION['user']['email'] ?></div>
                        <div class="user-status">
                            <div class="status-dot"></div>
                            <span>Онлайн</span>
                        </div>
                    </div>
                    <div class="dropdown-menu">
                        <?php if ($menu_items['index']): ?>
                        <a href="<?= BASE_URL ?>index.php" id="mainPage" class="dropdown-item">
                            <i class="fas fa-home"></i>
                            <span>Главная</span>
                        </a>
                        <?php endif; ?>
                        
                        <?php if ($menu_items['account']): ?>
                        <a href="<?= BASE_URL ?>account.php" id="accountPage" class="dropdown-item">
                            <i class="fas fa-user"></i>
                            <span>Мой профиль</span>
                        </a>
                        <?php endif; ?>
                        
                        <?php if ($menu_items['services']): ?>
                        <a href="#" id="servicesPage" class="dropdown-item">
                            <i class="fas fa-server"></i>
                            <span>Мои услуги</span>
                        </a>
                        <?php endif; ?>
                        
                        <?php if ($menu_items['billing']): ?>
                        <a href="#" id="billingPage" class="dropdown-item">
                            <i class="fas fa-credit-card"></i>
                            <span>Биллинг</span>
                        </a>
                        <?php endif; ?>
                        
                        <?php if ($menu_items['settings']): ?>
                        <a href="#" id="settingsPage" class="dropdown-item">
                            <i class="fas fa-cog"></i>
                            <span>Настройки</span>
                        </a>
                        <?php endif; ?>
                        
                        <?php if ($menu_items['support']): ?>
                        <a href="#" id="supportPage" class="dropdown-item">
                            <i class="fas fa-headset"></i>
                            <span>Поддержка</span>
                        </a>
                        <?php endif; ?>
                        
                        <a href="#" id="logoutBtn" class="dropdown-item danger">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Выйти</span>
                        </a>
                    </div>
                </div>
            </li>
            <?php endif; ?>
        </ul>
        <button class="mobile-menu-btn" id="mobileMenuBtn">
            <i class="fas fa-bars"></i>
        </button>
    </div>
</nav>