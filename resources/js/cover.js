// ============================================================
// cover.js — Opening cover page: animation, music, scroll unlock
// ============================================================

import { gsap } from 'gsap';

let hasOpened = false;

export function initCover() {
    const cover = document.getElementById('cover-page');
    const openBtn = document.getElementById('open-invitation-btn');

    if (!cover || !openBtn) return;

    // Lock scroll on load
    document.body.classList.add('cover-locked');

    // Entrance animation for corner decorations
    gsap.from('.ornament-top-left', {
        x: -120,
        y: -120,
        opacity: 0,
        duration: 1.6,
        ease: 'power4.out',
        delay: 0.2
    });
    
    gsap.from('.ornament-top-right', {
        x: 120,
        y: -120,
        opacity: 0,
        duration: 1.6,
        ease: 'power4.out',
        delay: 0.3
    });
    
    gsap.from('.ornament-bottom-left', {
        x: -120,
        y: 120,
        opacity: 0,
        duration: 1.6,
        ease: 'power4.out',
        delay: 0.4
    });
    
    gsap.from('.ornament-bottom-right', {
        x: 120,
        y: 120,
        opacity: 0,
        duration: 1.6,
        ease: 'power4.out',
        delay: 0.5
    });

    gsap.from('.cover-content > *', {
        y: 40,
        opacity: 0,
        duration: 1.2,
        ease: 'power3.out',
        stagger: 0.15,
        delay: 0.5
    });

    openBtn.addEventListener('click', openInvitation);
    openBtn.addEventListener('keydown', (e) => {
        if (e.key === 'Enter' || e.key === ' ') {
            e.preventDefault();
            openInvitation();
        }
    });
}

function openInvitation() {
    if (hasOpened) return;
    hasOpened = true;

    // 1. Start music
    startMusic();

    // 2. Animate cover and ornaments out
    const cover = document.getElementById('cover-page');

    const tl = gsap.timeline();
    
    tl.to('.ornament-top-left', { x: -160, y: -160, opacity: 0, duration: 0.8, ease: 'power3.inOut' }, 0)
      .to('.ornament-top-right', { x: 160, y: -160, opacity: 0, duration: 0.8, ease: 'power3.inOut' }, 0)
      .to('.ornament-bottom-left', { x: -160, y: 160, opacity: 0, duration: 0.8, ease: 'power3.inOut' }, 0)
      .to('.ornament-bottom-right', { x: 160, y: 160, opacity: 0, duration: 0.8, ease: 'power3.inOut' }, 0)
      .to('.cover-content > *', { y: -60, opacity: 0, duration: 0.6, ease: 'power3.in', stagger: 0.05 }, 0)
      .to(cover, {
          opacity: 0,
          scale: 1.06,
          duration: 1.0,
          ease: 'power3.inOut',
      }, 0.1)
      .call(() => {
          // 3. Remove cover from flow and unlock scroll
          cover.style.display = 'none';
          document.body.classList.remove('cover-locked');

          // 4. Init Lenis smooth scroll
          if (window.initLenis) {
              window.initLenis();
          }

          // 5. Fire event so GSAP animations can start
          window.dispatchEvent(new CustomEvent('cover-opened'));

          // 6. Trigger hero entrance animations
          animateHeroEntrance();
      });
}

function animateHeroEntrance() {
    const { gsap } = window;
    if (!gsap) return;

    gsap.to('.hero-title .name-line', {
        y: 0,
        opacity: 1,
        duration: 1.2,
        ease: 'power4.out',
        stagger: 0.15,
    });

    gsap.to('.hero-title .amp-line', {
        y: 0,
        opacity: 1,
        duration: 1.0,
        ease: 'power3.out',
        delay: 0.3,
    });

    gsap.to('.hero-tagline', {
        opacity: 1,
        y: 0,
        duration: 1.0,
        ease: 'power2.out',
        delay: 0.6,
    });
}

function startMusic() {
    const audio = document.getElementById('bg-music');
    if (!audio) return;

    const savedState = localStorage.getItem('wedding-music-playing');
    // Default to playing
    if (savedState !== 'false') {
        audio.volume = 0;
        audio.play().catch(() => {});

        // Fade in volume
        let vol = 0;
        const fadeInterval = setInterval(() => {
            vol = Math.min(vol + 0.05, 0.6);
            audio.volume = vol;
            if (vol >= 0.6) clearInterval(fadeInterval);
        }, 100);
    }
}
