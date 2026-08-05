import './bootstrap';
import Alpine from 'alpinejs'
import collapse from '@alpinejs/collapse';
import intersect from '@alpinejs/intersect'

import.meta.glob([
    '../fonts/**',
]);

Alpine.plugin(collapse);

Alpine.plugin(intersect);

window.Alpine = Alpine;

let started = false;
function startAlpine() {
    if (started) return;
    started = true;
    Alpine.start();
}

if ('requestIdleCallback' in window) {
    requestIdleCallback(startAlpine, { timeout: 2000 });
} else {
    startAlpine();
}
['pointerdown', 'keydown', 'touchstart', 'scroll', 'wheel'].forEach(function (e) {
    window.addEventListener(e, startAlpine, { once: true, passive: true });
});
