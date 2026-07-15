{{-- ===== RSVP & WISHES SECTION ===== --}}
<section id="rsvp" aria-label="RSVP dan Ucapan">

    <div class="section-eyebrow gsap-fade-up">
        <span data-i18n-lang="id">— Konfirmasi & Ucapan —</span>
        <span data-i18n-lang="en" class="i18n-hidden">— Confirmation & Wishes —</span>
    </div>
    <h2 class="section-title gsap-fade-up">RSVP & Wishes</h2>
    <div class="gold-line gsap-fade-up"></div>

    <div class="rsvp-wishes-container">
        
        {{-- Left side: RSVP form --}}
        <div class="rsvp-wishes-left">
            <p class="section-subtitle gsap-fade-up" style="margin-bottom:1.5rem; text-align: left;">
                <span data-i18n-lang="id">Silakan konfirmasi kehadiran Anda dan tuliskan ucapan/doa restu di bawah ini.</span>
                <span data-i18n-lang="en" class="i18n-hidden">Please confirm your attendance and write your wishes and prayers below.</span>
            </p>
            
            <div class="rsvp-form-wrapper" style="margin-top: 0; max-width: 100%;">
                <form
                    id="rsvp-form"
                    action="{{ route('rsvp.store') }}"
                    method="POST"
                    novalidate
                    aria-label="Formulir RSVP"
                >
                    @csrf
                    <input type="hidden" name="invitation_id" value="{{ $invitation->id }}">
                    @if(isset($guest) && $guest)
                        <input type="hidden" name="guest_id" value="{{ $guest->id }}">
                    @endif

                    {{-- Name --}}
                    <div class="form-group">
                        <label class="form-label" for="rsvp-name">
                            <span data-i18n-lang="id">Nama Lengkap</span>
                            <span data-i18n-lang="en" class="i18n-hidden">Full Name</span>
                        </label>
                        <input
                            type="text"
                            id="rsvp-name"
                            name="name"
                            class="form-input"
                            placeholder=""
                            data-i18n-placeholder-id="Masukkan nama Anda"
                            data-i18n-placeholder-en="Enter your name"
                            value="{{ isset($guest) && $guest ? $guest->name : '' }}"
                            required
                            autocomplete="name"
                        >
                    </div>

                    {{-- Attendance --}}
                    <div class="form-group">
                        <label class="form-label">
                            <span data-i18n-lang="id">Konfirmasi Kehadiran</span>
                            <span data-i18n-lang="en" class="i18n-hidden">Attendance Confirmation</span>
                        </label>
                        <div class="form-radio-group" role="radiogroup" aria-label="Status kehadiran">

                            <label class="form-radio-label">
                                <input type="radio" name="attendance" value="present" required>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="16" height="16">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                </svg>
                                <span data-i18n-lang="id">Hadir</span>
                                <span data-i18n-lang="en" class="i18n-hidden">Attending</span>
                            </label>

                            <label class="form-radio-label">
                                <input type="radio" name="attendance" value="not_present">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="16" height="16">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                </svg>
                                <span data-i18n-lang="id">Tidak Hadir</span>
                                <span data-i18n-lang="en" class="i18n-hidden">Not Attending</span>
                            </label>

                        </div>
                    </div>

                    {{-- Number of guests --}}
                    <div class="form-group">
                        <label class="form-label" for="rsvp-count">
                            <span data-i18n-lang="id">Jumlah Tamu (termasuk Anda)</span>
                            <span data-i18n-lang="en" class="i18n-hidden">Number of Guests (including you)</span>
                        </label>
                        <input
                            type="number"
                            id="rsvp-count"
                            name="guest_count"
                            class="form-input"
                            placeholder="1"
                            min="1"
                            max="10"
                            value="1"
                        >
                    </div>

                    {{-- Message --}}
                    <div class="form-group">
                        <label class="form-label" for="rsvp-message">
                            <span data-i18n-lang="id">Pesan & Ucapan</span>
                            <span data-i18n-lang="en" class="i18n-hidden">Message & Wishes</span>
                        </label>
                        <textarea
                            id="rsvp-message"
                            name="message"
                            class="form-textarea"
                            placeholder=""
                            data-i18n-placeholder-id="Tuliskan ucapan dan doa restu Anda…"
                            data-i18n-placeholder-en="Write your wishes and prayers…"
                            rows="4"
                        ></textarea>
                    </div>

                    {{-- Submit --}}
                    <button type="submit" class="btn-primary" id="rsvp-submit">
                        <span class="btn-text">
                            <span data-i18n-lang="id">Kirim Konfirmasi & Ucapan</span>
                            <span data-i18n-lang="en" class="i18n-hidden">Send Confirmation & Wishes</span>
                        </span>
                        <span class="btn-spinner hidden">
                            <span class="loading-spinner" style="width:18px;height:18px;"></span>
                        </span>
                    </button>

                </form>
            </div>
        </div>

        {{-- Right side: Wishes list --}}
        <div class="rsvp-wishes-right">
            <p class="section-subtitle gsap-fade-up" style="margin-bottom:1.5rem; text-align: left;">
                <span data-i18n-lang="id">Doa Restu Keluarga & Sahabat</span>
                <span data-i18n-lang="en" class="i18n-hidden">Blessings from Family & Friends</span>
            </p>
            
            <div id="wishes-empty" style="display:none;text-align:center;padding:3rem 0;color:var(--color-text-muted);">
                <p style="font-family:var(--font-serif-display);font-size:1.25rem;font-style:italic;">
                    <span data-i18n-lang="id">Belum ada ucapan. Jadilah yang pertama memberikan ucapan…</span>
                    <span data-i18n-lang="en" class="i18n-hidden">No wishes yet. Be the first to send your wishes…</span>
                </p>
            </div>

            <div id="wishes-list" class="wishes-list" aria-label="Daftar ucapan" aria-live="polite">
                {{-- Loaded via JS --}}
            </div>

            <div style="text-align:center;margin-top:1.5rem;">
                <button
                    id="wishes-load-more"
                    class="hidden"
                    style="background:none;border:1px solid rgba(199,162,106,0.25);color:var(--color-text-muted);font-family:var(--font-sans);font-size:0.72rem;letter-spacing:0.2em;text-transform:uppercase;padding:0.625rem 1.25rem;cursor:pointer;transition:all 0.3s ease;"
                    aria-label="Muat lebih banyak ucapan"
                >
                    <span data-i18n-lang="id">Muat Lebih Banyak</span>
                    <span data-i18n-lang="en" class="i18n-hidden">Load More</span>
                </button>
            </div>
        </div>

    </div>

</section>