// ============================================================
// music.js — Floating music player with localStorage persistence
// ============================================================

export function initMusicPlayer() {
    const audio   = document.getElementById('bg-music');
    const playBtn = document.getElementById('music-play-btn');
    const pauseBtn = document.getElementById('music-pause-btn');
    const fab     = document.getElementById('music-fab');

    if (!audio || !fab) return;

    // Restore saved state (default: playing after cover opens)
    let isPlaying = localStorage.getItem('wedding-music-playing') !== 'false';

    function setPlayingState(playing) {
        isPlaying = playing;
        localStorage.setItem('wedding-music-playing', playing ? 'true' : 'false');

        if (playing) {
            fab.classList.add('playing');
            if (playBtn)  playBtn.classList.add('hidden');
            if (pauseBtn) pauseBtn.classList.remove('hidden');
        } else {
            fab.classList.remove('playing');
            if (playBtn)  playBtn.classList.remove('hidden');
            if (pauseBtn) pauseBtn.classList.add('hidden');
        }
    }

    fab.addEventListener('click', () => {
        if (audio.paused) {
            audio.play().catch(() => {});
            setPlayingState(true);
        } else {
            audio.pause();
            setPlayingState(false);
        }
    });

    // Keep UI in sync with audio element state
    audio.addEventListener('play',  () => setPlayingState(true));
    audio.addEventListener('pause', () => setPlayingState(false));
    audio.addEventListener('ended', () => {
        audio.currentTime = 0;
        audio.play().catch(() => {});
    });

    // Set loop
    audio.loop = true;

    // Init UI
    setPlayingState(isPlaying);
}
