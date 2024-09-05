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
    <a href="{{ route('lang.switch', ['lang' => App::getLocale() === 'en' ? 'fr' : 'en']) }}" 
        class="absolute top-8 right-36 bg-gray-400 bg-opacity-65 text-white py-2.5 px-3 font-bold border-none inline-block text-center rounded w-12 tracking-wide text-base">
         {{ App::getLocale() === 'en' ? 'FR' : 'EN' }}
     </a>     <a href="{{ route('reserver') }}" class="absolute top-8 right-8 bg-custom-vert bg-opacity-90 tracking-widest text-white py-3 px-3 border-none rounded w-30 font-semibold text-sm"> RÉSERVER </a>  
</div>
@endsection


@section('main')

<div style="background-color:#F9F4EE" class="h-screen w-full flex "> 
        
    <img class="w-[500px] h-screen" src="{{ Storage::url('images/cabaneosmose.jpg') }}" alt="Cabane intérieur">

    <div class="flex flex-col justify-center px-8 md:px-16 text-center md:text-left">
        <div class="text-4xl text-custom-marron font-bold mb-4 uppercase"> {{ __('content.' . $nomCabane) }}</div>
        <div class="text-justify text-custom-marron max-w-lg mx-auto md:mx-0">{{ __('content.' . $descriptionCabane) }}</div>
        <div class="italic mt-12 text-justify text-2xl text-custom-marron font-bold max-w-lg mx-auto md:mx-0">{{ __('content.' . $prixCabane) }}</div>
    
</div>
</div>


<div style="background-color:#F9F4EE" class="h-screen w-full"> 
    <div class="flex flex-col justify-center items-center">
        <span class="font-bold text-custom-marron text-[40px] mt-8 uppercase">{{ __('content.equipement') }}</span>
        <hr class="border-t-4 border-custom-beige w-32 relative top-2 left-2">
    </div>
    
    
    <div class="flex flex-row justify-center items-center space-x-20 text-custom-marron relative top-20">
        <div class="flex flex-col items-center space-y-2">
            <i class="fa-solid fa-person text-5xl"></i>
            <div class="text-base">2 {{ __('content.pax') }}</div>
        </div>
        <div class="flex flex-col items-center space-y-2">
            <i class="fa-solid fa-hot-tub-person text-5xl"></i>
            <div class="text-base">{{ __('content.spa-privatif') }}</div>
        </div>
        <div class="flex flex-col items-center space-y-2">
            <i class="fa-regular fa-snowflake text-5xl"></i>
            <div class="text-base">{{ __('content.climatisation') }}</div>
        </div>
        <div class="flex flex-col items-center space-y-2">
            <i class="fa-solid fa-shower text-5xl"></i>
            <div class="text-base">{{ __('content.douche') }}</div>
        </div>
        <div class="flex flex-col items-center space-y-2">
            <i class="fa-solid fa-toilet-portable text-5xl"></i>
            <div class="text-base">{{ __('content.frigo') }}</div>
        </div>
    </div>

    <div class="flex flex-col mt-40">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-y-6 text-custom-marron">
            @foreach($equipements as $equipement)
                <div class="text-left">- {{ $equipement->nomEquipement }}</div>
            @endforeach
        </div>
    </div>

</div>


<div style="background-color:#F9F4EE" class="h-screen w-full"> 
    <div class="flex flex-col justify-center items-center">
        <span class="font-bold text-custom-marron text-[40px] mt-10 uppercase">{{ __('content.prestation') }}</span>
        <hr class="border-t-4 border-custom-beige w-32 relative top-2 left-2">
    </div>

    <div class="flex flex-row justify-center space-x-16 relative top-16" >
    <div class="flex flex-col items-center max-w-lg	"> 
        <i class="fa-solid fa-bell-concierge text-custom-marron text-4xl"></i>
        <div class="font-bold text-custom-marron text-2xl"> {{ __('content.restauration') }} </div>
        <div class="mt-6 text-justify">
            {{ __('content.restauration-cabane') }} 
        </div>
    </div>
    


<div class="flex flex-col items-center max-w-lg" > 
    <i class="fa-solid fa-spa text-custom-marron text-4xl"></i>
    <div class="font-bold text-custom-marron text-2xl"> Spa </div>
    <div class="mt-6 text-justify ">
        {{ __('content.spa-cabane') }}
    </div>
</div>
    </div>

<div class="flex justify-center" >
    <a href="{{ route('prestations') }}" class="bg-custom-marron text-white font-bold text-base px-4 py-2 rounded-md relative top-28 uppercase">{{ __('content.decouvrir-bouton') }}</a>
</div>
    
</div>

<div class="w-full h-screen bg-custom-beige text-white relative"> 

    <img class="w-full h-screen object-cover opacity-20" src="{{ Storage::url('images/reservation.jpg') }}" alt="Cabane au bord de l'eau">

    <div class="absolute inset-0 flex justify-center items-center">
        <div class="text-center px-6">
            <div class="font-bold text-3xl">{{ __('content.savoir') }}</div>
            <div class="text-justify font-semibold text-lg max-w-3xl mt-12 mx-auto">
                {!! nl2br(__('content.conseil')) !!}
            </div>
        </div>
    </div>

</div>


<div style="background-color:#F9F4EE" class="h-screen w-full"> 


<div id="indicators-carousel" class="relative top-28 left-60 max-w-screen-md" data-carousel="static">

    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">

        <div class="hidden" data-carousel-item="active">
            <img src="{{ Storage::url('images/caroussel1.jpg') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="Cabane chambre">
        </div>

        <div class="hidden " data-carousel-item>
            <img src="{{ Storage::url('images/caroussel2.png') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="Cabane terrasse">
        </div>

        <div class="hidden " data-carousel-item>
            <img src="{{ Storage::url('images/caroussel3.jpg') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="Cabane salon">
        </div>

        <div class="hidden" data-carousel-item>
            <img src="{{ Storage::url('images/caroussel4.jpg') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="Cabane chambre étage">
        </div>
    </div>

    <div class="absolute z-30 flex -translate-x-1/2 space-x-3 rtl:space-x-reverse bottom-5 left-1/2">
        <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3" data-carousel-slide-to="2"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4" data-carousel-slide-to="3"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5" data-carousel-slide-to="4"></button>
    </div>

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