# Wedding Web UI Polish - Task List

## Completed
- [x] Analyze project structure and all relevant files
- [x] Understand existing i18n system (data-i18n-lang attributes)
- [x] 1. Hero Layout Restructure (hero.blade.php)
  - Added "WALIMATUL 'URS" eyebrow
  - Restructured hierarchy: Eyebrow → Bride Name (2 lines) → & → Groom Name → Date → Recipient → Button
  - Split bride name into two explicit lines (Ikko Watinur / Safitri)
  - Added recipient display with i18n
  - Added CTA button with scroll-down icon
- [x] 2. Hero CSS Improvements (app.css)
  - Added .hero-eyebrow styling
  - Added .hero-recipient styling
  - Added .hero-cta button styling
  - Added max-width: 760px constraint for desktop
  - Improved vertical rhythm and spacing
  - Reduced background illustration opacity (0.18) to reduce visual competition
  - Added fadeInUp animations with staggered delays
- [x] 3. Cover Mobile Spacing (app.css)
  - Fixed language switcher positioning (top: 1.5rem, right: 1.25rem on mobile)
  - Increased safe padding (1.5rem 1.25rem on small mobile)
  - Fixed mobile-lang-switcher position (top: 0.75rem, right: 1.25rem)
- [x] 4. Parents Section Translation (couple.blade.php)
  - Added i18n for "Bapak" → "Mr." and "Ibu" → "Mrs."
  - Uses str_replace to dynamically translate parent names
  - Only affects English version, Indonesian unchanged
- [x] 5. Localization Audit (all components)
  - Fixed countdown date (Minggu, 09 Agustus 2026 → Sunday, August 09, 2026)
  - Fixed blessing reference translation
  - Fixed event dates in both akad and reception cards
  - All visible text now has English translations
- [x] 6. Responsive Refinements (app.css)
  - Optimized hero for mobile (smaller fonts, adjusted spacing)
  - Fixed cover padding for small screens
  - No overlapping elements
  - No horizontal scrolling
- [x] 7. Final Verification
  - Build succeeds (Vite build completed)
  - No TypeScript/ESLint errors
  - All requirements met

## Files Modified
1. **resources/views/components/hero.blade.php** - Complete restructure with eyebrow, 2-line bride name, recipient, CTA button
2. **resources/css/app.css** - New hero styles, improved cover spacing, fixed language switcher positioning
3. **resources/views/components/couple.blade.php** - Added i18n for parent name translation (Bapak→Mr., Ibu→Mrs.)
4. **resources/views/layouts/invitation.blade.php** - Passed $guest to hero component
5. **resources/views/components/countdown.blade.php** - Added i18n for date text
6. **resources/views/components/blessing.blade.php** - Added i18n for hadith reference
7. **resources/views/components/event.blade.php** - Added i18n for date text in both event cards