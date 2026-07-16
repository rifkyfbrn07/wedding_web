{{-- ===== EVENT SECTION ===== --}}
<section id="event" aria-label="Rangkaian Acara">

    <div class="section-eyebrow gsap-fade-up">
        <span data-i18n-lang="id">— Rangkaian Acara —</span>
        <span data-i18n-lang="en" class="i18n-hidden">— Event Schedule —</span>
    </div>
    <h2 class="section-title gsap-fade-up">
        <span data-i18n-lang="id">Hari Pernikahan</span>
        <span data-i18n-lang="en" class="i18n-hidden">Wedding Day</span>
    </h2>
    <div class="gold-line gsap-fade-up"></div>

    <div class="event-cards">

        {{-- ── AKAD NIKAH ── --}}
        <article class="event-card" aria-label="Akad Nikah">

            <div class="event-type">
                <span data-i18n-lang="id">Akad Nikah</span>
                <span data-i18n-lang="en" class="i18n-hidden">Wedding Ceremony</span>
            </div>
            <h3 class="event-name">Ijab Qabul</h3>

            <div class="event-detail">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5"/>
                </svg>
                <span>
                    <strong style="color:var(--color-beige);display:block;">
                        <span data-i18n-lang="id">Minggu, 09 Agustus 2026</span>
                        <span data-i18n-lang="en" class="i18n-hidden">Sunday, August 09, 2026</span>
                    </strong>
                    {{ $invitation->akad_start_at->format('H:i') }} – {{ $invitation->akad_end_at->format('H:i') }} WIB
                </span>
            </div>

            <div class="event-detail">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z"/>
                </svg>
                <span>
                    <strong style="color:var(--color-beige);display:block;">{{ $invitation->venue_name }}</strong>
                    {{ $invitation->venue_address }}
                </span>
            </div>

            @if($invitation->maps_url)
                <a
                    href="{{ $invitation->maps_url }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="event-maps-btn"
                    aria-label="Lihat lokasi di Google Maps"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="16" height="16">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 6.75V15m6-6v8.25m.503 3.498 4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 0 0-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0Z"/>
                    </svg>
                    <span data-i18n-lang="id">Lihat Lokasi</span>
                    <span data-i18n-lang="en" class="i18n-hidden">View Location</span>
                </a>
            @endif

        </article>

        {{-- ── RECEPTION ── --}}
        <article class="event-card" aria-label="Resepsi">

            <div class="event-type">
                <span data-i18n-lang="id">Resepsi Pernikahan</span>
                <span data-i18n-lang="en" class="i18n-hidden">Wedding Reception</span>
            </div>
            <h3 class="event-name">Walimatul &rsquo;Urus</h3>

            <div class="event-detail">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5"/>
                </svg>
                <span>
                    <strong style="color:var(--color-beige);display:block;">
                        <span data-i18n-lang="id">Minggu, 09 Agustus 2026</span>
                        <span data-i18n-lang="en" class="i18n-hidden">Sunday, August 09, 2026</span>
                    </strong>
                    {{ $invitation->reception_start_at->format('H:i') }} – {{ $invitation->reception_end_at->format('H:i') }} WIB
                </span>
            </div>

            <div class="event-detail">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z"/>
                </svg>
                <span>
                    <strong style="color:var(--color-beige);display:block;">{{ $invitation->venue_name }}</strong>
                    {{ $invitation->venue_address }}
                </span>
            </div>

            @if($invitation->maps_url)
                <a
                    href="{{ $invitation->maps_url }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="event-maps-btn"
                    aria-label="Lihat lokasi di Google Maps"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="16" height="16">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 6.75V15m6-6v8.25m.503 3.498 4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 0 0-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0Z"/>
                    </svg>
                    <span data-i18n-lang="id">Lihat Lokasi</span>
                    <span data-i18n-lang="en" class="i18n-hidden">View Location</span>
                </a>
            @endif

        </article>

    </div>

</section>
