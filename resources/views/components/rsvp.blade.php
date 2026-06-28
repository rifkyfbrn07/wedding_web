{{-- ===== RSVP SECTION ===== --}}
<section id="rsvp" aria-label="RSVP">

    <div class="section-eyebrow gsap-fade-up">— Konfirmasi Kehadiran —</div>
    <h2 class="section-title gsap-fade-up">RSVP</h2>
    <div class="gold-line gsap-fade-up"></div>

    <p class="section-subtitle gsap-fade-up" style="margin-bottom:0;">
        Kehadiran Anda adalah kebahagiaan bagi kami.
    </p>

    <div class="rsvp-form-wrapper">
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
                <label class="form-label" for="rsvp-message">Pesan (Opsional)</label>
                <textarea
                    id="rsvp-message"
                    name="message"
                    class="form-textarea"
                    placeholder="Tuliskan pesan untuk pengantin…"
                    rows="3"
                ></textarea>
            </div>

            {{-- Submit --}}
            <button type="submit" class="btn-primary" id="rsvp-submit">
                <span class="btn-text">Kirim Konfirmasi</span>
                <span class="btn-spinner hidden">
                    <span class="loading-spinner" style="width:18px;height:18px;"></span>
                </span>
            </button>

        </form>
    </div>

</section>
