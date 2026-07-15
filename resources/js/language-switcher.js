// Language switcher for invitation pages (no refresh)
// Strategy: toggle visibility of elements with data-i18n-lang="id|en".

const LANG_STORAGE_KEY = 'wedding_lang';

function getSavedLang() {
    const v = localStorage.getItem(LANG_STORAGE_KEY);
    if (v === 'id' || v === 'en') return v;
    return null;
}

function getDefaultLangFromHtml() {
    const htmlLang = document.documentElement.getAttribute('lang');
    if (htmlLang && htmlLang.toLowerCase().startsWith('id')) return 'id';
    if (htmlLang && htmlLang.toLowerCase().startsWith('en')) return 'en';
    return 'id';
}

function setLang(lang) {
    if (lang !== 'id' && lang !== 'en') return;
    localStorage.setItem(LANG_STORAGE_KEY, lang);

    // Toggle translated blocks
    document.querySelectorAll('[data-i18n-lang]').forEach((el) => {
        const elLang = el.getAttribute('data-i18n-lang');
        // Keep elements with matching lang visible, others hidden
        if (elLang === lang) {
            el.classList.remove('i18n-hidden');
            el.setAttribute('aria-hidden', 'false');
        } else {
            el.classList.add('i18n-hidden');
            el.setAttribute('aria-hidden', 'true');
        }
    });

    // Update input/textarea placeholders
    document.querySelectorAll('[data-i18n-placeholder-id]').forEach((el) => {
        const placeholderKey = 'data-i18n-placeholder-' + lang;
        const newPlaceholder = el.getAttribute(placeholderKey);
        if (newPlaceholder !== null) {
            el.setAttribute('placeholder', newPlaceholder);
        }
    });

    // Update toggle button state
    document.querySelectorAll('[data-lang-switch]').forEach((btn) => {
        const btnLang = btn.getAttribute('data-lang-switch');
        btn.classList.toggle('is-active', btnLang === lang);
        btn.setAttribute('aria-pressed', btnLang === lang ? 'true' : 'false');
    });
}

export function initLanguageSwitcher() {
    const root = document;
    const defaultLang = getSavedLang() ?? getDefaultLangFromHtml();

    // Ensure hidden class exists even if CSS isn't updated
    const styleId = 'i18n-hidden-style';
    if (!document.getElementById(styleId)) {
        const style = document.createElement('style');
        style.id = styleId;
        style.textContent = '.i18n-hidden{display:none!important;}';
        document.head.appendChild(style);
    }

    // If there are no toggles/translation nodes, do nothing
    const anySwitch = root.querySelector('[data-lang-switch]');
    const anyI18nNodes = root.querySelector('[data-i18n-lang]');
    if (!anySwitch || !anyI18nNodes) return;

    // Initial render
    setLang(defaultLang);

    // Click handlers
    root.querySelectorAll('[data-lang-switch]').forEach((btn) => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            const lang = btn.getAttribute('data-lang-switch');
            setLang(lang);
        });
    });
}

