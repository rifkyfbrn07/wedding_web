<section id="hero" aria-label="Hero">

    <div class="hero-bg" id="hero-bg" aria-hidden="true" style="background-image: url('{{ asset('images/sidebar/couple.jpg') }}');"></div>
    <div class="hero-overlay" aria-hidden="true"></div>

    <div class="hero-content">

        {{-- Eyebrow: "WALIMATUL 'URS" --}}
        <p class="hero-eyebrow" aria-hidden="true">
            <span data-i18n-lang="id">Walimatul 'Urus</span>
            <span data-i18n-lang="en" class="i18n-hidden">Walimatul 'Urus</span>
        </p>

        {{-- Bride Name (always two explicit lines) --}}
        <h2 class="hero-title" aria-label="{{ $invitation->bride_name }} dan {{ $invitation->groom_name }}">
            <span class="name-line">
                @if($invitation->bride_name === 'Ikko Watinur Safitri' || $invitation->bride_name === 'Ikko Watinur Safitri')
                    Ikko
                @else
                    {{ explode(' ', trim($invitation->bride_name))[0] ?? $invitation->bride_name }}
                @endif
            </span>
            <span class="name-line name-line-sub" style="white-space: nowrap;">
                @if($invitation->bride_name === 'Ikko Watinur Safitri' || $invitation->bride_name === 'Ikko Watinur Safitri')
                    Watinur Safitri
                @else
                    @php $parts = explode(' ', trim($invitation->bride_name)); @endphp
                    {{ count($parts) > 1 ? implode(' ', array_slice($parts, 1)) : '' }}
                @endif
            </span>
            <span class="amp-line">&</span>
            <span class="name-line">{{ $invitation->groom_name }}</span>
        </h2>

        {{-- Wedding Date --}}
        <div class="hero-date-tag" aria-hidden="true">
            <span data-i18n-lang="id">{{ \Carbon\Carbon::parse($invitation->akad_start_at)->locale('id')->translatedFormat('l, d F Y') }}</span>
            <span data-i18n-lang="en" class="i18n-hidden">{{ \Carbon\Carbon::parse($invitation->akad_start_at)->locale('en')->translatedFormat('l, d F Y') }}</span>
        </div>

        {{-- Recipient --}}
        <div class="hero-recipient">
            <span class="hero-recipient-label">
                <span data-i18n-lang="id">Kepada Yth. Bapak/Ibu/Saudara/i:</span>
                <span data-i18n-lang="en" class="i18n-hidden">To Mr./Mrs./Esteemed Guest:</span>
            </span>
            <strong>{{ $guest && $guest->name ? $guest->name : 'Tamu Undangan' }}</strong>
        </div>

    </div>

    <div class="hero-scroll-hint" aria-hidden="true">
        <div class="scroll-line"></div>
        <span>
            <span data-i18n-lang="id">Scroll</span>
            <span data-i18n-lang="en" class="i18n-hidden">Scroll</span>
        </span>
    </div>

</section>
