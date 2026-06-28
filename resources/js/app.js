// ============================================================
// app.js — Alpine.js + Lenis Smooth Scroll Initialization
// ============================================================

import Alpine from 'alpinejs';
import intersect from '@alpinejs/intersect';
import Lenis from 'lenis';
import '../css/app.css';

// Register Alpine plugins
Alpine.plugin(intersect);

// Expose globally for inline use
window.Alpine = Alpine;

// ── Lenis Smooth Scroll ──────────────────────────────────────
let lenis = null;

window.initLenis = function () {
    if (lenis) {
        lenis.destroy();
    }

    lenis = new Lenis({
        duration: 1.25,
        easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
        orientation: 'vertical',
        gestureOrientation: 'vertical',
        smoothWheel: true,
        wheelMultiplier: 1,
        touchMultiplier: 2,
        infinite: false,
    });

    lenis.on('scroll', ({ scroll }) => {
        window._lenisScroll = scroll;
    });

    function raf(time) {
        lenis.raf(time);
        requestAnimationFrame(raf);
    }
    requestAnimationFrame(raf);

    window._lenis = lenis;

    return lenis;
};

// Start Alpine
Alpine.start();

// ── Sidebar active nav on scroll ─────────────────────────────
window.addEventListener('DOMContentLoaded', () => {
    initSidebarNav();
});

function initSidebarNav() {
    const sections = ['hero', 'couple', 'countdown', 'event', 'gallery', 'rsvp', 'wishes'];
    const navItems = document.querySelectorAll('[data-section]');

    if (!navItems.length) return;

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    const id = entry.target.id;
                    navItems.forEach((item) => {
                        item.classList.toggle('active', item.dataset.section === id);
                    });
                }
            });
        },
        { threshold: 0.3, rootMargin: '-10% 0px -60% 0px' }
    );

    sections.forEach((id) => {
        const el = document.getElementById(id);
        if (el) observer.observe(el);
    });
}

// ── Smooth scroll to section ──────────────────────────────────
window.scrollToSection = function (id) {
    const el = document.getElementById(id);
    if (!el) return;

    if (window._lenis) {
        window._lenis.scrollTo(el, { offset: 0, duration: 1.4 });
    } else {
        el.scrollIntoView({ behavior: 'smooth' });
    }
};
