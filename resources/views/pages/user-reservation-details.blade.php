<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>Tout Là-Haut</title>
</head>
<body>
    <div class="fixed z-10 w-full"> 
        <a href="{{ route('menu') }}" class="absolute top-8 left-8 bg-custom-vert bg-opacity-90 text-white py-2.5 px-3 border-none rounded-md w-12 text-base inline-block text-center"><i class="fa-solid fa-bars"></i></a>    

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
         
        <a href="{{ route('reserver') }}" class="absolute top-8 right-6 bg-custom-vert bg-opacity-90 tracking-widest text-white py-3 px-3 border-none rounded w-30 font-semibold text-sm uppercase"> {{ __('content.reserver') }}  </a>  
    </div>

    <div class="w-full bg-custom-beige p-12"> 
        <div class="flex space-x-2 hover:underline underline-white text-white absolute top-10 left-28"> 
            <i class="fa-solid fa-arrow-left mt-1 "></i>
                <a href="{{ route('user-reservation') }}" class="font-bold ">{{ __('content.resa_list') }}</a>
        </div> 
        
        <div class="text-center uppercase text-3xl font-black text-white mb-14 relative top-8"> {{ __('content.resa_detail_titre') }} </div>
    
        <div class="mx-72 items-center flex flex-col bg-white rounded-lg shadow-md p-6 space-y-8">

            <div> 
                <img class="rounded-lg" src="{{ Storage::url('images/caroussel1.jpg') }}" alt="Chambre">
            </div>
    
        <div class="flex flex-col items-center">
            <div class="font-bold uppercase mb-4"> {{ __('content.info') }} </div>
            <p><span class="font-medium">{{ __('content.prenom') }} :</span> {{ $reservation->user->prenom ?? $reservation->guest->prenom }}</p>
            <p><span class="font-medium">{{ __('content.nom') }} :</span> {{ $reservation->user->nom ?? $reservation->guest->nom }}</p>
            <p><span class="font-medium">{{ __('content.adresse-postale') }} :</span>
                {{ $reservation->user->adresse_postale ?? $reservation->guest->adresse_postale }}, 
                {{ $reservation->user->ville ?? $reservation->guest->ville }}
                {{ $reservation->user->code_postal ?? $reservation->guest->code_postal}}
            </p>
            <p><span class="font-medium">{{ __('content.telephone') }} :</span> {{ $reservation->user->telephone ?? $reservation->guest->telephone }}</p>
            <p><span class="font-medium">{{ __('content.email') }} :</span> {{ $reservation->user->email ?? $reservation->guest->email }}</p>
    
        </div>
    
        <div class="flex flex-col items-center ">
            <div class="font-bold uppercase mb-4"> {{ __('content.resa_detail_titre') }} </div>

            <div class="font-semibold ml-10 italic underline mb-2">{{ __('content.hebergement') }} </div>
    
            <p><span class="font-medium">{{ __('content.hebergement') }} :</span> {{ __('content.nom_cabane_' . lcfirst(str_replace(' ', '', $reservation->nomCabane))) }}</p>
            <p><span class="font-medium">{{ __('content.arrivee') }}:</span> {{ \Carbon\Carbon::parse($reservation->dateArrivee)->format('d/m/Y') }}</p>
            <p><span class="font-medium">{{ __('content.depart') }} :</span> {{ \Carbon\Carbon::parse($reservation->dateDepart)->format('d/m/Y') }}</p>
            <p><span class="font-medium">{{ __('content.n-nuit') }} :</span> {{  $reservation->nombreNuitees }} {{ __('content.nuit') }}</p>
            <p><span class="font-medium">{{ __('content.n-adulte') }} :</span> {{  $reservation->nombreAdultes }} {{ __('content.adultes') }}</p>
            @if($reservation->nombreEnfants > 0)
                <p><span class="font-medium">{{ __('content.n-enfant') }} :</span> {{  $reservation->nombreEnfants }} {{ __('content.enfants-1') }}</p>
            @endif
        </div>
    
    
        <div class="flex flex-col items-center">
            <div class="font-semibold ml-10 italic underline mb-2"> {{ __('content.extra') }} </div>
    
         @foreach($reservation->prestations as $prestation)
         
         @if($prestation->pivot->type === 'Adulte')
         <div class="flex space-x-1">
            <div class="flex font-semibold space-x-1">
         <div>
            @php
                $parts = explode(":", $prestation->type);  
            @endphp
            {{ trim($parts[0]) }}  
        </div>
        
            <div>{{$prestation->pivot->type}} :</div>
         </div>
                <div>{{$prestation->pivot->quantite}}</div> <span> x </span>  <div>{{$prestation->prix_adulte}}€ </div> 
         </div>
        @endif
    
        @if($prestation->pivot->type === 'Enfant')
        <div class="flex space-x-1">
            <div class="flex font-semibold space-x-1">
         <div>
            @php
                $parts = explode(":", $prestation->type);  
            @endphp
            {{ trim($parts[0]) }}  
        </div>
            <div>{{$prestation->pivot->type}} :</div>
        </div>
            <div>{{$prestation->pivot->quantite}}</div> <span> x </span> <div>{{$prestation->prix_enfant}}€</div>
        </div>
        @endif
    
    
        @if($prestation->pivot->type === 'Massage')
        <div class="flex space-x-1">
            <div class="flex font-semibold space-x-1">
         <div>
            @php
                $parts = explode(":", $prestation->type);  
            @endphp
            {{ trim($parts[0]) }}  
        </div>
            <div>{{$prestation->pivot->type}} :</div>
        </div>
            <div>{{$prestation->pivot->quantite}}</div> <span> x </span> <div>{{$prestation->prix_adulte}}€</div>
        </div>
        @endif
    
    @endforeach
        </div>

        <p><span class="font-medium">Message :</span> {{  $reservation->message }}</p>

        <p class="font-bold uppercase text-xl"><span class="font-bold uppercase">{{ __('content.prix_total') }}  :</span> {{ $reservation->prix }}€</p>

        <a href="{{route ('supprimer-user-reservation', $reservation->id)}}" class="hover:bg-red-500 w-full text-center uppercase bg-red-600 text-white font-bold p-2 rounded">{{ __('content.annuler') }}</a>
    
    
    </div>
</body>
</html>