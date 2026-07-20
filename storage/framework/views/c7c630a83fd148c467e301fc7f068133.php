<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    
    <title><?php echo e($seo['title'] ?? 'The Wedding of Ikko & Fadhly'); ?></title>
    <meta name="description" content="<?php echo e($seo['description'] ?? 'Undangan pernikahan Ikko & Fadhly — 09 Agustus 2026 di Villa Srimanganti, Jakarta Timur.'); ?>">

    
    <meta property="og:type"        content="website">
    <meta property="og:title"       content="<?php echo e($seo['title'] ?? 'The Wedding of Ikko & Fadhly'); ?>">
    <meta property="og:description" content="<?php echo e($seo['description'] ?? 'Undangan pernikahan Ikko & Fadhly'); ?>">
    <meta property="og:image"       content="<?php echo e($invitation->cover_image_url ?? asset('images/decorations/1.PNG')); ?>">
    <meta property="og:url"         content="<?php echo e(url()->current()); ?>">
    <meta name="twitter:card"       content="summary_large_image">

    
    <script type="application/ld+json">
    
    {
        "@context": "https://schema.org",
        "@type": "Event",
    
        "name": "The Wedding of <?php echo e($invitation->bride_name); ?> & <?php echo e($invitation->groom_name); ?>",
        "startDate": "<?php echo e($invitation->akad_start_at->toIso8601String()); ?>",
        "endDate": "<?php echo e($invitation->reception_end_at->toIso8601String()); ?>",
        "location": {
            "@type": "Place",
            "name": "<?php echo e($invitation->venue_name); ?>",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "<?php echo e(addslashes($invitation->venue_address)); ?>"
            }
        }
    }
    </script>

    
    <link rel="icon" type="image/svg+xml" href="/favicon.svg">

    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/main.js']); ?>
</head>
<body class="cover-locked" x-data>

    
    <script>
        window.WEDDING = {
            invitationId: <?php echo e($invitation->id); ?>,
            akadDate: '<?php echo e($invitation->akad_start_at->toIso8601String()); ?>',
            hasMusicPath: <?php echo e($invitation->music_path ? 'true' : 'false'); ?>

        };
    </script>

    
    <?php echo $__env->make('components.cover', ['invitation' => $invitation, 'guest' => $guest ?? null], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    
    <?php echo $__env->make('components.music-player', ['invitation' => $invitation], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    
    <?php echo $__env->make('components.tutorial-modal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    
    <div class="main-layout" id="main-layout">
        
        <div id="main-fireflies" class="main-fireflies-container" aria-hidden="true"></div>

        
        <main class="main-content" id="main-content">

            <?php echo $__env->make('components.hero',      ['invitation' => $invitation, 'guest' => $guest ?? null], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php echo $__env->make('components.couple',    ['invitation' => $invitation], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php echo $__env->make('components.countdown', ['invitation' => $invitation], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php echo $__env->make('components.love-story', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php echo $__env->make('components.event',     ['invitation' => $invitation], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php echo $__env->make('components.blessing', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php echo $__env->make('components.rsvp',      ['invitation' => $invitation, 'guest' => $guest ?? null], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

            <footer class="site-footer">
                <div class="footer-names">
                    <?php echo e($invitation->bride_name); ?>

                    <span class="amp"> &amp; </span>
                    <?php echo e($invitation->groom_name); ?>

                </div>
                <div class="footer-date">09 · 08 · 2026</div>
                <div class="footer-copy">Made with love · <?php echo e(date('Y')); ?></div>
            </footer>

        </main>

        
        <?php echo $__env->make('components.sidebar', ['invitation' => $invitation], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    </div>

    
    <?php echo $__env->make('components.mobile-nav', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

    
    <div class="mobile-lang-switcher">
        <div class="lang-switcher" role="group" aria-label="Language switcher">
            <button class="lang-btn is-active" data-lang-switch="id" aria-pressed="true" type="button">
                <span class="lang-flag">🇮🇩</span> ID
            </button>
            <button class="lang-btn" data-lang-switch="en" aria-pressed="false" type="button">
                <span class="lang-flag">🇺🇸</span> EN
            </button>
        </div>
    </div>

    
    <div id="toast" class="toast" role="alert" aria-live="polite"></div>

</body>
</html>

<?php /**PATH C:\Users\lapto\wedding_web\resources\views/layouts/invitation.blade.php ENDPATH**/ ?>