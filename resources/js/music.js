// ============================================================
// music.js — Music player FAB toggle (play/pause)
// ============================================================

let isPlaying = false;
let audio = null;

export function initMusicPlayer() {
    const toggle = document.getElementById('music-toggle');
    audio = document.getElementById('music-player');

    if (!toggle || !audio) return;

    // Set audio reference globally for cover.js startMusic
    window.bgMusic = audio;

    // Restore state
    const savedState = localStorage.getItem('wedding-music-playing');
    if (savedState === 'true') {
        isPlaying = true;
        toggle.classList.add('playing');
        document.getElementById('music-icon-play').style.display = 'none';
        document.getElementById('music-icon-pause').style.display = '';
    }

    toggle.addEventListener('click', toggleMusic);
    toggle.addEventListener('keydown', (e) => {
        if (e.key === 'Enter' || e.key === ' ') {
            e.preventDefault();
            toggleMusic();
        }
    });
}

function toggleMusic() {
    if (!audio) return;

    if (isPlaying) {
        audio.pause();
        isPlaying = false;
        localStorage.setItem('wedding-music-playing', 'false');
        document.getElementById('music-toggle').classList.remove('playing');
        document.getElementById('music-icon-play').style.display = '';
        document.getElementById('music-icon-pause').style.display = 'none';
    } else {
        audio.play().catch(() => {});
        isPlaying = true;
        localStorage.setItem('wedding-music-playing', 'true');
        document.getElementById('music-toggle').classList.add('playing');
        document.getElementById('music-icon-play').style.display = 'none';
        document.getElementById('music-icon-pause').style.display = '';
    }
}