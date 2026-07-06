export function initFireflies(containerId = 'cover-page', count = 18) {
    const container = document.getElementById(containerId);
    if (!container) return;

    const firefliesWrapper = document.createElement('div');
    firefliesWrapper.classList.add('fireflies');

    for (let i = 0; i < count; i++) {
        const firefly = document.createElement('span');
        firefly.classList.add('firefly');
        const size = 4 + Math.random() * 6;
        const left = Math.random() * 100;
        const top = Math.random() * 100;
        const delay = Math.random() * 4;
        const duration = 4 + Math.random() * 4;
        const scale = 0.75 + Math.random() * 0.8;

        firefly.style.width = `${size}px`;
        firefly.style.height = `${size}px`;
        firefly.style.left = `${left}%`;
        firefly.style.top = `${top}%`;
        firefly.style.animationDelay = `${delay}s`;
        firefly.style.animationDuration = `${duration}s`;
        firefly.style.transform = `scale(${scale})`;
        firefly.style.opacity = '0';

        firefliesWrapper.appendChild(firefly);
    }

    container.appendChild(firefliesWrapper);
}
