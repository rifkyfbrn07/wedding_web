{{-- ===== DESKTOP SIDEBAR ===== --}}
<aside class="sidebar" id="sidebar" aria-label="Navigasi sidebar">

    {{-- Language Switcher --}}
    <div class="sidebar-lang-switcher">
        <div class="lang-switcher" role="group" aria-label="Language switcher">
            <button class="lang-btn is-active" data-lang-switch="id" aria-pressed="true" type="button">
                <span class="lang-flag">🇮🇩</span> ID
            </button>
            <button class="lang-btn" data-lang-switch="en" aria-pressed="false" type="button">
                <span class="lang-flag">🇺🇸</span> EN
            </button>
        </div>
    </div>

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
            @if($invitation->bride_name === 'Ikko Watinur Safitri')
                <span class="bride-name-block" style="display: inline-block; text-align: center; vertical-align: bottom;">
                    
                    <span style="display: block; white-space: nowrap;">Ikko Watinur Safitri</span>
                </span>
            @else
                {{ $invitation->bride_name }}
            @endif
            <span class="amp">&</span>
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
            <a href="#love-story" class="sidebar-nav-item" data-section="love-story" onclick="event.preventDefault(); scrollToSection('love-story')">
                <span class="nav-dot"></span>
                <span>STORY</span>
            </a>
            <a href="#event" class="sidebar-nav-item" data-section="event" onclick="event.preventDefault(); scrollToSection('event')">
                <span class="nav-dot"></span>
                <span>EVENT</span>
            </a>
            <a href="#rsvp" class="sidebar-nav-item" data-section="rsvp" onclick="event.preventDefault(); scrollToSection('rsvp')">
                <span class="nav-dot"></span>
                <span>RSVP & WISHES</span>
            </a>
        </nav>

    </div>

</aside>