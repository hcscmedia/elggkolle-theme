/**
 * Elgg Kolle Theme - JavaScript for interactive features
 */

(function() {
    'use strict';
    
    /**
     * Dark Mode Toggle
     */
    const DarkMode = {
        init: function() {
            this.setupToggle();
            this.loadPreference();
        },
        
        setupToggle: function() {
            // Check for existing toggle or create one
            const toggle = document.querySelector('.theme-toggle');
            if (!toggle) {
                return;
            }
            
            toggle.addEventListener('click', () => {
                this.toggle();
            });
        },
        
        toggle: function() {
            const currentTheme = document.documentElement.getAttribute('data-theme');
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
            
            this.setTheme(newTheme);
            this.savePreference(newTheme);
        },
        
        setTheme: function(theme) {
            document.documentElement.setAttribute('data-theme', theme);
            
            // Dispatch event for other components
            const event = new CustomEvent('themechange', { detail: { theme } });
            document.dispatchEvent(event);
        },
        
        loadPreference: function() {
            const savedTheme = localStorage.getItem('elgg-theme') || 'light';
            this.setTheme(savedTheme);
        },
        
        savePreference: function(theme) {
            localStorage.setItem('elgg-theme', theme);
        }
    };
    
    /**
     * Smooth Scrolling
     */
    const SmoothScroll = {
        init: function() {
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', (e) => {
                    const href = anchor.getAttribute('href');
                    if (href === '#') return;
                    
                    const target = document.querySelector(href);
                    if (target) {
                        e.preventDefault();
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });
        }
    };
    
    /**
     * Infinite Scroll Helper
     */
    const InfiniteScroll = {
        init: function() {
            const elements = document.querySelectorAll('[data-infinite-scroll]');
            if (!elements.length) return;
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        this.loadMore(entry.target);
                    }
                });
            }, {
                rootMargin: '100px'
            });
            
            elements.forEach(el => observer.observe(el));
        },
        
        loadMore: function(element) {
            const url = element.getAttribute('data-next-url');
            if (!url) return;
            
            // Trigger AJAX load
            const event = new CustomEvent('loadmore', { detail: { url } });
            element.dispatchEvent(event);
        }
    };
    
    /**
     * Image Lazy Loading Enhancement
     */
    const LazyLoad = {
        init: function() {
            if ('loading' in HTMLImageElement.prototype) {
                const images = document.querySelectorAll('img[loading="lazy"]');
                images.forEach(img => {
                    img.src = img.dataset.src || img.src;
                });
            } else {
                // Fallback for browsers that don't support lazy loading
                const script = document.createElement('script');
                script.src = 'https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js';
                document.body.appendChild(script);
            }
        }
    };
    
    /**
     * Auto-expand Textareas
     */
    const AutoExpand = {
        init: function() {
            document.querySelectorAll('textarea[data-auto-expand]').forEach(textarea => {
                this.setup(textarea);
            });
        },
        
        setup: function(textarea) {
            textarea.style.overflow = 'hidden';
            textarea.style.resize = 'none';
            
            const adjust = () => {
                textarea.style.height = 'auto';
                textarea.style.height = textarea.scrollHeight + 'px';
            };
            
            textarea.addEventListener('input', adjust);
            adjust();
        }
    };
    
    /**
     * Toast Notifications
     */
    const Toast = {
        show: function(message, type = 'info', duration = 3000) {
            const toast = document.createElement('div');
            toast.className = `elgg-toast elgg-toast-${type}`;
            toast.textContent = message;
            toast.style.cssText = `
                position: fixed;
                bottom: 20px;
                right: 20px;
                padding: 16px 24px;
                background: var(--color-surface);
                border: 1px solid var(--color-border);
                border-radius: var(--radius-lg);
                box-shadow: var(--shadow-lg);
                z-index: 10000;
                animation: slideIn 0.3s ease-out;
            `;
            
            document.body.appendChild(toast);
            
            setTimeout(() => {
                toast.style.animation = 'slideOut 0.3s ease-out';
                setTimeout(() => toast.remove(), 300);
            }, duration);
        }
    };
    
    /**
     * Form Validation Enhancements
     */
    const FormValidation = {
        init: function() {
            document.querySelectorAll('form[data-validate]').forEach(form => {
                this.setup(form);
            });
        },
        
        setup: function(form) {
            form.addEventListener('submit', (e) => {
                if (!this.validate(form)) {
                    e.preventDefault();
                    Toast.show('Bitte überprüfen Sie Ihre Eingaben', 'error');
                }
            });
        },
        
        validate: function(form) {
            let valid = true;
            const inputs = form.querySelectorAll('[required]');
            
            inputs.forEach(input => {
                if (!input.value.trim()) {
                    input.classList.add('elgg-field-error');
                    valid = false;
                } else {
                    input.classList.remove('elgg-field-error');
                }
            });
            
            return valid;
        }
    };
    
    /**
     * Initialize everything when DOM is ready
     */
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
    
    function init() {
        DarkMode.init();
        SmoothScroll.init();
        InfiniteScroll.init();
        LazyLoad.init();
        AutoExpand.init();
        FormValidation.init();
    }
    
    // Export Toast for use in other scripts
    window.ElggKolleTheme = {
        Toast: Toast,
        DarkMode: DarkMode
    };
    
})();

// Add CSS animations
const style = document.createElement('style');
style.textContent = `
    @keyframes slideIn {
        from {
            transform: translateX(400px);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }
    
    @keyframes slideOut {
        from {
            transform: translateX(0);
            opacity: 1;
        }
        to {
            transform: translateX(400px);
            opacity: 0;
        }
    }
    
    .elgg-field-error {
        border-color: var(--color-error) !important;
    }
`;
document.head.appendChild(style);
