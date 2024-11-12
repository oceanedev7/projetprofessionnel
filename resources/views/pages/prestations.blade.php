@extends('layouts.main')

@section('title', __('content.prestation'))

    @section('navbar')
    <div class="fixed z-10 w-full"> 
        <a href="{{ route('menu') }}" class="absolute top-8 left-8 bg-custom-vert bg-opacity-90 text-white py-2.5 px-3 border-none rounded-md w-12 text-base inline-block text-center"><i class="fa-solid fa-bars"></i></a>    
        {{-- <a class="absolute top-8 right-52 bg-gray-400 bg-opacity-65 text-white py-2.5 px-3 font-bold border-none inline-block text-center rounded w-12 tracking-wide text-base"> <i class="fa-solid fa-user"></i> </a>  --}}
        @if(Auth::check())
        <div class="hidden sm:flex sm:items-center sm:ms-6 absolute top-9 right-52">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-bold rounded-md bg-white bg-opacity-90 text-custom-vert focus:outline-none transition ease-in-out duration-150">
                        <div> {{ Auth::user()->prenom }} {{ Auth::user()->nom }} </div>
    
                        <div class="ms-1">
                            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </div>
                    </button>
                </x-slot>
    
                <x-slot name="content">
                    <x-dropdown-link :href="route('profile.edit')">
                        {{ __('content.profil') }}
                    </x-dropdown-link>

                    <x-dropdown-link :href="route('user-reservation')">
                        {{ __('content.my_resa') }}
                    </x-dropdown-link>
    
                    <!-- Déconnexion -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('content.deconnexion') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
        </div>
    @else
        <a href="{{ route('login') }}" class="absolute top-8 right-52 bg-gray-400 bg-opacity-65 text-white py-2.5 px-3 font-bold border-none inline-block text-center rounded w-12 tracking-wide text-base">
            <i class="fa-solid fa-user"></i>
        </a>
    @endif
    
    
    
        <a href="{{ route('lang.switch', ['lang' => App::getLocale() === 'en' ? 'fr' : 'en']) }}" 
            class="absolute top-8 right-36 bg-gray-400 bg-opacity-65 text-white py-2.5 px-3 font-bold border-none inline-block text-center rounded w-12 tracking-wide text-base">
             {{ App::getLocale() === 'en' ? 'FR' : 'EN' }}
         </a>       
         <a href="{{ route('reserver') }}" class="absolute top-8 right-6 bg-gray-400 bg-opacity-65 tracking-widest text-white py-3 px-3 border-none rounded w-30 font-semibold text-sm uppercase"> {{ __('content.reserver') }}  </a>  
        </div>
    @endsection



    @section('main')


    <div class="bg-custom-vert md:h-screen w-full md:flex-row flex flex-col">
       
        <img class="w-[550px] h-full object-cover" src="{{ Storage::url('images/restauration.png') }}" alt="Panier repas">
    
        <div class="flex flex-col justify-center p-8 md:p-0 px-8 md:px-16 text-center md:text-left">
            <h1 class="text-4xl text-white font-bold mb-4 uppercase">{{ __('content.restauration') }}  </h1>
            <hr class="border-t-4 border-custom-beige w-32 mx-auto md:mx-0 mb-6">
    
            <div class="text-justify text-white max-w-lg mx-auto md:mx-0">
                {{ __('content.text-restauration') }}            
            </div>

            <div class="relative top-6"> 
                <a class="bg-white rounded text-custom-marron font-bold py-2 px-4 uppercase" href="{{ route('reserver') }}"> {{ __('content.reserver') }}</a>
                </div>
        </div>
    </div>
    
    

    <div style="background-color:#F9F4EE" class="md:h-screen w-full"> 

        <div class="flex flex-col items-center justify-center md:flex-row md:justify-center md:space-x-60 relative md:top-16">
        
            @foreach ($restaurants as $restaurant)
                
         
            <div class="flex flex-col items-center max-w-xs p-4 rounded-lg text-custom-marron">
                <img class="w-full rounded-lg mb-4" src="{{ Storage::url('images/dejeuner.jpg') }}" alt="Déjeuner">
        
             <div class="text-lg font-bold text-center mb-2">
                @if ($restaurant->type == 'Déjeuner : Panier du Terroir (11H à 13H30)')
                            {{ __('content.restaurant_panier_du_terroir') }}
                        @elseif ($restaurant->type == 'Dîner : Panier Gourmand (19H à 21H)')
                            {{ __('content.restaurant_panier_gourmand') }}
                        @endif 
             </div>
                <div class="flex flex-col md:flex-row md:space-x-4 mb-2">
                    <div class="text-lg mb-2 md:mb-0">
                        <span class="font-semibold">{{ __('content.adulte') }} :</span>
                        <span>{{ $restaurant->prix_adulte }} €</span>
                    </div>
                    <div class="text-lg">
                        <span class="font-semibold">{{ __('content.enfant') }} :</span>
                        <span>{{ $restaurant->prix_enfant }} €</span>
                    </div>
                </div>
                <div class="text-center">{{ __('content.' . $dejeunerDescription) }}</div>
            </div>
   @endforeach
    
    </div>
    </div>


    <div class="bg-custom-vert md:h-screen w-full md:flex-row flex flex-col">
       
        <img class="w-[550px] h-full object-cover" src="{{ Storage::url('images/spa.jpg') }}" alt="Massage">
    
        <div class="flex flex-col justify-center p-8 md:p-0 px-8 md:px-16 text-center md:text-left">
            <h1 class="text-4xl text-white font-bold mb-4">{{ __('content.spa') }}</h1>
            <hr class="border-t-4 border-custom-beige w-32 mx-auto md:mx-0 mb-6">
    
            <div class="text-justify text-white max-w-lg mx-auto md:mx-0">
                {{ __('content.text-spa') }}
            </div>

            <div class="relative top-6"> 
                <a class="bg-white rounded text-custom-marron font-bold py-2 px-4 uppercase" href="{{ route('reserver') }}"> {{ __('content.reserver') }}</a>
                </div>
        </div>
    </div>


    <div style="background-color:#F9F4EE" class="md:h-screen w-full flex items-center">
        <div class="container mx-auto px-4 p-8">
            <div class="grid grid-cols-2 gap-x-14 gap-y-8"> 
                @foreach ($massages as $massage)
                    <div class="flex flex-col">
                        <div class="flex flex-col md:flex-row md:items-center">
                            <div class="font-bold text-custom-marron text-lg">{{ __('content.type_' . $massage->id) }}</div>
                            <hr class="h-1 w-2 bg-custom-marron mx-4 hidden md:block"/>
                            <div class="font-bold text-custom-marron text-lg">{{ $massage->duree }}min</div>
                            <div class="font-bold text-custom-marron text-lg md:ml-auto">{{ $massage->prix_adulte }}€</div>
                        </div>
                        <div class="text-justify mt-2 text-sm w-full">   {{ __('content.description_' . $massage->id) }}</div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    
    


    @endsection

