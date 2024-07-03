@extends('layouts.app')

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite(['resources/css/app.css','resources/js/app.js'])
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>

@section('navbar')
<div class="fixed z-10 w-full"> 
    <a href="{{ route('menu') }}" class="absolute top-8 left-8 bg-custom-vert bg-opacity-90 text-white py-2.5 px-3 border-none rounded-md w-12 text-base inline-block text-center"><i class="fa-solid fa-bars"></i></a>    
    <a class="absolute top-8 right-52 bg-gray-400 bg-opacity-65 text-white py-2.5 px-3 font-bold border-none inline-block text-center rounded w-12 tracking-wide text-base"> <i class="fa-solid fa-user"></i> </a> 
    <a class="absolute top-8 right-36 bg-gray-400 bg-opacity-65 text-white py-2.5 px-3 font-bold border-none inline-block text-center rounded w-12 tracking-wide text-base"> EN </a> 
    <a href="{{ route('reserver') }}" class="absolute top-8 right-8 bg-custom-vert bg-opacity-90 tracking-widest text-white py-3 px-3 border-none rounded w-30 font-semibold text-sm"> RÉSERVER </a>  
</div>
@endsection


@section('main')

<div style="background-color:#F9F4EE" class="h-screen w-full"> 
        
    <img class="w-[500px] h-screen" src="{{ Storage::url('images/cabaneeden.jpg') }}" alt="Cabane intérieur">
    
</div>


<div style="background-color:#F9F4EE" class="h-screen w-full"> 
    <div class="flex flex-col justify-center items-center">
        <span class="font-bold text-custom-marron text-[40px] mt-8">LES ÉQUIPEMENTS</span>
        <hr class="border-t-4 border-custom-beige w-32 relative top-2 left-2">
    </div>
    
    <div  class="flex flex-row justify-center items-center text-5xl space-x-20 text-custom-marron relative top-20"> 
        <i class="fa-solid fa-person"></i>
        <i class="fa-solid fa-hot-tub-person"></i>
        <i class="fa-regular fa-snowflake"></i>
        <i class="fa-solid fa-shower"></i>
        <i class="fa-solid fa-toilet-portable"></i>
        
    </div>
</div>


<div style="background-color:#F9F4EE" class="h-screen w-full"> 
    <div class="flex flex-col justify-center items-center">
        <span class="font-bold text-custom-marron text-[40px] mt-10">PRESTATIONS ET SERVICES</span>
        <hr class="border-t-4 border-custom-beige w-32 relative top-2 left-2">
    </div>

    <div class="flex flex-row justify-center space-x-16 relative top-16" >
    <div class="flex flex-col items-center max-w-lg	"> 
        <i class="fa-solid fa-bell-concierge text-custom-marron text-4xl"></i>
        <div class="font-bold text-custom-marron text-2xl"> Restauration </div>
        <div class="mt-6 text-justify">
            Dans notre établissement, nous accordons une importance particulière à la qualité de notre cuisine, en mettant en avant les produits frais et locaux.  
            Cette approche nous permet non seulement de soutenir l'économie locale, mais aussi de vous offrir une expérience culinaire authentique, ancrée dans notre terroir. 
            Vous avez l'assurance de vivre une expérience gastronomique authentique, où les saveurs locales sont à l'honneur dans chaque assiette. 
        </div>
    </div>
    


<div class="flex flex-col items-center max-w-lg" > 
    <i class="fa-solid fa-spa text-custom-marron text-4xl"></i>
    <div class="font-bold text-custom-marron text-2xl"> Spa </div>
    <div class="mt-6 text-justify ">
        Offrez-vous un moment de détente et de relaxation dans un cadre calme et accueillant.Notre centre de bien-être vous ouvre ses portes pour une expérience inoubliable. 
        Notre Spa "Pleine Nature" est l'endroit idéal pour prendre soin de vous et recharger vos batteries.
        Faites une pause et accordez-vous le luxe d'un moment de pure détente au cœur de la nature. 
        Notre Spa "Pleine Nature" vous attend pour vous offrir un voyage sensoriel inoubliable et vous aider à retrouver l'harmonie du corps et de l'esprit
    </div>
</div>
    </div>

<div class="flex justify-center" >
    <a href="{{ route('prestations') }}" class="bg-custom-marron text-white font-bold text-base px-4 py-2 rounded-md relative top-28">DECOUVRIR LES PRESTATIONS ET SERVICES</a>
</div>
    
</div>

<div class="w-full h-screen bg-custom-beige text-white relative"> 

    <img class="w-full h-screen object-cover opacity-20" src="{{ Storage::url('images/reservation.jpg') }}" alt="Cabane au bord de l'eau">

    <div class="absolute inset-0 flex justify-center items-center">
        <div class="text-center px-6">
            <div class="font-bold text-3xl">Bon à savoir !</div>
            <div class="text-justify font-semibold text-lg max-w-3xl mt-12 mx-auto">
                ARRIVÉE : À partir de 16h et jusqu'à 18h<br>
                Arrivée tardive possible jusqu'à 20h sur demande (prévenir 48h avant votre séjour)<br>
                DÉPART : Jusqu'à 11H<br>
                Accès par escalier sans difficulté.
                Rampe disponible et adaptée pour les personnes à mobilité réduite.
                Merci de préférer des chaussures adaptées (proscrire les chaussures fragiles et les talons) et de prévoir des chaussures sèches pour l’intérieur de la cabane.
                La cabane est non fumeur.
                L’accueil d’invités n’est pas autorisé et nos amis les animaux domestiques ne sont pas admis dans le Domaine.
                Les enfants de moins de 6 ans sont placés sous la responsabilité de leurs parents.
            </div>
        </div>
    </div>

</div>


<div style="background-color:#F9F4EE" class="h-screen w-full"> 


<div id="indicators-carousel" class="relative top-28 left-60 max-w-screen-md" data-carousel="static">
    <!-- Carousel wrapper -->
    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
         <!-- Item 1 -->
        <div class="hidden" data-carousel-item="active">
            <img src="{{ Storage::url('images/caroussel1.jpg') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="Cabane chambre">
        </div>
        <!-- Item 2 -->
        <div class="hidden " data-carousel-item>
            <img src="{{ Storage::url('images/caroussel2.png') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="Cabane terrasse">
        </div>
        <!-- Item 3 -->
        <div class="hidden " data-carousel-item>
            <img src="{{ Storage::url('images/caroussel3.jpg') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="Cabane salon">
        </div>
        <!-- Item 4 -->
        <div class="hidden" data-carousel-item>
            <img src="{{ Storage::url('images/caroussel4.jpg') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="Cabane chambre étage">
        </div>
    </div>
    <!-- Slider indicators -->
    <div class="absolute z-30 flex -translate-x-1/2 space-x-3 rtl:space-x-reverse bottom-5 left-1/2">
        <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
    </div>
    <!-- Slider controls -->
     <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
    <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
   
</div>


</div> 



@endsection

  
     
</body>
</html>