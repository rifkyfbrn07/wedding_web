
<section id="countdown" aria-label="Hitung Mundur">

    <div class="section-eyebrow gsap-fade-up" style="text-align:center;">
        <span data-i18n-lang="id">— Menuju Hari Bahagia —</span>
        <span data-i18n-lang="en" class="i18n-hidden">— Counting Down —</span>
    </div>
    <h2 class="section-title gsap-fade-up" style="text-align:center;">
        <span data-i18n-lang="id">Hari Yang Dinantikan</span>
        <span data-i18n-lang="en" class="i18n-hidden">The Long-Awaited Day</span>
    </h2>
    <div class="gold-line gsap-fade-up" style="margin:1.5rem auto;"></div>

    <div class="countdown-grid" role="timer" aria-label="Countdown timer">

        <div class="countdown-unit">
            <span class="countdown-number" id="cd-days">00</span>
            <span class="countdown-label">
                <span data-i18n-lang="id">Hari</span>
                <span data-i18n-lang="en" class="i18n-hidden">Days</span>
            </span>
        </div>

        <span class="countdown-sep" aria-hidden="true">:</span>

        <div class="countdown-unit">
            <span class="countdown-number" id="cd-hours">00</span>
            <span class="countdown-label">
                <span data-i18n-lang="id">Jam</span>
                <span data-i18n-lang="en" class="i18n-hidden">Hours</span>
            </span>
        </div>

        <span class="countdown-sep" aria-hidden="true">:</span>

        <div class="countdown-unit">
            <span class="countdown-number" id="cd-mins">00</span>
            <span class="countdown-label">
                <span data-i18n-lang="id">Menit</span>
                <span data-i18n-lang="en" class="i18n-hidden">Mins</span>
            </span>
        </div>

        <span class="countdown-sep" aria-hidden="true">:</span>

        <div class="countdown-unit">
            <span class="countdown-number" id="cd-secs">00</span>
            <span class="countdown-label">
                <span data-i18n-lang="id">Detik</span>
                <span data-i18n-lang="en" class="i18n-hidden">Secs</span>
            </span>
        </div>

    </div>

    <p class="section-subtitle gsap-fade-up" style="text-align:center;margin-top:2rem;">
        <span data-i18n-lang="id"><?php echo e(\Carbon\Carbon::parse($invitation->akad_start_at)->locale('id')->translatedFormat('l, d F Y')); ?></span>
        <span data-i18n-lang="en" class="i18n-hidden"><?php echo e(\Carbon\Carbon::parse($invitation->akad_start_at)->locale('en')->translatedFormat('l, d F Y')); ?></span>
    </p>

</section><?php /**PATH C:\Users\lapto\wedding_web\resources\views/components/countdown.blade.php ENDPATH**/ ?>