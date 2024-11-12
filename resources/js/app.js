import './bootstrap';
import 'flowbite';


import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

//Fonction pour revenir à la page précédente en ouvrant le menu
document.getElementById('retour').addEventListener('click', function() {
    window.history.back();
});





