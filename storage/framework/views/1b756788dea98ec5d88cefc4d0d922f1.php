<section id="hero" aria-label="Hero">

    <div class="hero-bg" id="hero-bg" aria-hidden="true" style="background-image: url('<?php echo e(asset('images/sidebar/couple.jpg')); ?>');"></div>
    <div class="hero-overlay" aria-hidden="true"></div>

    <div class="hero-content">

        
        <p class="hero-eyebrow" aria-hidden="true">
            <span data-i18n-lang="id">Walimatul 'Urus</span>
            <span data-i18n-lang="en" class="i18n-hidden">Walimatul 'Urus</span>
        </p>

        
        <h2 class="hero-title" aria-label="<?php echo e($invitation->bride_name); ?> dan <?php echo e($invitation->groom_name); ?>">
            <span class="name-line">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($invitation->bride_name === 'Ikko Watinur Safitri' || $invitation->bride_name === 'Ikko Watinur Safitri'): ?>
                    Ikko
                <?php else: ?>
                    <?php echo e(explode(' ', trim($invitation->bride_name))[0] ?? $invitation->bride_name); ?>

                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </span>
            <span class="name-line name-line-sub" style="white-space: nowrap;">
                <?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($invitation->bride_name === 'Ikko Watinur Safitri' || $invitation->bride_name === 'Ikko Watinur Safitri'): ?>
                    Watinur Safitri
                <?php else: ?>
                    <?php $parts = explode(' ', trim($invitation->bride_name)); ?>
                    <?php echo e(count($parts) > 1 ? implode(' ', array_slice($parts, 1)) : ''); ?>

                <?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?>
            </span>
            <span class="amp-line">&</span>
            <span class="name-line"><?php echo e($invitation->groom_name); ?></span>
        </h2>

        
        <div class="hero-date-tag" aria-hidden="true">
            <span data-i18n-lang="id"><?php echo e(\Carbon\Carbon::parse($invitation->akad_start_at)->locale('id')->translatedFormat('l, d F Y')); ?></span>
            <span data-i18n-lang="en" class="i18n-hidden"><?php echo e(\Carbon\Carbon::parse($invitation->akad_start_at)->locale('en')->translatedFormat('l, d F Y')); ?></span>
        </div>

        
        <div class="hero-recipient">
            <span class="hero-recipient-label">
                <span data-i18n-lang="id">Kepada Yth. Bapak/Ibu/Saudara/i:</span>
                <span data-i18n-lang="en" class="i18n-hidden">To Mr./Mrs./Esteemed Guest:</span>
            </span>
            <strong><?php echo e($guest && $guest->name ? $guest->name : 'Tamu Undangan'); ?></strong>
        </div>

    </div>

    <div class="hero-scroll-hint" aria-hidden="true">
        <div class="scroll-line"></div>
        <span>
            <span data-i18n-lang="id">Scroll</span>
            <span data-i18n-lang="en" class="i18n-hidden">Scroll</span>
        </span>
    </div>

</section>
<?php /**PATH C:\Users\lapto\wedding_web\resources\views/components/hero.blade.php ENDPATH**/ ?>