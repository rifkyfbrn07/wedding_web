{{-- ===== RSVP & WISHES SECTION ===== --}}
<section id="rsvp" aria-label="RSVP dan Ucapan">

    <div class="section-eyebrow gsap-fade-up">— Konfirmasi & Ucapan —</div>
    <h2 class="section-title gsap-fade-up">RSVP & Wishes</h2>
    <div class="gold-line gsap-fade-up"></div>

    <div class="rsvp-wishes-container">
        
        {{-- Left side: RSVP form --}}
        <div class="rsvp-wishes-left">
            <p class="section-subtitle gsap-fade-up" style="margin-bottom:1.5rem; text-align: left;">
                Silakan konfirmasi kehadiran Anda dan tuliskan ucapan/doa restu di bawah ini.
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
                        <label class="form-label" for="rsvp-name">Nama Lengkap</label>
                        <input
                            type="text"
                            id="rsvp-name"
                            name="name"
                            class="form-input"
                            placeholder="Masukkan nama Anda"
                            value="{{ isset($guest) && $guest ? $guest->name : '' }}"
                            required
                            autocomplete="name"
                        >
                    </div>

                    {{-- Attendance --}}
                    <div class="form-group">
                        <label class="form-label">Konfirmasi Kehadiran</label>
                        <div class="form-radio-group" role="radiogroup" aria-label="Status kehadiran">

                            <label class="form-radio-label">
                                <input type="radio" name="attendance" value="present" required>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="16" height="16">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                </svg>
                                Hadir
                            </label>

                            <label class="form-radio-label">
                                <input type="radio" name="attendance" value="not_present">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" width="16" height="16">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                </svg>
                                Tidak Hadir
                            </label>

                        </div>
                    </div>

                    {{-- Number of guests --}}
                    <div class="form-group">
                        <label class="form-label" for="rsvp-count">Jumlah Tamu (termasuk Anda)</label>
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
                        <label class="form-label" for="rsvp-message">Pesan &amp; Ucapan</label>
                        <textarea
                            id="rsvp-message"
                            name="message"
                            class="form-textarea"
                            placeholder="Tuliskan ucapan dan doa restu Anda…"
                            rows="4"
                        ></textarea>
                    </div>

                    {{-- Submit --}}
                    <button type="submit" class="btn-primary" id="rsvp-submit">
                        <span class="btn-text">Kirim Konfirmasi &amp; Ucapan</span>
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
                Doa Restu Keluarga &amp; Sahabat
            </p>
            
            <div id="wishes-empty" style="display:none;text-align:center;padding:3rem 0;color:var(--color-text-muted);">
                <p style="font-family:var(--font-serif-display);font-size:1.25rem;font-style:italic;">
                    Belum ada ucapan. Jadilah yang pertama memberikan ucapan…
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
                    Muat Lebih Banyak
                </button>
            </div>
        </div>

    </div>

</section>
