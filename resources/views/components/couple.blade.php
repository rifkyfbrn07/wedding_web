{{-- ===== COUPLE SECTION ===== --}}
<section id="couple" aria-label="Pasangan">

    <div class="section-eyebrow gsap-fade-up">— Mempelai —</div>
    <h2 class="section-title gsap-fade-up">Dua Jiwa, Satu Cinta</h2>
    <div class="gold-line gsap-fade-up"></div>

    <div class="couple-grid">

        {{-- ── BRIDE ── --}}
        <div class="couple-card">

            <div class="couple-photo-frame">
                @if($invitation->bride_photo_url)
                    <img
                        src="{{ $invitation->bride_photo_url }}"
                        alt="Foto {{ $invitation->bride_name }}"
                        loading="lazy"
                        width="280"
                        height="373"
                    >
                @else
                    <div style="width:100%;height:100%;background:var(--color-bg-card);display:flex;align-items:center;justify-content:center;">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="rgba(199,162,106,0.3)" width="64" height="64">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"/>
                        </svg>
                    </div>
                @endif
            </div>

            <h3 class="couple-name">{{ $invitation->bride_name }}</h3>

            <div class="couple-parents">
                <span class="parent-label">Putri dari</span>
                {{ $invitation->bride_father ?? 'Bapak Moh. Nur' }}<br>
                &amp; {{ $invitation->bride_mother ?? 'Ibu Eko P.' }}
            </div>

        </div>

        {{-- ── DIVIDER ── --}}
        <div class="couple-divider" aria-hidden="true">
            <div class="divider-line"></div>
            <span class="amp-large">&amp;</span>
            <div class="divider-line"></div>
        </div>

        {{-- ── GROOM ── --}}
        <div class="couple-card">

            <div class="couple-photo-frame">
                @if($invitation->groom_photo_url)
                    <img
                        src="{{ $invitation->groom_photo_url }}"
                        alt="Foto {{ $invitation->groom_name }}"
                        loading="lazy"
                        width="280"
                        height="373"
                    >
                @else
                    <div style="width:100%;height:100%;background:var(--color-bg-card);display:flex;align-items:center;justify-content:center;">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="rgba(199,162,106,0.3)" width="64" height="64">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z"/>
                        </svg>
                    </div>
                @endif
            </div>

            <h3 class="couple-name">{{ $invitation->groom_name }}</h3>

            <div class="couple-parents">
                <span class="parent-label">Putra dari</span>
                {{ $invitation->groom_father ?? 'Bapak M. Effendi' }}<br>
                &amp; {{ $invitation->groom_mother ?? 'Ibu Elis S.' }}
            </div>

        </div>

    </div>

    {{-- Floral decoration (SVG) --}}
    <div class="floral-decoration" aria-hidden="true" style="bottom:-2rem;right:-2rem;transform:rotate(180deg);">
        @include('components.partials.floral-svg')
    </div>

</section>
