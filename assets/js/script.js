/*//////////////////////////////////////////////////////////////*/
/* скрипты */
/*//////////////////////////////////////////////////////////////*/
'use strict';

document.addEventListener('DOMContentLoaded', function() {
    initializeApp();
});


function initializeApp() {
    initNavbar();
    initSmoothScroll();
    initNewsletterForm();
    initAnimations();
    initCounters();
    initMobileMenu();
    initScrollToTop();
    initUserMenu();
    fadeInPage();
}

function initNavbar() {
    const navbar = document.getElementById('navbar');
    
    function handleScroll() {
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    }
    
    window.addEventListener('scroll', handleScroll);
    handleScroll(); 
}


function initSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            if (href !== '#' && href.length > 1) {
                e.preventDefault();
                const target = document.querySelector(href);
                if (target) {
                    const offsetTop = target.offsetTop - 80; 
                    window.scrollTo({
                        top: offsetTop,
                        behavior: 'smooth'
                    });
                }
            }
        });
    });

    
    const logo = document.querySelector('.logo');
    if (logo) {
        logo.addEventListener('click', function(e) {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }
}


function initNewsletterForm() {
    const form = document.querySelector('.newsletter-form');
    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            const emailInput = this.querySelector('.newsletter-input');
            const email = emailInput.value;
            
            if (isValidEmail(email)) {
                showNotification('Спасибо за подписку! Мы будем присылать вам самые интересные новости.', 'success');
                emailInput.value = '';
            } else {
                showNotification('Пожалуйста, введите корректный email адрес.', 'error');
            }
        });
    }
}


function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}


function showNotification(message, type = 'info') {
    
    const existingNotification = document.querySelector('.notification');
    if (existingNotification) {
        existingNotification.remove();
    }
    
    
    const notification = document.createElement('div');
    notification.className = `notification notification-${type}`;
    notification.innerHTML = `
        <div class="notification-content">
            <i class="fas ${type === 'success' ? 'fa-check-circle' : type === 'error' ? 'fa-exclamation-circle' : 'fa-info-circle'}"></i>
            <span>${message}</span>
            <button class="notification-close">
                <i class="fas fa-times"></i>
            </button>
        </div>
    `;
    
    
    notification.style.cssText = `
        position: fixed;
        top: 100px;
        right: 20px;
        z-index: 10000;
        background: ${type === 'success' ? 'var(--gradient-accent)' : type === 'error' ? 'linear-gradient(135deg, #ef4444, #dc2626)' : 'var(--glass)'};
        color: white;
        padding: 1rem 1.5rem;
        border-radius: 0.75rem;
        box-shadow: var(--shadow-dark);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        transform: translateX(100%);
        transition: transform 0.3s ease;
        max-width: 400px;
        word-wrap: break-word;
    `;
    
    notification.querySelector('.notification-content').style.cssText = `
        display: flex;
        align-items: center;
        gap: 0.75rem;
    `;
    
    const closeBtn = notification.querySelector('.notification-close');
    closeBtn.style.cssText = `
        background: none;
        border: none;
        color: white;
        cursor: pointer;
        padding: 0.25rem;
        border-radius: 0.25rem;
        opacity: 0.8;
        transition: opacity 0.2s;
    `;
    
    closeBtn.addEventListener('mouseenter', () => closeBtn.style.opacity = '1');
    closeBtn.addEventListener('mouseleave', () => closeBtn.style.opacity = '0.8');
    
    
    document.body.appendChild(notification);
    
    
    setTimeout(() => {
        notification.style.transform = 'translateX(0)';
    }, 10);
    
    
    function closeNotification() {
        notification.style.transform = 'translateX(100%)';
        setTimeout(() => {
            if (notification.parentNode) {
                notification.remove();
            }
        }, 300);
    }
    
    closeBtn.addEventListener('click', closeNotification);
    
    
    setTimeout(closeNotification, 5000);
}


function initAnimations() {
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-in');
            }
        });
    }, observerOptions);
    
    
    document.querySelectorAll('.feature-card, .pricing-card, .info-card, .stat-item').forEach(el => {
        el.style.cssText += `
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        `;
        observer.observe(el);
    });
    
    
    const style = document.createElement('style');
    style.textContent = `
        .animate-in {
            opacity: 1 !important;
            transform: translateY(0) !important;
        }
    `;
    document.head.appendChild(style);
}


function initCounters() {
    const counters = document.querySelectorAll('.stat-number');
    
    const animateCounter = (counter, target) => {
        const increment = target / 100;
        let current = 80;
        
        const updateCounter = () => {
            current += increment;
            if (current < target) {
                counter.textContent = Math.ceil(current);
                requestAnimationFrame(updateCounter);
            } else {
                counter.textContent = target;
            }
        };
        
        updateCounter();
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const counter = entry.target;
                const text = counter.textContent;
                
                
                if (text.includes('99.9%')) {
                    counter.textContent = '80.0%';
                    setTimeout(() => {
                        let current = 80.0;
                        const target = 99.9;
                        const timer = setInterval(() => {
                            current += 0.5;
                            if (current >= target) {
                                current = target;
                                clearInterval(timer);
                            }
                            counter.textContent = current.toFixed(1) + '%';
                        }, 20);
                    }, 200);
                } else if (text.includes('24/7')) {
                    
                }
                
                observer.unobserve(counter);
            }
        });
    }, { threshold: 0.5 });
    
    counters.forEach(counter => observer.observe(counter));
}


function initMobileMenu() {
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
    const navMenu = document.getElementById('navMenu');
    
    if (mobileMenuBtn && navMenu) {
        let isMenuOpen = false;
        
        console.log('Mobile menu initialized'); 
        
        mobileMenuBtn.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopPropagation();
            
            isMenuOpen = !isMenuOpen;
            
            if (isMenuOpen) {
                navMenu.classList.add('mobile-active');
                mobileMenuBtn.innerHTML = '<i class="fas fa-times"></i>';
                document.body.style.overflow = 'hidden';
            } else {
                navMenu.classList.remove('mobile-active');
                mobileMenuBtn.innerHTML = '<i class="fas fa-bars"></i>';
                document.body.style.overflow = '';
            }
        });
        
        
        navMenu.addEventListener('click', (e) => {
            if (e.target.classList.contains('nav-link') && isMenuOpen) {
                isMenuOpen = false;
                navMenu.classList.remove('mobile-active');
                mobileMenuBtn.innerHTML = '<i class="fas fa-bars"></i>';
                document.body.style.overflow = '';
            }
        });
        
        
        document.addEventListener('click', (e) => {
            if (isMenuOpen && !navMenu.contains(e.target) && !mobileMenuBtn.contains(e.target)) {
                isMenuOpen = false;
                navMenu.classList.remove('mobile-active');
                mobileMenuBtn.innerHTML = '<i class="fas fa-bars"></i>';
                document.body.style.overflow = '';
            }
        });
        
        
        window.addEventListener('resize', () => {
            if (window.innerWidth > 768 && isMenuOpen) {
                isMenuOpen = false;
                navMenu.classList.remove('mobile-active');
                mobileMenuBtn.innerHTML = '<i class="fas fa-bars"></i>';
                document.body.style.overflow = '';
            }
        });
    } else {
        console.error('Mobile menu elements not found:', {
            mobileMenuBtn: !!mobileMenuBtn,
            navMenu: !!navMenu
        });
    }
}


function initScrollToTop() {
    const scrollToTopBtn = document.querySelector('.scroll-to-top');
    
    if (scrollToTopBtn) {
        window.addEventListener('scroll', function() {
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            
            if (scrollTop > 300) {
                scrollToTopBtn.classList.add('visible');
            } else {
                scrollToTopBtn.classList.remove('visible');
            }
        }, { passive: true });
        
        scrollToTopBtn.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
            
            const handleScroll = () => {
                if (window.pageYOffset === 0) {
                    scrollToTopBtn.classList.remove('visible');
                    window.removeEventListener('scroll', handleScroll);
                }
            };
            
            window.addEventListener('scroll', handleScroll); 
        });
    }
}


function initUserMenu() {
    const userProfile = document.querySelector('.user-profile');
    const userDropdown = document.querySelector('.user-dropdown');
    
    if (userProfile && userDropdown) {
        let isDropdownOpen = false;
        let closeTimeout;
        let isMobile = window.innerWidth <= 768;
        
        
        window.addEventListener('resize', () => {
            isMobile = window.innerWidth <= 768;
        });
        
        
        if (isMobile || 'ontouchstart' in window) {
            userProfile.addEventListener('click', (e) => {
                e.preventDefault();
                e.stopPropagation();
                
                isDropdownOpen = !isDropdownOpen;
                
                if (isDropdownOpen) {
                    userDropdown.style.opacity = '1';
                    userDropdown.style.visibility = 'visible';
                    userDropdown.style.transform = window.innerWidth <= 480 ? 
                        'translateX(-50%) translateY(0)' : 'translateY(0)';
                } else {
                    userDropdown.style.opacity = '0';
                    userDropdown.style.visibility = 'hidden';
                    userDropdown.style.transform = window.innerWidth <= 480 ? 
                        'translateX(-50%) translateY(-10px)' : 'translateY(-10px)';
                }
            });
            
            
            document.addEventListener('click', (e) => {
                if (!userProfile.contains(e.target) && isDropdownOpen) {
                    isDropdownOpen = false;
                    userDropdown.style.opacity = '0';
                    userDropdown.style.visibility = 'hidden';
                    userDropdown.style.transform = window.innerWidth <= 480 ? 
                        'translateX(-50%) translateY(-10px)' : 'translateY(-10px)';
                }
            });
        } else {
            
            userProfile.addEventListener('mouseenter', () => {
                clearTimeout(closeTimeout);
                isDropdownOpen = true;
                userDropdown.style.opacity = '1';
                userDropdown.style.visibility = 'visible';
                userDropdown.style.transform = 'translateY(0)';
            });
            
            userProfile.addEventListener('mouseleave', () => {
                closeTimeout = setTimeout(() => {
                    isDropdownOpen = false;
                    userDropdown.style.opacity = '0';
                    userDropdown.style.visibility = 'hidden';
                    userDropdown.style.transform = 'translateY(-10px)';
                }, 200);
            });
        }
        
        
        const dropdownItems = userDropdown.querySelectorAll('.dropdown-item');
        dropdownItems.forEach(item => {
            item.addEventListener('click', (e) => {
                e.preventDefault();
                const itemId = item.getAttribute('id');
                switch(itemId) {
                    case 'mainPage':
                        const href = item.getAttribute('href');
                        showNotification('Переход на главную страницу...', 'info');
                        setTimeout(() => {
                            window.location.href = href;
                        }, 400);
                        break;
                        
                    case 'accountPage':
                        const accountHref = item.getAttribute('href');
                        showNotification('Переход в профиль пользователя...', 'info');
                        setTimeout(() => {
                            window.location.href = accountHref;
                        }, 400);
                        break;
                        
                    case 'servicesPage':
                        showNotification('Переход к управлению услугами...', 'info');
                        break;
                        
                    case 'billingPage':
                        showNotification('Открытие раздела биллинга...', 'info');
                        break;
                        
                    case 'settingsPage':
                        showNotification('Открытие настроек аккаунта...', 'info');
                        break;
                        
                    case 'supportPage':
                        showNotification('Переход в службу поддержки...', 'info');
                        break;
                        
                    case 'logoutBtn':
                        handleLogout();
                        break;
                        
                    default:
                        const text = item.querySelector('span').textContent;
                        switch(text) {
                            case 'Главная':
                                const mainHref = item.getAttribute('href');
                                if (mainHref && mainHref !== '#') {
                                    showNotification('Переход на главную страницу...', 'info');
                                    setTimeout(() => {
                                        window.location.href = mainHref;
                                    }, 700);
                                }
                                break;
                            case 'Мой профиль':
                                const profileHref = item.getAttribute('href');
                                if (profileHref && profileHref !== '#') {
                                    showNotification('Переход в профиль пользователя...', 'info');
                                    setTimeout(() => {
                                        window.location.href = profileHref;
                                    }, 700);
                                }
                                break;
                            case 'Настройки':
                                showNotification('Открытие настроек аккаунта...', 'info');
                                break;
                            case 'Мои услуги':
                                showNotification('Переход к управлению услугами...', 'info');
                                break;
                            case 'Биллинг':
                                showNotification('Открытие раздела биллинга...', 'info');
                                break;
                            case 'Поддержка':
                                showNotification('Переход в службу поддержки...', 'info');
                                break;
                            case 'Выйти':
                                handleLogout();
                                break;
                        }
                        break;
                }
                
                
                isDropdownOpen = false;
                userDropdown.style.opacity = '0';
                userDropdown.style.visibility = 'hidden';
                userDropdown.style.transform = window.innerWidth <= 480 ? 
                    'translateX(-50%) translateY(-10px)' : 'translateY(-10px)';
            });
        });
    }
}


function handleLogout() {
    
    if (confirm('Вы уверены, что хотите выйти из аккаунта?')) {
        showNotification('Выход из аккаунта...', 'info');
        
        
        setTimeout(() => {
            showNotification('Вы успешно вышли из аккаунта', 'success');
            setTimeout(() => {
                window.location.reload();
            }, 1500);
        }, 1000);
    }
}


function fadeInPage() {
    document.body.style.opacity = '0';
    document.body.style.transition = 'opacity 0.3s ease';
    
    window.addEventListener('load', () => {
        document.body.style.opacity = '1';
    });
}


fadeInPage();


window.EnigmaCloud = {
    showNotification,
    initializeApp
};