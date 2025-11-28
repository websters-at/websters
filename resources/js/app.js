import './bootstrap';
import Alpine from 'alpinejs'
import collapse from '@alpinejs/collapse';


import.meta.glob([
    '../fonts/**',
]);

Alpine.plugin(collapse);


window.dataLayer = window.dataLayer || [];
function gtag(){dataLayer.push(arguments);}
gtag('js', new Date());
gtag('config', 'G-WREHCH7Q7Y');
