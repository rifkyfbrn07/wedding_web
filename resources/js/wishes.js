// ============================================================
// wishes.js — AJAX Wishes form + live paginated list
// ============================================================

let wishesPage = 1;
let wishesLoading = false;
let wishesHasMore = true;

export function initWishes(invitationId) {
    const form = document.getElementById('wishes-form');
    const list = document.getElementById('wishes-list');
    const loadMoreBtn = document.getElementById('wishes-load-more');

    if (form) {
        form.addEventListener('submit', submitWish.bind(null, invitationId));
    }

    if (list) {
        loadWishes(invitationId, true);

        // Reload wishes list if an RSVP is successfully submitted
        window.addEventListener('rsvp-submitted', () => {
            wishesPage = 1;
            loadWishes(invitationId, true);
        });
    }

    if (loadMoreBtn) {
        loadMoreBtn.addEventListener('click', () => loadWishes(invitationId, false));
    }
}

async function submitWish(invitationId, e) {
    e.preventDefault();
    const form = e.currentTarget;
    const btn = form.querySelector('[type=submit]');
    const btnText = btn?.querySelector('.btn-text');
    const btnSpinner = btn?.querySelector('.btn-spinner');

    if (btn) btn.disabled = true;
    if (btnText)    btnText.classList.add('hidden');
    if (btnSpinner) btnSpinner.classList.remove('hidden');

    const data = {
        invitation_id: invitationId,
        name: form.querySelector('[name=name]')?.value,
        message: form.querySelector('[name=message]')?.value,
    };

    try {
        const res = await fetch('/wishes', {
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
            window.showToast?.('Ucapan Anda telah dikirim! ✨', 'success');
            form.reset();
            // Reload first page to show new wish
            wishesPage = 1;
            loadWishes(invitationId, true);
        } else {
            window.showToast?.(json.message || 'Gagal mengirim ucapan.', 'error');
        }
    } catch {
        window.showToast?.('Koneksi bermasalah. Silakan coba lagi.', 'error');
    } finally {
        if (btn) btn.disabled = false;
        if (btnText)    btnText.classList.remove('hidden');
        if (btnSpinner) btnSpinner.classList.add('hidden');
    }
}

async function loadWishes(invitationId, reset = false) {
    if (wishesLoading) return;
    wishesLoading = true;

    if (reset) {
        wishesPage = 1;
        wishesHasMore = true;
    }

    const list = document.getElementById('wishes-list');
    const loadMoreBtn = document.getElementById('wishes-load-more');
    const emptyState = document.getElementById('wishes-empty');

    try {
        const url = `/wishes?invitation_id=${invitationId}&page=${wishesPage}`;
        const res = await fetch(url, {
            headers: { 'Accept': 'application/json' },
        });

        const json = await res.json();

        if (reset && list) {
            list.innerHTML = '';
        }

        if (json.data && json.data.length > 0) {
            if (emptyState) emptyState.classList.add('hidden');

            json.data.forEach((wish) => {
                const card = createWishCard(wish);
                list?.appendChild(card);
            });

            wishesHasMore = json.next_page_url !== null;
            wishesPage++;
        } else if (reset) {
            if (emptyState) emptyState.classList.remove('hidden');
        }

        if (loadMoreBtn) {
            loadMoreBtn.classList.toggle('hidden', !wishesHasMore);
        }
    } catch {
        console.error('Failed to load wishes');
    } finally {
        wishesLoading = false;
    }
}

function createWishCard(wish) {
    const div = document.createElement('div');
    div.className = 'wish-card';
    div.style.opacity = '0';
    div.style.transform = 'translateY(16px)';

    const time = new Date(wish.created_at).toLocaleDateString('id-ID', {
        day: 'numeric', month: 'long', year: 'numeric',
    });

    div.innerHTML = `
        <div class="wish-name">${escapeHtml(wish.name)}</div>
        <div class="wish-message">${escapeHtml(wish.message)}</div>
        <div class="wish-time">${time}</div>
    `;

    setTimeout(() => {
        div.style.transition = 'all 0.5s ease';
        div.style.opacity = '1';
        div.style.transform = 'translateY(0)';
    }, 50);

    return div;
}

function escapeHtml(str) {
    const div = document.createElement('div');
    div.textContent = str;
    return div.innerHTML;
}
