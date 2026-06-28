// ============================================================
// countdown.js — Live Countdown Timer
// ============================================================

export function initCountdown(targetDate) {
    const target = new Date(targetDate).getTime();

    const daysEl    = document.getElementById('cd-days');
    const hoursEl   = document.getElementById('cd-hours');
    const minsEl    = document.getElementById('cd-mins');
    const secsEl    = document.getElementById('cd-secs');

    if (!daysEl) return;

    function pad(n) { return String(n).padStart(2, '0'); }

    function tick() {
        const now  = Date.now();
        const diff = target - now;

        if (diff <= 0) {
            daysEl.textContent  = '00';
            hoursEl.textContent = '00';
            minsEl.textContent  = '00';
            secsEl.textContent  = '00';
            return;
        }

        const days  = Math.floor(diff / 86400000);
        const hours = Math.floor((diff % 86400000) / 3600000);
        const mins  = Math.floor((diff % 3600000)  / 60000);
        const secs  = Math.floor((diff % 60000)    / 1000);

        updateEl(daysEl,  pad(days));
        updateEl(hoursEl, pad(hours));
        updateEl(minsEl,  pad(mins));
        updateEl(secsEl,  pad(secs));
    }

    function updateEl(el, value) {
        if (el.textContent !== value) {
            el.style.transform = 'translateY(-4px)';
            el.style.opacity   = '0.5';
            setTimeout(() => {
                el.textContent   = value;
                el.style.transform = 'translateY(0)';
                el.style.opacity   = '1';
            }, 150);
        }
    }

    tick();
    setInterval(tick, 1000);
}
