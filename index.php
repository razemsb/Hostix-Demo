<?php
require_once 'assets/config/config.php';
$current_page = 'Главная';
include_once 'assets/includes/header.php'; 
?>
<section class="hero">
    <div class="hero-content">
        <h1>Профессиональный <span class="text-gradient">хостинг</span> нового поколения</h1>
        <p class="hero-subtitle">Высокопроизводительные серверы, безупречная надёжность и круглосуточная
            поддержка.
            Запустите свой проект на лучшей платформе.</p>
        <a href="#pricing" class="hero-cta">
            <i class="fas fa-rocket"></i>
            Начать сейчас
        </a>
        <div class="stats">
            <div class="stat-item">
                <span class="stat-number">99.9%</span>
                <span class="stat-text">Uptime</span>
            </div>
            <div class="stat-item">
                <span class="stat-number">24/7</span>
                <span class="stat-text">Поддержка</span>
            </div>
        </div>
    </div>
</section>
<div class="main-content">
    <section class="section" id="features">
        <div class="section-header">
            <h2 class="section-title">Почему <span class="text-gradient">Enigma Cloud</span></h2>
            <p class="section-subtitle">Современные технологии и передовые решения для вашего бизнеса</p>
        </div>
        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-bolt"></i>
                </div>
                <h3 class="feature-title">Молниеносная скорость</h3>
                <p class="feature-description">NVMe SSD диски, CDN Cloudflare и оптимизированные серверы
                    обеспечивают максимальную производительность вашего сайта</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-shield-alt"></i>
                </div>
                <h3 class="feature-title">Максимальная безопасность</h3>
                <p class="feature-description">SSL сертификаты, DDoS защита, ежедневные резервные копии и
                    мониторинг
                    безопасности 24/7</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-cogs"></i>
                </div>
                <h3 class="feature-title">Простое управление</h3>
                <p class="feature-description">Интуитивная панель управления cPanel, автоустановщик CMS и
                    удобные
                    инструменты разработчика</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-headset"></i>
                </div>
                <h3 class="feature-title">Экспертная поддержка</h3>
                <p class="feature-description">Команда профессионалов готова помочь в любое время. Техподдержка
                    на
                    русском языке без выходных</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <h3 class="feature-title">Масштабируемость</h3>
                <p class="feature-description">Легкое увеличение ресурсов без простоев. От стартового хостинга
                    до
                    выделенных серверов</p>
            </div>
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="fas fa-gift"></i>
                </div>
                <h3 class="feature-title">Бонусы включены</h3>
                <p class="feature-description">Бесплатный SSL, домен на год, миграция сайта и установка
                    популярных
                    CMS в один клик</p>
            </div>
        </div>
    </section>
    <section class="section" id="pricing">
        <div class="section-header">
            <h2 class="section-title">Выберите <span class="text-gradient">свой план</span></h2>
            <p class="section-subtitle">Гибкие тарифы для проектов любого масштаба</p>
        </div>
        <div class="pricing-grid">
            <div class="pricing-card">
                <div class="plan-name">Starter</div>
                <div class="plan-price">299₽</div>
                <div class="plan-period">в месяц</div>
                <ul class="plan-features">
                    <li><i class="fas fa-check"></i> 1 сайт</li>
                    <li><i class="fas fa-check"></i> 10 ГБ NVMe SSD</li>
                    <li><i class="fas fa-check"></i> 100 ГБ трафика</li>
                    <li><i class="fas fa-check"></i> Бесплатный SSL</li>
                    <li><i class="fas fa-check"></i> cPanel управление</li>
                    <li><i class="fas fa-check"></i> Ежедневные бэкапы</li>
                    <li><i class="fas fa-check"></i> Техподдержка 24/7</li>
                </ul>
                <button class="plan-btn">Выбрать план</button>
            </div>
            <div class="pricing-card featured">
                <div class="popular-badge">Популярный</div>
                <div class="plan-name">Business</div>
                <div class="plan-price">699₽</div>
                <div class="plan-period">в месяц</div>
                <ul class="plan-features">
                    <li><i class="fas fa-check"></i> 5 сайтов</li>
                    <li><i class="fas fa-check"></i> 50 ГБ NVMe SSD</li>
                    <li><i class="fas fa-check"></i> Безлимитный трафик</li>
                    <li><i class="fas fa-check"></i> Бесплатный SSL</li>
                    <li><i class="fas fa-check"></i> Приоритетная поддержка</li>
                    <li><i class="fas fa-check"></i> CDN Cloudflare</li>
                    <li><i class="fas fa-check"></i> Бесплатная миграция</li>
                    <li><i class="fas fa-check"></i> SSH доступ</li>
                </ul>
                <button class="plan-btn primary">Выбрать план</button>
            </div>
            <div class="pricing-card">
                <div class="plan-name">Professional</div>
                <div class="plan-price">1299₽</div>
                <div class="plan-period">в месяц</div>
                <ul class="plan-features">
                    <li><i class="fas fa-check"></i> Безлимит сайтов</li>
                    <li><i class="fas fa-check"></i> 200 ГБ NVMe SSD</li>
                    <li><i class="fas fa-check"></i> Безлимитный трафик</li>
                    <li><i class="fas fa-check"></i> Wildcard SSL</li>
                    <li><i class="fas fa-check"></i> VIP поддержка</li>
                    <li><i class="fas fa-check"></i> Premium CDN</li>
                    <li><i class="fas fa-check"></i> Staging окружения</li>
                    <li><i class="fas fa-check"></i> Git интеграция</li>
                    <li><i class="fas fa-check"></i> WP-CLI доступ</li>
                </ul>
                <button class="plan-btn">Выбрать план</button>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="section-header">
            <h2 class="section-title">Дополнительные <span class="text-gradient">возможности</span></h2>
            <p class="section-subtitle">Всё что нужно для успешного проекта</p>
        </div>
        <div class="info-grid">
            <div class="info-card">
                <div class="info-icon">
                    <i class="fas fa-server"></i>
                </div>
                <h3 class="info-title">Мощная инфраструктура</h3>
                <p class="info-description">Современные дата-центры уровня Tier III с резервированием всех
                    систем
                </p>
            </div>
            <div class="info-card">
                <div class="info-icon">
                    <i class="fas fa-tools"></i>
                </div>
                <h3 class="info-title">Панель управления</h3>
                <p class="info-description">Интуитивная cPanel с русским интерфейсом и расширенным функционалом
                </p>
            </div>
            <div class="info-card">
                <div class="info-icon">
                    <i class="fas fa-rocket"></i>
                </div>
                <h3 class="info-title">Быстрая миграция</h3>
                <p class="info-description">Бесплатный перенос сайтов с любого хостинга за 24 часа</p>
            </div>
            <div class="info-card">
                <div class="info-icon">
                    <i class="fas fa-lock"></i>
                </div>
                <h3 class="info-title">Защита данных</h3>
                <p class="info-description">Автоматические бэкапы, антивирус и DDoS защита включены</p>
            </div>
            <div class="info-card">
                <div class="info-icon">
                    <i class="fas fa-globe"></i>
                </div>
                <h3 class="info-title">CDN сеть</h3>
                <p class="info-description">Глобальная сеть доставки контента для ускорения сайта</p>
            </div>
            <div class="info-card">
                <div class="info-icon">
                    <i class="fas fa-phone-alt"></i>
                </div>
                <h3 class="info-title">Поддержка 24/7</h3>
                <p class="info-description">Русскоязычная техподдержка через чат, email и телефон</p>
            </div>
        </div>
    </section>
</div>
<button class="scroll-to-top" title="Наверх">
    <i class="fas fa-arrow-up"></i>
</button>
<?php include_once 'assets/includes/footer.php'; ?>