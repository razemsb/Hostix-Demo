<?php include_once 'assets/includes/header.php'; ?>
<section class="error-404">
    <div class="error-content">
        <div class="error-animation">
            <div class="error-number">
                <span class="error-digit">4</span>
                <div class="error-planet">
                    <div class="error-planet-surface"></div>
                    <div class="error-planet-ring"></div>
                </div>
                <span class="error-digit">4</span>
            </div>
            <div class="error-stars">
                <div class="star"></div>
                <div class="star"></div>
                <div class="star"></div>
                <div class="star"></div>
                <div class="star"></div>
            </div>
        </div>
        
        <div class="error-text">
            <h1 class="error-title">Ой! Страница <span class="text-gradient">потерялась</span> в космосе</h1>
            <p class="error-subtitle">
                Кажется, вы попали в неизведанную область интернета. 
                Эта страница либо перемещена, либо никогда не существовала.
            </p>
            
            <div class="error-suggestions">
                <h3><i class="fas fa-compass"></i> Что можно сделать:</h3>
                <ul>
                    <li><i class="fas fa-home"></i> Вернуться на <a href="<?= BASE_URL ?>index.php">главную страницу</a></li>
                    <li><i class="fas fa-search"></i> Воспользоваться поиском по сайту</li>
                    <li><i class="fas fa-sitemap"></i> Перейти к <a href="<?= BASE_URL ?>index.php#features">нашим услугам</a></li>
                    <li><i class="fas fa-headset"></i> Обратиться в <a href="<?= BASE_URL ?>index.php#footer">службу поддержки</a></li>
                </ul>
            </div>
            
            <div class="error-actions">
                <a href="<?= BASE_URL ?>index.php" class="error-btn primary">
                    <i class="fas fa-home"></i>
                    На главную
                </a>
                <a href="javascript:history.back()" class="error-btn secondary">
                    <i class="fas fa-arrow-left"></i>
                    Назад
                </a>
            </div>
        </div>
    </div>
</section>
<?php include_once 'assets/includes/footer.php'; ?> 