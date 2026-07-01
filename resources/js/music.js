// music.js — Music Player dengan Auto-play
export function initMusicPlayer() {
    const musicToggle = document.getElementById('music-toggle');
    const musicPlayer = document.getElementById('music-player');
    const iconPlay = document.getElementById('music-icon-play');
    const iconPause = document.getElementById('music-icon-pause');
    
    if (!musicToggle || !musicPlayer) return;
    
    let isPlaying = false;
    
    // Function untuk update icon
    function updateMusicIcon(playing) {
        isPlaying = playing;
        if (playing) {
            if (iconPlay) iconPlay.style.display = 'none';
            if (iconPause) iconPause.style.display = 'block';
            musicToggle.classList.add('playing');
        } else {
            if (iconPlay) iconPlay.style.display = 'block';
            if (iconPause) iconPause.style.display = 'none';
            musicToggle.classList.remove('playing');
        }
    }
    
    // Function untuk toggle play/pause
    function toggleMusic() {
        if (musicPlayer.paused) {
            musicPlayer.play()
                .then(() => {
                    updateMusicIcon(true);
                })
                .catch((error) => {
                    console.log('Play failed:', error);
                });
        } else {
            musicPlayer.pause();
            updateMusicIcon(false);
        }
    }
    
    // Event listener untuk button
    musicToggle.addEventListener('click', toggleMusic);
    musicToggle.addEventListener('keypress', function(e) {
        if (e.key === 'Enter' || e.key === ' ') {
            toggleMusic();
        }
    });
    
    // Update icon saat audio ended
    musicPlayer.addEventListener('ended', function() {
        updateMusicIcon(false);
    });
    
    // AUTO-PLAY saat halaman dibuka
    // Coba auto-play, kalau gagal (browser block), tunggu user interaction
    musicPlayer.volume = 0.7; // Set volume 70%
    
    musicPlayer.play()
        .then(() => {
            console.log('Music auto-played successfully');
            updateMusicIcon(true);
        })
        .catch((error) => {
            console.log('Autoplay blocked by browser. Waiting for user interaction.');
            // Browser block autoplay, user harus klik manual
            updateMusicIcon(false);
        });
    
    // Alternative: Auto-play setelah cover dibuka
    window.addEventListener('cover-opened', () => {
        setTimeout(() => {
            if (musicPlayer.paused) {
                musicPlayer.play()
                    .then(() => {
                        console.log('Music played after cover opened');
                        updateMusicIcon(true);
                    })
                    .catch((error) => {
                        console.log('Still blocked after cover opened');
                    });
            }
        }, 500); // Delay 500ms setelah cover opened
    });
}