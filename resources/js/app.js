// Remove the bootstrap import if you're not using it
import Alpine from 'alpinejs';
import '../css/app.css';

window.Alpine = Alpine;

document.addEventListener('DOMContentLoaded', () => {
    Alpine.start();
    console.log('SOTNBUS Loaded with Alpine.js');
});