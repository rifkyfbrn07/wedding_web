
<div id="cover-page" role="dialog" aria-label="Buka Undangan">

    
    <div class="cover-lang-switcher">
        <div class="lang-switcher" role="group" aria-label="Language switcher">
            <button class="lang-btn is-active" data-lang-switch="id" aria-pressed="true" type="button">
                <span class="lang-flag">🇮🇩</span> ID
            </button>
            <button class="lang-btn" data-lang-switch="en" aria-pressed="false" type="button">
                <span class="lang-flag">🇺🇸</span> EN
            </button>
        </div>
    </div>

    
    <div class="cover-bg" style="background-image: url('<?php echo e(asset('images/sidebar/couple.png')); ?>');"></div>

    
    <div class="cover-overlay"></div>

    
    <div class="cover-content">

        <p class="cover-eyebrow">Walimatul &rsquo;Urus</p>

        
        <div class="cover-names-block">
            <h1 class="cover-names">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($invitation->bride_name === 'Ikko Watinur Safitri'): ?>
                    <span class="name-line">Ikko</span>
                    <span class="name-line" style="white-space: nowrap;">Watinur Safitri</span>
                <?php else: ?>
                    <?php echo e($invitation->bride_name); ?>

                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
                <span class="ampersand">&</span>
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($invitation->groom_name === 'Achmad Fadhly'): ?>
                    <span class="name-line">Achmad</span>
                    <span class="name-line">Fadhly</span>
                <?php else: ?>
                    <?php echo e($invitation->groom_name); ?>

                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </h1>
        </div>

        
        <p class="cover-date">
            <span data-i18n-lang="id"><?php echo e(\Carbon\Carbon::parse($invitation->akad_start_at)->locale('id')->translatedFormat('l, d F Y')); ?></span>
            <span data-i18n-lang="en" class="i18n-hidden"><?php echo e(\Carbon\Carbon::parse($invitation->akad_start_at)->locale('en')->translatedFormat('l, d F Y')); ?></span>
        </p>

        
        <div class="cover-recipient">
            <span class="cover-recipient-label">
                <span data-i18n-lang="id">Kepada Yth. Bapak/Ibu/Saudara/i:</span>
                <span data-i18n-lang="en" class="i18n-hidden">To Mr./Mrs./Esteemed Guest:</span>
            </span>
            <strong><?php echo e($guest && $guest->name ? $guest->name : 'Tamu Undangan'); ?></strong>
        </div>

        <p class="cover-note">
            <span data-i18n-lang="id">Mohon maaf jika ada kesalahan penulisan nama dan gelar.</span>
            <span data-i18n-lang="en" class="i18n-hidden">Apologies for any errors in the writing of names and titles.</span>
        </p>

        
        <button id="open-invitation-btn" class="cover-btn" type="button">
            <span data-i18n-lang="id">Buka Undangan</span>
            <span data-i18n-lang="en" class="i18n-hidden">Open Invitation</span>
        </button>

    </div>

</div>
<?php /**PATH C:\Users\lapto\wedding_web\resources\views/components/cover.blade.php ENDPATH**/ ?>