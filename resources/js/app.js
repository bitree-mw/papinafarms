const toggle = document.querySelector('.menu-toggle');
const menu = document.getElementById('mobile-navigation');

function closeMenu({ restoreFocus = false } = {}) {
    if (!toggle || !menu) return;
    menu.hidden = true;
    toggle.setAttribute('aria-expanded', 'false');
    toggle.setAttribute('aria-label', 'Open navigation');
    toggle.querySelector('span').textContent = 'menu';
    if (restoreFocus) toggle.focus();
}

if (toggle && menu) {
    toggle.addEventListener('click', () => {
        const opening = menu.hidden;
        menu.hidden = !opening;
        toggle.setAttribute('aria-expanded', String(opening));
        toggle.setAttribute('aria-label', opening ? 'Close navigation' : 'Open navigation');
        toggle.querySelector('span').textContent = opening ? 'close' : 'menu';
    });
    menu.addEventListener('click', (event) => {
        if (event.target.closest('a')) closeMenu();
    });
    document.addEventListener('keydown', (event) => {
        if (event.key === 'Escape' && !menu.hidden) closeMenu({ restoreFocus: true });
    });
    document.addEventListener('click', (event) => {
        if (!event.target.closest('.site-header')) closeMenu();
    });
    window.matchMedia('(min-width: 1400px)').addEventListener('change', () => closeMenu());
}

document.querySelectorAll('[data-checklist]').forEach((button) => {
    button.addEventListener('click', () => {
        const checklist = document.getElementById('checklist-section');
        if (!checklist) return;
        checklist.setAttribute('tabindex', '-1');
        checklist.focus({ preventScroll: true });
        checklist.scrollIntoView({ behavior: window.matchMedia('(prefers-reduced-motion: reduce)').matches ? 'instant' : 'smooth' });
        history.replaceState(null, '', '#checklist-section');
    });
});
