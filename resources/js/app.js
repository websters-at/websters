import './bootstrap';
import Alpine from 'alpinejs'
import collapse from '@alpinejs/collapse';
import intersect from '@alpinejs/intersect'

import.meta.glob([
    '../fonts/**',
]);

// Single-Alpine policy: Livewire (deferred script in <head>, executes before
// this module) owns the one Alpine instance and starts it on DOMContentLoaded.
// We only attach our collapse/intersect plugins and never call Alpine.start()
// ourselves — a second start() on another instance silently broke every
// Livewire component (double-instance warning, zero booted components).
const AlpineInstance = window.Alpine || Alpine;
AlpineInstance.plugin(collapse);
AlpineInstance.plugin(intersect);
window.Alpine = AlpineInstance;

let revealed = false;
function initReveal() {
    if (revealed) return;
    revealed = true;
    // Progressive-enhancement reveal: content is fully visible without JS.
    // Only once Alpine runs, hide elements that start below the fold so the
    // scroll-reveal can animate them in; above-fold content never flickers.
    // IntersectionObserver marks them without forcing synchronous layout reads.
    document.body.classList.add('js-anim');
    if ('IntersectionObserver' in window) {
        const fold = window.innerHeight;
        const io = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (entry.boundingClientRect.top > fold) {
                    entry.target.classList.add('below-fold');
                }
                io.unobserve(entry.target);
            });
        });
        document.querySelectorAll('.fade-up').forEach(function (el) {
            io.observe(el);
        });
    } else {
        document.querySelectorAll('.fade-up').forEach(function (el) {
            el.classList.add('below-fold');
        });
    }
    // NOTE: no Alpine.start() here — Livewire.start() owns startup (see above).
}

if ('requestIdleCallback' in window) {
    requestIdleCallback(initReveal, { timeout: 2000 });
} else {
    initReveal();
}
['pointerdown', 'keydown', 'touchstart', 'scroll', 'wheel'].forEach(function (e) {
    window.addEventListener(e, initReveal, { once: true, passive: true });
});
