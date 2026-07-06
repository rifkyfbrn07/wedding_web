{{-- ===== WISHES SECTION ===== --}}
<section id="wishes" aria-label="Ucapan dan Doa">

    <div class="section-eyebrow gsap-fade-up">— Ucapan & Doa —</div>
    <h2 class="section-title gsap-fade-up">Wedding Wishes</h2>
    <div class="gold-line gsap-fade-up"></div>

    <div class="wishes-layout">

        {{-- LEFT: Write a wish --}}
        <div>
            <p class="section-subtitle gsap-fade-up" style="margin-bottom:1.5rem;">
                Sampaikan ucapan dan doa tulus Anda untuk kami.
            </p>

            <form
                id="wishes-form"
                novalidate
                aria-label="Formulir ucapan"
                style="display:flex;flex-direction:column;gap:1rem;"
            >
                @csrf
                <input type="hidden" name="invitation_id" value="{{ $invitation->id }}">

                <div class="form-group" style="margin-bottom:0;">
                    <label class="form-label" for="wish-name">Nama</label>
                    <input
                        type="text"
                        id="wish-name"
                        name="name"
                        class="form-input"
                        placeholder="Nama Anda"
                        value="{{ isset($guest) && $guest ? $guest->name : '' }}"
                        required
                        autocomplete="name"
                    >
                </div>

                <div class="form-group" style="margin-bottom:0;">
                    <label class="form-label" for="wish-message">Ucapan & Doa</label>
                    <textarea
                        id="wish-message"
                        name="message"
                        class="form-textarea"
                        placeholder="Tuliskan ucapan dan doa Anda…"
                        rows="4"
                        required
                    ></textarea>
                </div>

                <button type="submit" class="btn-primary" id="wishes-submit">
                    <span class="btn-text">Kirim Ucapan</span>
                    <span class="btn-spinner hidden">
                        <span class="loading-spinner" style="width:18px;height:18px;"></span>
                    </span>
                </button>

            </form>
        </div>

        {{-- RIGHT: Wishes list --}}
        <div>
            <div id="wishes-empty" style="display:none;text-align:center;padding:3rem 0;color:var(--color-text-muted);">
                <p style="font-family:var(--font-serif-display);font-size:1.25rem;font-style:italic;">
                    Jadilah yang pertama memberikan ucapan…
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
