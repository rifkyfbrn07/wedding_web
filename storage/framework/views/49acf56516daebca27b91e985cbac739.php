
<section id="blessing" class="blessing-section" aria-label="Doa Pernikahan">
    
    <!-- Corner Ornaments -->
    <div class="corner-ornament top-left" aria-hidden="true">
        <?php echo $__env->make('components.partials.corner-svg', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </div>
    <div class="corner-ornament top-right" aria-hidden="true">
        <?php echo $__env->make('components.partials.corner-svg', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </div>

    <!-- Center Chandelier Icon -->
    <div class="chandelier-wrapper gsap-fade-up">
        <?php echo $__env->make('components.partials.chandelier-svg', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </div>

    <!-- Blessing Content -->
    <div class="blessing-content">
        <p class="blessing-transliteration gsap-fade-up">
            Baarakallahu laka wa baaraka 'alaika wa jama'a bainakuma fi khayrin
        </p>
        <p class="blessing-translation gsap-fade-up">
            <span data-i18n-lang="id">"Semoga Allah memberikan keberkahan padamu dan mengumpulkan kalian berdua dalam kebaikan"</span>
            <span data-i18n-lang="en" class="i18n-hidden">"May Allah bless you and bring you together in goodness"</span>
        </p>
        <p class="blessing-reference gsap-fade-up">
            <span data-i18n-lang="id">(HR. Abu Daud no. 2130, dishahihkan Al Albani dalam Shahih Abu Daud)</span>
            <span data-i18n-lang="en" class="i18n-hidden">(HR. Abu Dawud no. 2130, authenticated by Al Albani in Sahih Abu Dawud)</span>
        </p>
    </div>

</section><?php /**PATH C:\Users\pcbaz\Documents\rifky\wedding_web\resources\views/components/blessing.blade.php ENDPATH**/ ?>