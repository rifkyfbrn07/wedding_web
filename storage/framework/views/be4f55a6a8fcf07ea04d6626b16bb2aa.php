
<div id="tutorial-modal" class="tutorial-modal-overlay" style="display:none;" role="dialog" aria-label="Tutorial">
    <div class="tutorial-modal-content">
        <button class="tutorial-modal-close" id="tutorial-modal-close" aria-label="Tutup tutorial">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="20" height="20">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"/>
            </svg>
        </button>

        <h3 class="tutorial-modal-title">Cara Membuat Link Undangan</h3>

        <div class="tutorial-code-block">
            <p class="tutorial-example-label">Contoh:</p>
            <code class="tutorial-code">https://domainanda.com/?to=Rifky%20Febrian</code>
            <p class="tutorial-or">atau</p>
            <code class="tutorial-code">https://domainanda.com/invitation?to=Rifky%20Febrian</code>
        </div>

        <p class="tutorial-note">Nama tamu akan otomatis muncul pada halaman pembuka.</p>

        <hr class="tutorial-divider">

        <h3 class="tutorial-modal-title">How to Create Guest Invitation Link</h3>

        <div class="tutorial-code-block">
            <p class="tutorial-example-label">Example:</p>
            <code class="tutorial-code">https://yourdomain.com/?to=John%20Doe</code>
        </div>

        <p class="tutorial-note">The guest's name will automatically appear on the invitation.</p>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const tutorialModal = document.getElementById('tutorial-modal');
    const tutorialClose = document.getElementById('tutorial-modal-close');

    if (tutorialClose && tutorialModal) {
        tutorialClose.addEventListener('click', function() {
            tutorialModal.style.display = 'none';
            document.body.classList.remove('overflow-hidden');
        });

        tutorialModal.addEventListener('click', function(e) {
            if (e.target === tutorialModal) {
                tutorialModal.style.display = 'none';
                document.body.classList.remove('overflow-hidden');
            }
        });
    }
});
</script><?php /**PATH C:\Users\pcbaz\Documents\rifky\wedding_web\resources\views/components/tutorial-modal.blade.php ENDPATH**/ ?>