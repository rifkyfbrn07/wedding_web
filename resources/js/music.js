// ============================================================
// music.js — Music player FAB toggle (play/pause)
// ============================================================

let isPlaying = false;
let audio = null;

export async function playMusic() {
    audio = document.getElementById('bg-music');
    if (!audio) return;

    // Ensure audio volume is greater than zero and not programmatically muted
    audio.volume = 0.6;

    const isFirstPlay = !localStorage.getItem('wedding-music-started-position');
    if (isFirstPlay) {
        try {
            audio.currentTime = 30;
            localStorage.setItem('wedding-music-started-position', 'true');
        } catch (e) {
            console.warn("Failed to seek to 30s before playing:", e);
        }
    }

    try {
        await audio.play();
        if (isFirstPlay && audio.currentTime < 30) {
            try {
                audio.currentTime = 30;
            } catch (e) {
                console.warn("Failed to seek to 30s after playing:", e);
            }
        }
    } catch (e) {
        console.error(e);
    }

    isPlaying = true;
    localStorage.setItem('wedding-music-playing', 'true');

    const toggle = document.getElementById('music-toggle');
    if (toggle) {
        toggle.classList.add('playing');
    }
    const playIcon = document.getElementById('music-icon-play');
    const pauseIcon = document.getElementById('music-icon-pause');
    if (playIcon) playIcon.style.display = 'none';
    if (pauseIcon) pauseIcon.style.display = '';
}

export function pauseMusic() {
    audio = document.getElementById('bg-music');
    if (!audio) return;

    audio.pause();
    isPlaying = false;
    localStorage.setItem('wedding-music-playing', 'false');

    const toggle = document.getElementById('music-toggle');
    if (toggle) {
        toggle.classList.remove('playing');
    }
    const playIcon = document.getElementById('music-icon-play');
    const pauseIcon = document.getElementById('music-icon-pause');
    if (playIcon) playIcon.style.display = '';
    if (pauseIcon) pauseIcon.style.display = 'none';
}

export function toggleMusic() {
    if (isPlaying) {
        pauseMusic();
    } else {
        playMusic();
    }
}

export function initMusicPlayer() {
    const toggle = document.getElementById('music-toggle');
    audio = document.getElementById('bg-music');

    if (!toggle || !audio) return;

    // Restore state
    const savedState = localStorage.getItem('wedding-music-playing');
    if (savedState === 'true') {
        isPlaying = true;
        toggle.classList.add('playing');
        const playIcon = document.getElementById('music-icon-play');
        const pauseIcon = document.getElementById('music-icon-pause');
        if (playIcon) playIcon.style.display = 'none';
        if (pauseIcon) pauseIcon.style.display = '';
    }

    toggle.addEventListener('click', toggleMusic);
    toggle.addEventListener('keydown', (e) => {
        if (e.key === 'Enter' || e.key === ' ') {
            e.preventDefault();
            toggleMusic();
        }
    });
}