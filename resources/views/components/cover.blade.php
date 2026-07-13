{{-- ===== COVER PAGE ===== --}}
<div id="cover-page" role="dialog" aria-label="Buka Undangan">

    {{-- Background image - Couple illustration --}}
    <div class="cover-bg" style="background-image: url('{{ asset('images/sidebar/couple.png') }}');">
    </div>

    {{-- Gradient Putih Overlay --}}
    <div class="cover-overlay"></div>

    {{-- Decorative Ornaments from "dekorasi" --}}
    <div class="cover-ornaments" aria-hidden="true">

        
        
    </div>

    {{-- Content --}}
    <div class="cover-content">

        <p class="cover-eyebrow">Walimatusl &rsquo;Urs</p>

        <h1 class="cover-names">
            {{ $invitation->bride_name }}
            <span class="ampersand">&amp;</span>
            {{ $invitation->groom_name }}
        </h1>

        <p class="cover-date">
            {{ $invitation->akad_start_at->translatedFormat('l, d F Y') }}
        </p>

        <div class="cover-recipient">
            <span>Kepada Yth. Bapak/Ibu/Saudara/i:</span>
            <strong>{{ $guest && $guest->name ? $guest->name : 'Tamu Undangan' }}</strong>
        </div>

        <p class="cover-note">Mohon maaf jika ada kesalahan penulisan nama dan gelar.</p>

        <button id="open-invitation-btn" class="cover-open-btn" aria-label="Buka Undangan" tabindex="0">
            <span class="cover-open-btn-inner">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 8.5h18"></path>
                    <path d="M21 8.5v7.5a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V8.5"></path>
                    <path d="M21 8.5L12 15 3 8.5"></path>
                </svg>
                <span>Buka Undangan</span>
            </span>
        </button>

    </div>

</div>
