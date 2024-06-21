import './bootstrap';

import Alpine from 'alpinejs';

import.meta.glob([
    '../files/**',
]);

window.Alpine = Alpine;

Alpine.start();
