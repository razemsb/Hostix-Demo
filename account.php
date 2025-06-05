<?php
require_once 'assets/config/config.php';
$current_page = 'Аккаунт '. $_SESSION['user']['Name'] . ' ' . $_SESSION['user']['Family'];
require_once 'assets/includes/header.php';
?>

<div class="account-container">
    <div class="account-header">
        <h1>Добро пожаловать, <?= $_SESSION['user']['Name'] ?>!</h1>
        <p class="account-subtitle">Управляйте своими услугами хостинга и следите за статистикой</p>
        
        <div class="account-stats">
            <div class="account-stat-box">
                <h3><?= count($hosting_services) ?></h3>
                <p>Активных услуг</p>
            </div>
            <div class="account-stat-box">
                <h3><?= $_SESSION['user']['balance'] ?>₽</h3>
                <p>Баланс</p>
            </div>
            <div class="account-stat-box">
                <h3><?= count(array_filter($support_tickets, function($t) { return $t['status'] == 'open'; })) ?></h3>
                <p>Открытых тикетов</p>
            </div>
            <div class="account-stat-box">
                <h3>99.9%</h3>
                <p>Uptime</p>
            </div>
        </div>
    </div>

    <div class="account-dashboard-grid">
        <div class="account-card">
            <h2><i class="fas fa-server"></i> Мои услуги хостинга</h2>
            
            <?php foreach ($hosting_services as $service): ?>
            <div class="service-item">
                <div class="service-header">
                    <div class="service-info">
                        <h3><?= $service['name'] ?></h3>
                        <p><?= $service['domain'] ?> • Истекает: <?= date('d.m.Y', strtotime($service['expires'])) ?></p>
                    </div>
                    <span class="status-badge status-<?= $service['status'] ?>">
                        <?= $service['status'] == 'active' ? 'Активен' : 'Приостановлен' ?>
                    </span>
                </div>
                
                <div class="resource-usage">
                    <div class="usage-item">
                        <span>Диск:</span>
                        <div class="usage-bar">
                            <div class="usage-fill" style="width: <?= ($service['disk_used'] / $service['disk_total']) * 100 ?>%"></div>
                        </div>
                        <span><?= $service['disk_used'] ?>GB / <?= $service['disk_total'] ?>GB</span>
                    </div>
                    
                    <div class="usage-item">
                        <span>Трафик:</span>
                        <div class="usage-bar">
                            <div class="usage-fill" style="width: <?= $service['bandwidth_total'] > 0 ? ($service['bandwidth_used'] / $service['bandwidth_total']) * 100 : 15 ?>%"></div>
                        </div>
                        <span><?= $service['bandwidth_used'] ?>GB <?= $service['bandwidth_total'] > 0 ? '/ ' . $service['bandwidth_total'] . 'GB' : '/ Безлимит' ?></span>
                    </div>
                    
                    <div class="usage-item">
                        <span>Последний бэкап:</span>
                        <span><?= date('d.m.Y H:i', strtotime($service['last_backup'])) ?></span>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="account-sidebar">
            <div class="account-card">
                <h2><i class="fas fa-credit-card"></i> Последние счета</h2>
                
                <?php foreach (array_slice($recent_invoices, 0, 3) as $invoice): ?>
                <div class="invoice-item">
                    <div class="invoice-info">
                        <h4><?= $invoice['id'] ?></h4>
                        <p><?= $invoice['description'] ?></p>
                        <p><?= date('d.m.Y', strtotime($invoice['date'])) ?></p>
                    </div>
                    <div class="invoice-amount">
                        <span class="status-badge status-<?= $invoice['status'] == 'paid' ? 'active' : 'suspended' ?>">
                            <?= $invoice['status'] == 'paid' ? 'Оплачен' : 'Просрочен' ?>
                        </span>
                        <div><?= $invoice['amount'] ?>₽</div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>

            <div class="account-card">
                <h2><i class="fas fa-headset"></i> Поддержка</h2>
                
                <?php foreach (array_slice($support_tickets, 0, 3) as $ticket): ?>
                <div class="ticket-item">
                    <div class="ticket-info">
                        <h4><?= $ticket['id'] ?></h4>
                        <p><?= $ticket['subject'] ?></p>
                        <p><?= date('d.m.Y', strtotime($ticket['date'])) ?></p>
                    </div>
                    <div class="ticket-status">
                        <div class="priority-<?= $ticket['priority'] ?>"><?= ucfirst($ticket['priority']) ?></div>
                        <div class="status-badge status-<?= $ticket['status'] == 'resolved' || $ticket['status'] == 'closed' ? 'active' : 'suspended' ?>">
                            <?= $ticket['status'] ?>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="account-quick-actions">
        <div class="account-action-card">
            <div class="action-icon">
                <i class="fas fa-plus"></i>
            </div>
            <h3>Заказать хостинг</h3>
            <p>Добавить новый хостинг план для вашего проекта</p>
        </div>
        
        <div class="account-action-card">
            <div class="action-icon">
                <i class="fas fa-globe"></i>
            </div>
            <h3>Регистрация домена</h3>
            <p>Зарегистрировать новый домен для вашего сайта</p>
        </div>
        
        <div class="account-action-card">
            <div class="action-icon">
                <i class="fas fa-wallet"></i>
            </div>
            <h3>Пополнить баланс</h3>
            <p>Добавить средства на ваш аккаунт</p>
        </div>
        
        <div class="account-action-card">
            <div class="action-icon">
                <i class="fas fa-tools"></i>
            </div>
            <h3>Панель управления</h3>
            <p>Открыть cPanel для управления сайтами</p>
        </div>
        
        <div class="account-action-card">
            <div class="action-icon">
                <i class="fas fa-chart-bar"></i>
            </div>
            <h3>Статистика</h3>
            <p>Просмотреть детальную статистику ресурсов</p>
        </div>
        
        <div class="account-action-card">
            <div class="action-icon">
                <i class="fas fa-life-ring"></i>
            </div>
            <h3>Создать тикет</h3>
            <p>Обратиться в службу технической поддержки</p>
        </div>
    </div>
</div>

<?php
require_once 'assets/includes/footer.php';
?> 