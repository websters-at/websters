import './bootstrap';
import Alpine from 'alpinejs'
import collapse from '@alpinejs/collapse';
import intersect from '@alpinejs/intersect'

import.meta.glob([
    '../fonts/**',
]);

Alpine.plugin(collapse);

Alpine.plugin(intersect)