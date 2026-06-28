// ============================================================
// gsap-animations.js — All GSAP scroll-triggered animations
// ============================================================

import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

export function initGsapAnimations() {
    // Wait a tick to ensure DOM and Lenis are ready
    requestAnimationFrame(() => {
        animateFadeUps();
        animateCoupleSection();
        animateEventCards();
        animateGallery();
        animateCountdown();
    });
}

// ── Generic fade-up for .gsap-fade-up elements ────────────────
function animateFadeUps() {
    gsap.utils.toArray('.gsap-fade-up').forEach((el) => {
        gsap.to(el, {
            y: 0,
            opacity: 1,
            duration: 0.9,
            ease: 'power3.out',
            scrollTrigger: {
                trigger: el,
                start: 'top 88%',
                toggleActions: 'play none none none',
            },
        });
    });
}

// ── Couple section stagger ────────────────────────────────────
function animateCoupleSection() {
    const coupleCards = document.querySelectorAll('.couple-card');
    if (!coupleCards.length) return;

    coupleCards.forEach((card, i) => {
        gsap.from(card, {
            y: 60,
            opacity: 0,
            duration: 1.1,
            ease: 'power3.out',
            delay: i * 0.2,
            scrollTrigger: {
                trigger: '#couple',
                start: 'top 75%',
                toggleActions: 'play none none none',
            },
        });
    });
}

// ── Event cards slide in from sides ──────────────────────────
function animateEventCards() {
    const cards = document.querySelectorAll('.event-card');
    if (!cards.length) return;

    gsap.from(cards[0], {
        x: -60,
        opacity: 0,
        duration: 1.0,
        ease: 'power3.out',
        scrollTrigger: {
            trigger: '#event',
            start: 'top 80%',
        },
    });

    if (cards[1]) {
        gsap.from(cards[1], {
            x: 60,
            opacity: 0,
            duration: 1.0,
            ease: 'power3.out',
            delay: 0.15,
            scrollTrigger: {
                trigger: '#event',
                start: 'top 80%',
            },
        });
    }
}

// ── Gallery items stagger ─────────────────────────────────────
function animateGallery() {
    const items = document.querySelectorAll('.gallery-item');
    if (!items.length) return;

    gsap.from(items, {
        scale: 0.92,
        opacity: 0,
        duration: 0.8,
        ease: 'power2.out',
        stagger: {
            amount: 0.6,
            from: 'start',
        },
        scrollTrigger: {
            trigger: '#gallery',
            start: 'top 80%',
        },
    });
}

// ── Countdown numbers entrance ────────────────────────────────
function animateCountdown() {
    gsap.from('.countdown-unit', {
        y: 30,
        opacity: 0,
        duration: 0.8,
        ease: 'back.out(1.5)',
        stagger: 0.1,
        scrollTrigger: {
            trigger: '#countdown',
            start: 'top 80%',
        },
    });
}

// ── Section titles ────────────────────────────────────────────
export function animateSectionTitle(sectionId) {
    const section = document.getElementById(sectionId);
    if (!section) return;

    const eyebrow = section.querySelector('.section-eyebrow');
    const title = section.querySelector('.section-title');
    const line = section.querySelector('.gold-line');

    const tl = gsap.timeline({
        scrollTrigger: {
            trigger: section,
            start: 'top 80%',
            toggleActions: 'play none none none',
        },
    });

    if (eyebrow) tl.from(eyebrow, { y: 20, opacity: 0, duration: 0.6, ease: 'power2.out' });
    if (title)   tl.from(title, { y: 30, opacity: 0, duration: 0.8, ease: 'power3.out' }, '-=0.3');
    if (line)    tl.from(line, { scaleX: 0, duration: 0.6, ease: 'power2.out' }, '-=0.4');
}
