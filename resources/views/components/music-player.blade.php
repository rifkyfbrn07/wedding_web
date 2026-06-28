{{-- ===== FLOATING MUSIC PLAYER ===== --}}
@if($invitation->music_path)
<audio
    id="bg-music"
    src="{{ $invitation->music_url }}"
    preload="none"
    loop
    aria-label="Background music"
></audio>
@endif

<button
    id="music-fab"
    class="music-fab"
    aria-label="Putar/Jeda musik"
    title="Musik"
    type="button"
>
    {{-- Play icon --}}
    <svg id="music-play-btn" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" d="M9 9l10.5-3m0 6.553v3.75a2.25 2.25 0 0 1-1.632 2.163l-1.32.377a1.803 1.803 0 1 1-.99-3.467l2.31-.66a2.25 2.25 0 0 0 1.632-2.163Zm0 0V2.25L9 5.25v10.303m0 0v3.75a2.25 2.25 0 0 1-1.632 2.163l-1.32.377a1.803 1.803 0 0 1-.99-3.467l2.31-.66A2.25 2.25 0 0 0 9 15.553Z"/>
    </svg>

    {{-- Pause icon (hidden by default) --}}
    <svg id="music-pause-btn" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="hidden" style="position:absolute;">
        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25v13.5m-7.5-13.5v13.5"/>
    </svg>
</button>
