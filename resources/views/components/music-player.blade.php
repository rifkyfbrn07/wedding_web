@php
use Illuminate\Support\Facades\File;
@endphp

@php
    // Cek apakah ada file musik
    $musicPath = public_path('music/Banda.mp3');
    $hasMusic = File::exists($musicPath);
@endphp

@if($hasMusic)
    <div class="music-fab" id="music-toggle" role="button" aria-label="Toggle musik" tabindex="0">
        {{-- Icon Play --}}
        <svg id="music-icon-play" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="24" height="24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.348a1.125 1.125 0 0 1 0 1.971l-11.54 6.347a1.125 1.125 0 0 1-1.667-.985V5.653Z"/>
        </svg>
        
        {{-- Icon Pause (hidden by default) --}}
        <svg id="music-icon-pause" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="24" height="24" style="display: none;">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25v13.5m-7.5-13.5v13.5"/>
        </svg>
    </div>

    <audio id="music-player" loop preload="auto">
        <source src="{{ asset('music/Banda.mp3') }}" type="audio/mpeg">
    </audio>
@endif