<div class="music-fab" id="music-toggle" role="button" aria-label="Toggle musik" tabindex="0">
    
    <svg id="music-icon-play" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="24" height="24">
        <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.348a1.125 1.125 0 0 1 0 1.971l-11.54 6.347a1.125 1.125 0 0 1-1.667-.985V5.653Z"/>
    </svg>
    
    
    <svg id="music-icon-pause" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="24" height="24" style="display: none;">
        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25v13.5m-7.5-13.5v13.5"/>
    </svg>
</div>

<?php
    $invitation = \App\Models\Invitation::first();
    $musicUrl = null;
    $mime = 'audio/mp4';
    
    if ($invitation && $invitation->music_path) {
        $musicUrl = asset('storage/' . $invitation->music_path);
        $fileExt = strtolower(pathinfo($invitation->music_path, PATHINFO_EXTENSION));
        $mime = in_array($fileExt, ['mp3', 'mpeg']) ? 'audio/mpeg' : 'audio/mp4';
    } else {
        $musicUrl = asset('music/BandaNeira.m4a');
        $mime = 'audio/mp4';
    }

    // Local dev workaround for artisan serve's lack of HTTP range request support
    if (app()->environment('local')) {
        $ext = ($mime === 'audio/mpeg') ? 'mp3' : 'm4a';
        $musicUrl = url('/music/wedding-music.' . $ext);
    }
?>

<audio id="bg-music" preload="auto" loop playsinline>
    <source src="<?php echo e($musicUrl); ?>" type="<?php echo e($mime); ?>">
</audio><?php /**PATH C:\Users\lapto\wedding_web\resources\views/components/music-player.blade.php ENDPATH**/ ?>