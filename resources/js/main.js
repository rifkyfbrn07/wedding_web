// ============================================================
// main.js — Single Vite entry point for the wedding invitation
// Imports: Alpine, Lenis, GSAP, and all feature modules
// ============================================================

import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import Alpine from 'alpinejs';
import intersect from '@alpinejs/intersect';
import Lenis from 'lenis';

import { initCover }          from './cover.js';
import { initFireflies }      from './fireflies.js';
import { initGsapAnimations } from './gsap-animations.js';
import { initCountdown }      from './countdown.js';
import { initMusicPlayer }    from './music.js';
import { initGallery }        from './gallery.js';
import { initRsvp }           from './rsvp.js';
import { initWishes }         from './wishes.js';

// ── Register GSAP plugins ────────────────────────────────────
gsap.registerPlugin(ScrollTrigger);
window.gsap = gsap;
window.ScrollTrigger = ScrollTrigger;

// ── Alpine setup ─────────────────────────────────────────────
Alpine.plugin(intersect);
window.Alpine = Alpine;
Alpine.start();

// ── Lenis init (called after cover opens) ────────────────────
window.initLenis = function () {
    const lenis = new Lenis({
        duration: 1.25,
        easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
        smoothWheel: true,
        wheelMultiplier: 1,
        touchMultiplier: 2,
    });

    lenis.on('scroll', ({ scroll }) => {
        window._lenisScroll = scroll;
        ScrollTrigger.update();
    });

    function raf(time) {
        lenis.raf(time);
        requestAnimationFrame(raf);
    }
    requestAnimationFrame(raf);

    window._lenis = lenis;
    return lenis;
};

// ── Smooth scroll helper ─────────────────────────────────────
window.scrollToSection = function (id) {
    const el = document.getElementById(id);
    if (!el) return;
    if (window._lenis) {
        window._lenis.scrollTo(el, { duration: 1.4 });
    } else {
        el.scrollIntoView({ behavior: 'smooth' });
    }
};

// ── Initialize on DOMContentLoaded ───────────────────────────
document.addEventListener('DOMContentLoaded', () => {
    const wedding = window.WEDDING ?? {};

    // Cover page — sets up open-invitation button
    initCover();
    initFireflies('cover-page', 22);

    // Music player FAB
    initMusicPlayer();

    // Gallery lightbox
    initGallery();

    // RSVP AJAX form
    initRsvp();

    // Wishes AJAX list + form
    if (wedding.invitationId) {
        initWishes(wedding.invitationId);
    }

    // Countdown timer
    if (wedding.akadDate) {
        initCountdown(wedding.akadDate);
    }

    // Sidebar active nav highlight
    initSidebarNav();
});

// ── After cover opens: start GSAP animations ─────────────────
window.addEventListener('cover-opened', () => {
    initGsapAnimations();
});

// ── Sidebar nav active state via IntersectionObserver ────────
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
