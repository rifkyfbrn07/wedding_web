{{-- ===== DESKTOP SIDEBAR ===== --}}
<aside class="sidebar" id="sidebar" aria-label="Navigasi sidebar">

    {{-- Couple photo --}}
    <div class="sidebar-photo">
        @if($invitation->cover_image_url)
            <img
                src="{{ $invitation->cover_image_url }}"
                alt="Wedding Photo"
                loading="lazy"
                width="320"
                height="480"
            >
        @else
            <div style="width:100%;height:100%;background:var(--color-bg);display:flex;align-items:center;justify-content:center;flex-direction:column;gap:1rem;padding:2rem;">
                {{-- Floral decoration --}}
                <div style="opacity:0.15;">
                    @include('components.partials.floral-svg')
                </div>
            </div>
        @endif
    </div>

    {{-- Info --}}
    <div class="sidebar-info">

        <div class="sidebar-couple-names">
            Ikko
            <span class="amp"> &amp; </span>
            Fadhly
        </div>

        <div class="sidebar-date">
            09 · 08 · 2026
        </div>

        <div class="sidebar-divider"></div>

        {{-- Navigation --}}
        <nav class="sidebar-nav" aria-label="Navigasi halaman">

            @php
                $navItems = [
                    ['section' => 'hero',      'label' => 'Home'],
                    ['section' => 'couple',    'label' => 'Couple'],
                    ['section' => 'countdown', 'label' => 'Countdown'],
                    ['section' => 'event',     'label' => 'Event'],
                    ['section' => 'gallery',   'label' => 'Gallery'],
                    ['section' => 'rsvp',      'label' => 'RSVP'],
                    ['section' => 'wishes',    'label' => 'Wishes'],
                ];
            @endphp

            @foreach($navItems as $item)
                <a
                    href="#{{ $item['section'] }}"
                    class="sidebar-nav-item"
                    data-section="{{ $item['section'] }}"
                    onclick="event.preventDefault(); scrollToSection('{{ $item['section'] }}')"
                    aria-label="Ke bagian {{ $item['label'] }}"
                >
                    <span class="nav-dot" aria-hidden="true"></span>
                    {{ $item['label'] }}
                </a>
            @endforeach

        </nav>

    </div>

</aside>
