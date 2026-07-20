<?php
use Illuminate\Support\Facades\File;
?>

<?php
    $musicUrl = null;
    if ($invitation && $invitation->music_path) {
        $musicUrl = asset('storage/' . $invitation->music_path);
    } else {
        $fallbackPath = public_path('music/Banda.mp3');
        if (File::exists($fallbackPath)) {
            $musicUrl = asset('music/Banda.mp3');
        }
    }
    $hasMusic = !empty($musicUrl);
?>

<?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if BLOCK]><![endif]--><?php endif; ?><?php if($hasMusic): ?>
    <div class="music-fab" id="music-toggle" role="button" aria-label="Toggle musik" tabindex="0">
        
        <svg id="music-icon-play" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="24" height="24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.348a1.125 1.125 0 0 1 0 1.971l-11.54 6.347a1.125 1.125 0 0 1-1.667-.985V5.653Z"/>
        </svg>
        
        
        <svg id="music-icon-pause" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="24" height="24" style="display: none;">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25v13.5m-7.5-13.5v13.5"/>
        </svg>
    </div>

    <audio id="music-player" loop preload="auto">
        <source src="<?php echo e($musicUrl); ?>" type="audio/mpeg">
    </audio>
<?php endif; ?><?php if(\Livewire\Mechanisms\ExtendBlade\ExtendBlade::isRenderingLivewireComponent()): ?><!--[if ENDBLOCK]><![endif]--><?php endif; ?><?php /**PATH C:\Users\lapto\wedding_web\resources\views/components/music-player.blade.php ENDPATH**/ ?>