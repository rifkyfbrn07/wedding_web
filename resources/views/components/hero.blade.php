<section id="hero" aria-label="Hero">

    <div class="hero-bg" id="hero-bg" aria-hidden="true"></div>
    <div class="hero-overlay" aria-hidden="true"></div>

    <div class="hero-content">

        <div class="hero-date-tag" aria-hidden="true">
            {{ $invitation->akad_start_at->translatedFormat('l, d F Y') }}
        </div>

        <h2 class="hero-title" aria-label="{{ $invitation->bride_name }} dan {{ $invitation->groom_name }}">
            <span class="name-line">{{ $invitation->bride_name }}</span>
            <span class="amp-line">&amp;</span>
            <span class="name-line">{{ $invitation->groom_name }}</span>
        </h2>

        <p class="hero-tagline">
            Menyatukan dua hati dalam doa dan cinta.
        </p>

    </div>

    <div class="hero-scroll-hint" aria-hidden="true">
        <div class="scroll-line"></div>
        <span>Scroll</span>
    </div>

</section>
