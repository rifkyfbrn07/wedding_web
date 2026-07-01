{{-- ===== DESKTOP SIDEBAR ===== --}}
<aside class="sidebar" id="sidebar" aria-label="Navigasi sidebar">

    {{-- Background Photo (Manual Upload) --}}
    <div class="sidebar-photo">
        <img 
            src="{{ asset('images/sidebar/couple.jpg') }}" 
            alt="Wedding Photo" 
            loading="lazy"
        >
    </div>

    {{-- Info & Navigation --}}
    <div class="sidebar-info">

        {{-- Nama Mempelai --}}
        <h1 class="sidebar-couple-names">
            {{ $invitation->bride_name }}
            <span class="amp">&amp;</span>
            {{ $invitation->groom_name }}
        </h1>

        {{-- Tanggal --}}
        <div class="sidebar-date">
            {{ \Carbon\Carbon::parse($invitation->akad_start_at)->translatedFormat('d · m · Y') }}
        </div>

        <div class="sidebar-divider"></div>

        {{-- Navigation Menu --}}
        <nav class="sidebar-nav" aria-label="Navigasi halaman">
            <a href="#hero" class="sidebar-nav-item active" data-section="hero" onclick="event.preventDefault(); scrollToSection('hero')">
                <span class="nav-dot"></span>
                <span>HOME</span>
            </a>
            <a href="#couple" class="sidebar-nav-item" data-section="couple" onclick="event.preventDefault(); scrollToSection('couple')">
                <span class="nav-dot"></span>
                <span>COUPLE</span>
            </a>
            <a href="#countdown" class="sidebar-nav-item" data-section="countdown" onclick="event.preventDefault(); scrollToSection('countdown')">
                <span class="nav-dot"></span>
                <span>COUNTDOWN</span>
            </a>
            <a href="#event" class="sidebar-nav-item" data-section="event" onclick="event.preventDefault(); scrollToSection('event')">
                <span class="nav-dot"></span>
                <span>EVENT</span>
            </a>
            <a href="#gallery" class="sidebar-nav-item" data-section="gallery" onclick="event.preventDefault(); scrollToSection('gallery')">
                <span class="nav-dot"></span>
                <span>GALLERY</span>
            </a>
            <a href="#rsvp" class="sidebar-nav-item" data-section="rsvp" onclick="event.preventDefault(); scrollToSection('rsvp')">
                <span class="nav-dot"></span>
                <span>RSVP</span>
            </a>
            <a href="#wishes" class="sidebar-nav-item" data-section="wishes" onclick="event.preventDefault(); scrollToSection('wishes')">
                <span class="nav-dot"></span>
                <span>WISHES</span>
            </a>
        </nav>

    </div>

</aside>