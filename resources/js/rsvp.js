// ============================================================
// rsvp.js — AJAX RSVP form submission
// ============================================================

export function initRsvp() {
    const form = document.getElementById('rsvp-form');
    if (!form) return;

    form.addEventListener('submit', async (e) => {
        e.preventDefault();

        const btn = form.querySelector('[type=submit]');
        const btnText = btn?.querySelector('.btn-text');
        const btnSpinner = btn?.querySelector('.btn-spinner');

        // Show loading state
        if (btn) btn.disabled = true;
        if (btnText)    btnText.classList.add('hidden');
        if (btnSpinner) btnSpinner.classList.remove('hidden');

        const formData = new FormData(form);
        const data = Object.fromEntries(formData.entries());

        try {
            const res = await fetch(form.action, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]')?.content ?? '',
                    'Accept': 'application/json',
                },
                body: JSON.stringify(data),
            });

            const json = await res.json();

            if (res.ok && json.success) {
                showToast('Terima kasih! RSVP Anda telah kami terima. 🎉', 'success');
                form.reset();
            } else {
                const msg = json.message || 'Terjadi kesalahan. Silakan coba lagi.';
                showToast(msg, 'error');
            }
        } catch {
            showToast('Koneksi bermasalah. Silakan coba lagi.', 'error');
        } finally {
            if (btn) btn.disabled = false;
            if (btnText)    btnText.classList.remove('hidden');
            if (btnSpinner) btnSpinner.classList.add('hidden');
        }
    });
}

function showToast(message, type = 'success') {
    let toast = document.getElementById('toast');
    if (!toast) {
        toast = document.createElement('div');
        toast.id = 'toast';
        toast.className = 'toast';
        document.body.appendChild(toast);
    }

    toast.textContent = message;
    toast.className = `toast ${type}`;
    setTimeout(() => toast.classList.add('show'), 10);
    setTimeout(() => toast.classList.remove('show'), 4000);
}

window.showToast = showToast;
