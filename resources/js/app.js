import './bootstrap';

// ============================================================
// LAZISMU LENGKONG — Main JavaScript
// ============================================================

// --- Navbar Scroll Effect ---
document.addEventListener('DOMContentLoaded', () => {
    const navbar = document.getElementById('navbar');
    if (navbar) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.add('bg-white', 'shadow-nav');
                navbar.classList.remove('bg-transparent');
            } else {
                navbar.classList.remove('bg-white', 'shadow-nav');
                navbar.classList.add('bg-transparent');
            }
        });
    }

    // --- Mobile Menu Toggle ---
    const menuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    const menuBackdrop = document.getElementById('menu-backdrop');

    if (menuBtn && mobileMenu) {
        menuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('translate-x-full');
            menuBackdrop?.classList.toggle('hidden');
            document.body.classList.toggle('overflow-hidden');
        });

        menuBackdrop?.addEventListener('click', () => {
            mobileMenu.classList.add('translate-x-full');
            menuBackdrop.classList.add('hidden');
            document.body.classList.remove('overflow-hidden');
        });
    }

    // --- Back to Top Button ---
    const backToTop = document.getElementById('back-to-top');
    if (backToTop) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 300) {
                backToTop.classList.remove('opacity-0', 'pointer-events-none');
                backToTop.classList.add('opacity-100');
            } else {
                backToTop.classList.add('opacity-0', 'pointer-events-none');
                backToTop.classList.remove('opacity-100');
            }
        });

        backToTop.addEventListener('click', () => {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    }

    // --- Count Up Animation ---
    const counters = document.querySelectorAll('[data-count-up]');
    if (counters.length > 0) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const el = entry.target;
                    const target = parseInt(el.getAttribute('data-count-up'));
                    const suffix = el.getAttribute('data-suffix') || '';
                    const prefix = el.getAttribute('data-prefix') || '';
                    const duration = 2000;
                    const step = target / (duration / 16);
                    let current = 0;

                    const timer = setInterval(() => {
                        current += step;
                        if (current >= target) {
                            current = target;
                            clearInterval(timer);
                        }
                        el.textContent = prefix + Math.floor(current).toLocaleString('id-ID') + suffix;
                    }, 16);

                    observer.unobserve(el);
                }
            });
        }, { threshold: 0.5 });

        counters.forEach(counter => observer.observe(counter));
    }

    // --- Currency Input Formatter ---
    document.querySelectorAll('[data-currency-input]').forEach(input => {
        input.addEventListener('input', (e) => {
            let value = e.target.value.replace(/\D/g, '');
            e.target.value = value ? parseInt(value).toLocaleString('id-ID') : '';
            // Store raw value
            const rawInput = document.getElementById(e.target.dataset.currencyInput);
            if (rawInput) rawInput.value = value;
        });
    });
});
