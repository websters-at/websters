import './bootstrap';
import Alpine from 'alpinejs'
import collapse from '@alpinejs/collapse';
import intersect from '@alpinejs/intersect'

import.meta.glob([
    '../fonts/**',
]);

// Use existing Alpine instance if Livewire already loaded one (prevents "multiple instances" warning)
const AlpineInstance = window.Alpine || Alpine;
AlpineInstance.plugin(collapse);
AlpineInstance.plugin(intersect);
window.Alpine = AlpineInstance;

let started = false;
function startAlpine() {
    if (started) return;
    started = true;
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
    // Don't double-start if Livewire already started Alpine
    if (!AlpineInstance._x_dataStack && !document.documentElement._x_dataStack) {
        AlpineInstance.start();
    }
}

if ('requestIdleCallback' in window) {
    requestIdleCallback(startAlpine, { timeout: 2000 });
} else {
    startAlpine();
}
['pointerdown', 'keydown', 'touchstart', 'scroll', 'wheel'].forEach(function (e) {
    window.addEventListener(e, startAlpine, { once: true, passive: true });
});
