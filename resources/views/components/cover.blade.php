{{-- ===== COVER PAGE ===== --}}
<div id="cover-page" role="dialog" aria-label="Buka Undangan">

    {{-- Language Switcher on Cover --}}
    <div class="cover-lang-switcher">
        <div class="lang-switcher" role="group" aria-label="Language switcher">
            <button class="lang-btn is-active" data-lang-switch="id" aria-pressed="true" type="button">
                <span class="lang-flag">🇮🇩</span> ID
            </button>
            <button class="lang-btn" data-lang-switch="en" aria-pressed="false" type="button">
                <span class="lang-flag">🇺🇸</span> EN
            </button>
        </div>
    </div>

    {{-- Background image - Couple illustration --}}
    <div class="cover-bg" style="background-image: url('{{ asset('images/sidebar/couple.png') }}');"></div>

    {{-- Gradient Overlay --}}
    <div class="cover-overlay"></div>

    {{-- Content --}}
    <div class="cover-content">

        <p class="cover-eyebrow">Walimatul &rsquo;Urus</p>

        {{-- Names --}}
        <div class="cover-names-block">
            <h1 class="cover-names">
                @if($invitation->bride_name === 'Ikko Watinur Safitri')
                    <span class="name-line">Ikko</span>
                    <span class="name-line" style="white-space: nowrap;">Watinur Safitri</span>
                @else
                    {{ $invitation->bride_name }}
                @endif
                <span class="ampersand">&</span>
                @if($invitation->groom_name === 'Achmad Fadhly')
                    <span class="name-line">Achmad</span>
                    <span class="name-line">Fadhly</span>
                @else
                    {{ $invitation->groom_name }}
                @endif
            </h1>
        </div>

        {{-- Date --}}
        <p class="cover-date">
            {{ $invitation->akad_start_at->translatedFormat('l, d F Y') }}
        </p>

        {{-- Recipient --}}
        <div class="cover-recipient">
            <span class="cover-recipient-label">
                <span data-i18n-lang="id">Kepada Yth. Bapak/Ibu/Saudara/i:</span>
                <span data-i18n-lang="en" class="i18n-hidden">To Mr./Mrs./Esteemed Guest:</span>
            </span>
            <strong>{{ $guest && $guest->name ? $guest->name : 'Tamu Undangan' }}</strong>
        </div>

        <p class="cover-note">
            <span data-i18n-lang="id">Mohon maaf jika ada kesalahan penulisan nama dan gelar.</span>
            <span data-i18n-lang="en" class="i18n-hidden">Apologies for any errors in the writing of names and titles.</span>
        </p>

        {{-- Open Invitation Button --}}
        <button id="open-invitation-btn" class="cover-btn" type="button">
            <span data-i18n-lang="id">Buka Undangan</span>
            <span data-i18n-lang="en" class="i18n-hidden">Open Invitation</span>
        </button>

    </div>

</div>
