// ============================================================
// gallery.js — Gallery lightbox
// ============================================================

export function initGallery() {
    const items = document.querySelectorAll('.gallery-item');
    const lightbox = document.getElementById('lightbox');
    const lightboxImg = document.getElementById('lightbox-img');
    const lightboxClose = document.getElementById('lightbox-close');

    if (!lightbox) return;

    items.forEach((item) => {
        item.addEventListener('click', () => {
            const src = item.dataset.fullSrc || item.querySelector('img')?.src;
            if (!src || !lightboxImg) return;

            lightboxImg.src = src;
            lightbox.classList.add('open');
            document.body.style.overflow = 'hidden';

            // Animate image in
            lightboxImg.style.opacity = '0';
            lightboxImg.style.transform = 'scale(0.95)';
            setTimeout(() => {
                lightboxImg.style.transition = 'all 0.4s ease';
                lightboxImg.style.opacity = '1';
                lightboxImg.style.transform = 'scale(1)';
            }, 50);
        });
    });

    function closeLightbox() {
        lightbox.classList.remove('open');
        document.body.style.overflow = '';
    }

    if (lightboxClose) {
        lightboxClose.addEventListener('click', closeLightbox);
    }

    lightbox.addEventListener('click', (e) => {
        if (e.target === lightbox) closeLightbox();
    });

    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') closeLightbox();
    });
}
