import './bootstrap';
import Alpine from 'alpinejs'
import collapse from '@alpinejs/collapse';


import.meta.glob([
    '../fonts/**',
]);

Alpine.plugin(collapse);



document.querySelectorAll('fieldset').forEach(fieldset => {
  fieldset.removeAttribute('class');
});

