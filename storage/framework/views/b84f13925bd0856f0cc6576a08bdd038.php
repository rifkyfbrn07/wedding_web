
<section id="couple" aria-label="Pasangan">

    <div class="section-eyebrow gsap-fade-up">
        <span data-i18n-lang="id">— Mempelai —</span>
        <span data-i18n-lang="en" class="i18n-hidden">— The Couple —</span>
    </div>
    <h2 class="section-title gsap-fade-up">
        <span data-i18n-lang="id">Dua Jiwa, Satu Cinta</span>
        <span data-i18n-lang="en" class="i18n-hidden">Two Souls, One Love</span>
    </h2>
    <div class="gold-line gsap-fade-up"></div>

    <div class="couple-grid">

        
        <div class="couple-card">

            <div class="couple-photo-frame">
                <img
                    src="<?php echo e($invitation->bride_photo_url ?? asset('images/profile/ikko.PNG')); ?>"
                    alt="Foto <?php echo e($invitation->bride_name); ?>"
                    loading="lazy"
                    width="280"
                    height="373"
                >
            </div>

            <h3 class="couple-name"><?php echo e($invitation->bride_name); ?></h3>

            <div class="couple-parents">
                <span class="parent-label">
                    <span data-i18n-lang="id">Putri dari</span>
                    <span data-i18n-lang="en" class="i18n-hidden">Daughter of</span>
                </span>
                <span class="parent-names">
                    <span data-i18n-lang="id"><?php echo e($invitation->bride_father ?? 'Bapak Moh. Nur'); ?></span>
                    <span data-i18n-lang="en" class="i18n-hidden"><?php echo e($invitation->bride_father ? str_replace(['Bapak ', 'Bpk. '], 'Mr. ', $invitation->bride_father) : 'Mr. Moh. Nur'); ?></span><br>
                    & <span data-i18n-lang="id"><?php echo e($invitation->bride_mother ?? 'Ibu Eko P.'); ?></span>
                    <span data-i18n-lang="en" class="i18n-hidden"><?php echo e($invitation->bride_mother ? str_replace(['Ibu ', 'Ibu. ', 'Ibu'], 'Mrs. ', $invitation->bride_mother) : 'Mrs. Eko P.'); ?></span>
                </span>
            </div>

        </div>

        
        <div class="couple-divider" aria-hidden="true">
            <div class="divider-line"></div>
            <span class="amp-large">&</span>
            <div class="divider-line"></div>
        </div>

        
        <div class="couple-card">

            <div class="couple-photo-frame">
                <img
                    src="<?php echo e($invitation->groom_photo_url ?? asset('images/profile/fadly.PNG')); ?>"
                    alt="Foto <?php echo e($invitation->groom_name); ?>"
                    loading="lazy"
                    width="280"
                    height="373"
                >
            </div>

            <h3 class="couple-name"><?php echo e($invitation->groom_name); ?></h3>

            <div class="couple-parents">
                <span class="parent-label">
                    <span data-i18n-lang="id">Putra dari</span>
                    <span data-i18n-lang="en" class="i18n-hidden">Son of</span>
                </span>
                <span class="parent-names">
                    <span data-i18n-lang="id"><?php echo e($invitation->groom_father ?? 'Bapak M. Effendi'); ?></span>
                    <span data-i18n-lang="en" class="i18n-hidden"><?php echo e($invitation->groom_father ? str_replace(['Bapak ', 'Bpk. '], 'Mr. ', $invitation->groom_father) : 'Mr. M. Effendi'); ?></span><br>
                    & <span data-i18n-lang="id"><?php echo e($invitation->groom_mother ?? 'Ibu Elis S.'); ?></span>
                    <span data-i18n-lang="en" class="i18n-hidden"><?php echo e($invitation->groom_mother ? str_replace(['Ibu ', 'Ibu. ', 'Ibu'], 'Mrs. ', $invitation->groom_mother) : 'Mrs. Elis S.'); ?></span>
                </span>
            </div>

        </div>

    </div>

    
    <div class="floral-decoration" aria-hidden="true" style="bottom:-2rem;right:-2rem;transform:rotate(180deg);">
        <?php echo $__env->make('components.partials.floral-svg', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </div>

</section><?php /**PATH C:\Users\pcbaz\Documents\rifky\wedding_web\resources\views/components/couple.blade.php ENDPATH**/ ?>