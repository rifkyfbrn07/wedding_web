{{-- ===== COVER PAGE ===== --}}
<div id="cover-page" role="dialog" aria-label="Buka Undangan">

    {{-- Background image - Couple illustration --}}
    <div class="cover-bg" style="background-image: url('{{ asset('images/decorations/1.PNG') }}');">
    </div>

    {{-- Gradient Putih Overlay --}}
    <div class="cover-overlay"></div>

    {{-- Content --}}
    <div class="cover-content">

        <p class="cover-eyebrow">— The Wedding Of —</p>

        <h1 class="cover-names">
            Ikko
            <span class="ampersand">&amp;</span>
            Fadhly
        </h1>

        <div class="cover-divider"></div>

        @if ($guest && $guest->name)
            <p class="cover-guest">Dear,</p>
            <p class="cover-guest-name">{{ $guest->name }}</p>
        @else
            <p class="cover-guest">Dear,</p>
            <p class="cover-guest-name">Tamu Undangan</p>
        @endif

        <button id="open-invitation-btn" class="cover-open-btn" aria-label="Buka Undangan" tabindex="0">
            <span>Buka Undangan</span>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" width="16" height="16">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12m0 0-7.5 7.5M21 12H3" />
            </svg>
        </button>

    </div>

</div>
