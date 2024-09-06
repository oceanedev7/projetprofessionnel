import './bootstrap';
import 'flowbite';


import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.getElementById('retour').addEventListener('click', function() {
    window.history.back();
});