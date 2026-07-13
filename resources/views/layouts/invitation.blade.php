<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Dynamic SEO --}}
    <title>{{ $seo['title'] ?? 'The Wedding of Ikko & Fadhly' }}</title>
    <meta name="description" content="{{ $seo['description'] ?? 'Undangan pernikahan Ikko & Fadhly — 09 Agustus 2026 di Villa Srimanganti, Jakarta Timur.' }}">

    {{-- OpenGraph --}}
    <meta property="og:type"        content="website">
    <meta property="og:title"       content="{{ $seo['title'] ?? 'The Wedding of Ikko & Fadhly' }}">
    <meta property="og:description" content="{{ $seo['description'] ?? 'Undangan pernikahan Ikko & Fadhly' }}">
    <meta property="og:image"       content="{{ $invitation->cover_image_url ?? asset('images/decorations/1.PNG') }}">
    <meta property="og:url"         content="{{ url()->current() }}">
    <meta name="twitter:card"       content="summary_large_image">

    {{-- JSON-LD Event Schema --}}
    <script type="application/ld+json">
    @verbatim
    {
        "@context": "https://schema.org",
        "@type": "Event",
    @endverbatim
        "name": "The Wedding of {{ $invitation->bride_name }} & {{ $invitation->groom_name }}",
        "startDate": "{{ $invitation->akad_start_at->toIso8601String() }}",
        "endDate": "{{ $invitation->reception_end_at->toIso8601String() }}",
        "location": {
            "@type": "Place",
            "name": "{{ $invitation->venue_name }}",
            "address": {
                "@@type": "PostalAddress",
                "streetAddress": "{{ addslashes($invitation->venue_address) }}"
            }
        }
    }
    </script>

    {{-- Favicon --}}
    <link rel="icon" type="image/svg+xml" href="/favicon.svg">

    {{-- Preconnect fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    @vite(['resources/css/app.css', 'resources/js/main.js'])
</head>
<body class="cover-locked" x-data>

    {{-- Invitation data for JS --}}
    <script>
        window.WEDDING = {
            invitationId: {{ $invitation->id }},
            akadDate: '{{ $invitation->akad_start_at->toIso8601String() }}',
            hasMusicPath: {{ $invitation->music_path ? 'true' : 'false' }},
        };
    </script>

    {{-- ===== COVER PAGE ===== --}}
    @include('components.cover', ['invitation' => $invitation, 'guest' => $guest ?? null])

    {{-- ===== MUSIC PLAYER ===== --}}
    @include('components.music-player', ['invitation' => $invitation])

    {{-- ===== MAIN LAYOUT ===== --}}
    <div class="main-layout" id="main-layout">
        {{-- Fireflies Background Effect --}}
        <div id="main-fireflies" class="main-fireflies-container" aria-hidden="true"></div>

        {{-- LEFT: Scrollable Content --}}
        <main class="main-content" id="main-content">

            @include('components.hero',      ['invitation' => $invitation])
            @include('components.couple',    ['invitation' => $invitation])
            @include('components.countdown', ['invitation' => $invitation])
            @include('components.event',     ['invitation' => $invitation])
            @include('components.blessing')
            @include('components.rsvp',      ['invitation' => $invitation, 'guest' => $guest ?? null])

            <footer class="site-footer">
                <div class="footer-names">
                    {{ $invitation->bride_name }}
                    <span class="amp"> &amp; </span>
                    {{ $invitation->groom_name }}
                </div>
                <div class="footer-date">09 · 08 · 2026</div>
                <div class="footer-copy">Made with love · {{ date('Y') }}</div>
            </footer>

        </main>

        {{-- RIGHT: Fixed Sidebar (desktop only) --}}
        @include('components.sidebar', ['invitation' => $invitation])

    </div>

    {{-- Mobile Bottom Nav --}}
    @include('components.mobile-nav')



    {{-- Toast --}}
    <div id="toast" class="toast" role="alert" aria-live="polite"></div>

</body>
</html>
