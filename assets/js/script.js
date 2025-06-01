
'use strict';
document.addEventListener('DOMContentLoaded', function() {
    initializeApp();
});

// Initialize all app functionality
function initializeApp() {
    initNavbar();
    initSmoothScroll();
    initNewsletterForm();
    initAnimations();
    initCounters();
    initMobileMenu();
}

// Navbar scroll effect
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
    handleScroll(); // Initial check
}

// Smooth scroll for anchor links
function initSmoothScroll() {
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                const offsetTop = target.offsetTop - 80; // Account for navbar height
                window.scrollTo({
                    top: offsetTop,
                    behavior: 'smooth'
                });
            }
        });
    });
}

// Newsletter form handling
function initNewsletterForm() {
    const form = document.querySelector('.newsletter-form');
    if (form) {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            const emailInput = this.querySelector('.newsletter-input');
            const email = emailInput.value;
            
            if (isValidEmail(email)) {
                // Show success message
                showNotification('Спасибо за подписку! Мы будем присылать вам самые интересные новости.', 'success');
                emailInput.value = '';
            } else {
                showNotification('Пожалуйста, введите корректный email адрес.', 'error');
            }
        });
    }
}

// Email validation
function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

// Show notification
function showNotification(message, type = 'info') {
    // Remove existing notifications
    const existingNotification = document.querySelector('.notification');
    if (existingNotification) {
        existingNotification.remove();
    }
    
    // Create notification element
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
    
    // Add styles
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
    
    // Add to page
    document.body.appendChild(notification);
    
    // Animate in
    setTimeout(() => {
        notification.style.transform = 'translateX(0)';
    }, 10);
    
    // Handle close
    function closeNotification() {
        notification.style.transform = 'translateX(100%)';
        setTimeout(() => {
            if (notification.parentNode) {
                notification.remove();
            }
        }, 300);
    }
    
    closeBtn.addEventListener('click', closeNotification);
    
    // Auto close after 5 seconds
    setTimeout(closeNotification, 5000);
}

// Initialize animations on scroll
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
    
    // Observe animation elements
    document.querySelectorAll('.feature-card, .pricing-card, .info-card').forEach(el => {
        el.style.cssText += `
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.6s ease, transform 0.6s ease;
        `;
        observer.observe(el);
    });
    
    // Add animate-in styles
    const style = document.createElement('style');
    style.textContent = `
        .animate-in {
            opacity: 1 !important;
            transform: translateY(0) !important;
        }
    `;
    document.head.appendChild(style);
}

// Counter animation for stats
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
                
                // Parse numbers from text
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
                } else if (text.includes('50K+')) {
                    counter.textContent = '0';
                    setTimeout(() => animateCounter(counter, 50000), 400);
                } else if (text.includes('24/7')) {
                    // No animation for 24/7
                } else if (text.includes('15')) {
                    counter.textContent = '0';
                    setTimeout(() => animateCounter(counter, 15), 600);
                }
                
                observer.unobserve(counter);
            }
        });
    }, { threshold: 0.5 });
    
    counters.forEach(counter => observer.observe(counter));
}

// Mobile menu functionality
function initMobileMenu() {
    const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
    const navMenu = document.querySelector('.nav-menu');
    
    if (mobileMenuBtn && navMenu) {
        let isMenuOpen = false;
        
        mobileMenuBtn.addEventListener('click', () => {
            isMenuOpen = !isMenuOpen;
            
            if (isMenuOpen) {
                navMenu.style.cssText = `
                    display: flex;
                    position: fixed;
                    top: 80px;
                    left: 0;
                    width: 100%;
                    background: var(--glass);
                    backdrop-filter: blur(20px);
                    flex-direction: column;
                    padding: 2rem;
                    gap: 1rem;
                    border-bottom: 1px solid var(--border-light);
                    transform: translateY(-100%);
                    transition: transform 0.3s ease;
                `;
                
                setTimeout(() => {
                    navMenu.style.transform = 'translateY(0)';
                }, 10);
                
                mobileMenuBtn.innerHTML = '<i class="fas fa-times"></i>';
            } else {
                navMenu.style.transform = 'translateY(-100%)';
                setTimeout(() => {
                    navMenu.style.display = '';
                    navMenu.style.cssText = '';
                }, 300);
                mobileMenuBtn.innerHTML = '<i class="fas fa-bars"></i>';
            }
        });
        
        // Close menu on link click
        navMenu.addEventListener('click', (e) => {
            if (e.target.tagName === 'A' && isMenuOpen) {
                mobileMenuBtn.click();
            }
        });
    }
}

// Utility function to handle page transitions
function fadeInPage() {
    document.body.style.opacity = '0';
    document.body.style.transition = 'opacity 0.3s ease';
    
    window.addEventListener('load', () => {
        document.body.style.opacity = '1';
    });
}

// Initialize page fade
fadeInPage();

// Export functions for potential external use
window.EnigmaCloud = {
    showNotification,
    initializeApp
};