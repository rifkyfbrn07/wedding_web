{{-- ===== COUPLE SECTION ===== --}}
<section id="couple" aria-label="Pasangan">

    <div class="section-eyebrow gsap-fade-up">— Mempelai —</div>
    <h2 class="section-title gsap-fade-up">Dua Jiwa, Satu Cinta</h2>
    <div class="gold-line gsap-fade-up"></div>

    <div class="couple-grid">

        {{-- ── BRIDE ── --}}
        <div class="couple-card">

            <div class="couple-photo-frame">
                <img
                    src="{{ $invitation->bride_photo_url ?? asset('images/profile/ikko.PNG') }}"
                    alt="Foto {{ $invitation->bride_name }}"
                    loading="lazy"
                    width="280"
                    height="373"
                >
            </div>

            <h3 class="couple-name">{{ $invitation->bride_name }}</h3>

            <div class="couple-parents">
                <span class="parent-label">Putri dari</span>
                <span class="parent-names">
                    {{ $invitation->bride_father ?? 'Bapak Moh. Nur' }}<br>
                    &amp; {{ $invitation->bride_mother ?? 'Ibu Eko P.' }}
                </span>
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
                <img
                    src="{{ $invitation->groom_photo_url ?? asset('images/profile/fadly.PNG') }}"
                    alt="Foto {{ $invitation->groom_name }}"
                    loading="lazy"
                    width="280"
                    height="373"
                >
            </div>

            <h3 class="couple-name">{{ $invitation->groom_name }}</h3>

            <div class="couple-parents">
                <span class="parent-label">Putra dari</span>
                <span class="parent-names">
                    {{ $invitation->groom_father ?? 'Bapak M. Effendi' }}<br>
                    &amp; {{ $invitation->groom_mother ?? 'Ibu Elis S.' }}
                </span>
            </div>

        </div>

    </div>

    {{-- Floral decoration (SVG) --}}
    <div class="floral-decoration" aria-hidden="true" style="bottom:-2rem;right:-2rem;transform:rotate(180deg);">
        @include('components.partials.floral-svg')
    </div>

</section>
