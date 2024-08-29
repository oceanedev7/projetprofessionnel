@extends('layouts.app')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>Tout Là-Haut</title>
</head>
<body>
    

    @section('navbar')
    <div class="fixed z-10 w-full"> 
        <a href="{{ route('menu') }}" class="absolute top-8 left-8 bg-custom-vert bg-opacity-90 text-white py-2.5 px-3 border-none rounded-md w-12 text-base inline-block text-center"><i class="fa-solid fa-bars"></i></a>    
        <a class="absolute top-8 right-52 bg-gray-400 bg-opacity-65 text-white py-2.5 px-3 font-bold border-none inline-block text-center rounded w-12 tracking-wide text-base"> <i class="fa-solid fa-user"></i> </a> 
        <a href="{{ route('lang.switch', ['lang' => App::getLocale() === 'en' ? 'fr' : 'en']) }}" 
            class="absolute top-8 right-36 bg-gray-400 bg-opacity-65 text-white py-2.5 px-3 font-bold border-none inline-block text-center rounded w-12 tracking-wide text-base">
             {{ App::getLocale() === 'en' ? 'FR' : 'EN' }}
         </a>       
         <a href="{{ route('reserver') }}" class="absolute top-8 right-6 bg-gray-400 bg-opacity-65 tracking-widest text-white py-3 px-3 border-none rounded w-30 font-semibold text-sm uppercase"> {{ __('content.reserver') }}  </a>  
        </div>
    @endsection



    @section('main')


    <div class="bg-custom-vert h-screen w-full flex">
       
        <img class="w-[550px] h-full object-cover" src="{{ Storage::url('images/restauration.png') }}" alt="Panier repas">
    
        <div class="flex flex-col justify-center px-8 md:px-16 text-center md:text-left">
            <h1 class="text-4xl text-white font-bold mb-4 uppercase">{{ __('content.restauration') }}  </h1>
            <hr class="border-t-4 border-custom-beige w-32 mx-auto md:mx-0 mb-6">
    
            <div class="text-justify text-white max-w-lg mx-auto md:mx-0">
                {{ __('content.text-restauration') }}            
            </div>
        </div>
    </div>
    
    

    <div style="background-color:#F9F4EE" class=" h-screen w-full"> 

        <div class="flex flex-row justify-center space-x-60 relative top-16">
        
            <div class="flex flex-col items-center max-w-xs p-4 rounded-lg text-custom-marron">
                <img class="w-full rounded-lg mb-4" src="{{ Storage::url('images/dejeuner.jpg') }}" alt="Déjeuner">
                @if(isset($dejeuner))
             <div class="text-lg font-bold text-center mb-2">{{ __('content.' . $dejeunerType) }}</div>
                <div class="flex flex-col md:flex-row md:space-x-4 mb-2">
                    <div class="text-lg mb-2 md:mb-0">
                        <span class="font-semibold">{{ __('content.adulte') }} :</span>
                        <span>{{ $dejeuner->prix_adulte }} €</span>
                    </div>
                    <div class="text-lg">
                        <span class="font-semibold">{{ __('content.enfant') }} :</span>
                        <span>{{ $dejeuner->prix_enfant }} €</span>
                    </div>
                </div>
                <div class="text-center">{{ __('content.' . $dejeunerDescription) }}</div>
                @endif
            </div>
            
            

            <div class="flex flex-col items-center max-w-xs p-4 rounded-lg text-custom-marron">
                <img class="w-full rounded-lg mb-4" src="{{ Storage::url('images/diner.jpg') }}" alt="Déjeuner">
                @if(isset($diner))
                <div class="text-lg font-bold text-center mb-2">{{ __('content.' . $dinerType) }}</div>
                <div class="flex flex-col md:flex-row md:space-x-4 mb-2">
                    <div class="text-lg mb-2 md:mb-0">
                        <span class="font-semibold">{{ __('content.adulte') }} :</span>
                        <span>{{ $diner->prix_adulte }} €</span>
                    </div>
                    <div class="text-lg">
                        <span class="font-semibold">{{ __('content.enfant') }} :</span>
                        <span>{{ $diner->prix_enfant }} €</span>
                    </div>
                </div>
                <div class="text-center">{{ __('content.' . $dinerDescription) }}</div>
                @endif
            </div>
    
    </div>
    </div>


    <div class="bg-custom-vert h-screen w-full flex">
       
        <img class="w-[550px] h-full object-cover" src="{{ Storage::url('images/spa.jpg') }}" alt="Massage">
    
        <div class="flex flex-col justify-center px-8 md:px-16 text-center md:text-left">
            <h1 class="text-4xl text-white font-bold mb-4">{{ __('content.spa') }}</h1>
            <hr class="border-t-4 border-custom-beige w-32 mx-auto md:mx-0 mb-6">
    
            <div class="text-justify text-white max-w-lg mx-auto md:mx-0">
                {{ __('content.text-spa') }}
            </div>
        </div>
    </div>


    <div style="background-color:#F9F4EE" class="h-screen w-full flex items-center">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 gap-x-14 gap-y-8"> 
                @foreach ($massages as $massage)
                    <div class="flex flex-col">
                        <div class="flex items-center">
                            <div class="font-bold text-custom-marron text-lg">{{ $massage->type }}</div>
                            <hr class="h-1 w-2 bg-custom-marron mx-4"/>
                            <div class="font-bold text-custom-marron text-lg">{{ $massage->duree }}min</div>
                            <div class="font-bold text-custom-marron text-lg ml-auto">{{ $massage->prix_adulte }}€</div>
                        </div>
                        <div class="text-justify mt-2 text-sm w-full">{{ $massage->description }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    
    


    @endsection

</body>
</html>