@extends('layouts.main')

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Réservation</title>
</head>
<body>

    @section('navbar')
    <div class="fixed z-10 w-full"> 
        <a href="{{ route('menu') }}" class="absolute top-8 left-8 bg-gray-800 bg-opacity-65 text-white py-2.5 px-3 border-none rounded-md w-12 text-base inline-block text-center"><i class="fa-solid fa-bars"></i></a>    
        {{-- <a class="absolute top-8 right-24 bg-gray-400 bg-opacity-65 text-white py-2.5 px-3 font-bold border-none inline-block text-center rounded w-12 tracking-wide text-base"> <i class="fa-solid fa-user"></i> </a>  --}}
        @if(Auth::check())
        <div class="hidden sm:flex sm:items-center sm:ms-6 absolute top-9 right-24">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-bold rounded-md bg-custom-marron bg-opacity-90 text-white focus:outline-none transition ease-in-out duration-150">
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
                        {{ __('Mon profil') }}
                    </x-dropdown-link>
    
                    <!-- Déconnexion -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Se déconnecter') }}
                        </x-dropdown-link>
                    </form>
                </x-slot>
            </x-dropdown>
        </div>
    @else
        <a href="{{ route('login') }}" class="absolute top-8 right-24 bg-gray-800 bg-opacity-65 text-white py-2.5 px-3 font-bold border-none inline-block text-center rounded w-12 tracking-wide text-base">
            <i class="fa-solid fa-user"></i>
        </a>
    @endif
       
       
        <a class="absolute top-8 right-8 bg-gray-800 bg-opacity-65 text-white py-2.5 px-3 font-bold border-none inline-block text-center rounded w-12 tracking-wide text-base"> EN </a> 
    </div>
@endsection

@section('main')

<a href="#"> Modifier ma réservation</a>


    <div class="flex flex-row p-6 mt-12">
        <div class="flex-grow">
            <div class="max-w-4xl mx-auto border border-2 border-custom-marron rounded-lg bg-white mb-6 p-8">
                <div class="uppercase text-custom-marron font-bold text-xl">Informations client</div>
                
                <form class="flex flex-col w-full space-y-4">
                    @csrf
                    <div class="flex space-x-6">
                        <input 
                            class="w-full rounded border-custom-marron border-solid border-2 py-2 px-4 focus:border-custom-vert focus:ring-custom-vert" 
                            placeholder="Prénom" 
                            value="{{ Auth::user()->prenom ?? '' }}"
                        >
                        <input 
                            class="w-full rounded border-custom-marron border-solid border-2 py-2 px-4 focus:border-custom-vert focus:ring-custom-vert" 
                            placeholder="Nom" 
                            value="{{ Auth::user()->nom ?? '' }}"
                        >
                    </div>
                    <div class="flex space-x-6">
                        <input 
                            class="w-full rounded border-custom-marron border-solid border-2 py-2 px-4 focus:border-custom-vert focus:ring-custom-vert" 
                            placeholder="Numéro de téléphone" 
                            value="{{ Auth::user()->telephone ?? '' }}"
                        >
                        <input 
                            class="w-full rounded border-custom-marron border-solid border-2 py-2 px-4 focus:border-custom-vert focus:ring-custom-vert" 
                            placeholder="Adresse email" 
                            value="{{ Auth::user()->email ?? '' }}"
                        >
                    </div>
                    
                    <input 
                        class="rounded border-custom-marron border-solid border-2 py-2 px-4 focus:border-custom-vert focus:ring-custom-vert" 
                        placeholder="Adresse postale" 
                        value="{{ Auth::user()->adresse_postale ?? '' }}"
                    >
        
                    <div class="flex space-x-6">
                        <input 
                            class="w-full rounded border-custom-marron border-solid border-2 py-2 px-4 focus:border-custom-vert focus:ring-custom-vert" 
                            placeholder="Code postal" 
                            value="{{ Auth::user()->code_postal ?? '' }}"
                        >
                        <input 
                            class="w-full rounded border-custom-marron border-solid border-2 py-2 px-4 focus:border-custom-vert focus:ring-custom-vert" 
                            placeholder="Ville" 
                            value="{{ Auth::user()->ville ?? '' }}"
                        >
                    </div>
        
                    <textarea 
                        rows="8" 
                        class="resize-none rounded border-custom-marron border-solid border-2 py-2 px-4 focus:border-custom-vert focus:ring-custom-vert" 
                        placeholder="Message"></textarea>
        
                    <a class="bg-custom-marron text-white font-bold rounded py-2 px-4 text-center">Valider ma réservation</a>
                </form>
            </div>
        </div>

        
        <div>
            <div class="sticky top-24 border border-2 border-custom-marron rounded-lg p-6 ml-6" style="min-width: 300px;">
                <h2 class="font-bold mb-4 text-custom-marron uppercase italic">Récapitulatif de la réservation</h2>

                <div class="flex text-custom-marron font-bold space-x-2 uppercase justify-center">
                    
                        <div> {{ $nomCabane }}</div>
                        <div> - </div>
                        <div> {{  $capacite }} pers. </div>



                 
                </div>

                <div class="flex text-custom-marron space-x-3 justify-center">
                    <i class="fa-solid fa-mug-saucer mt-1"></i>
                    <div class="text-sm">Petit-déjeuner inclus</div>
                </div>

                <div class="flex flex-col mt-8 space-y-4">
                    <div class="flex justify-between">
                        <label class="font-bold text-custom-marron">Date d'arrivée :</label>
                        <div class="font-semibold text-custom-marron">{{ \Carbon\Carbon::parse($dateArrivee)->format('d/m/Y') }} </div>
                    </div>

                    <div class="flex justify-between">
                        <label class="font-bold text-custom-marron">Date de départ :</label>
                        <div class="font-semibold text-custom-marron">{{ \Carbon\Carbon::parse($dateDepart)->format('d/m/Y') }}</div>
                    </div>

                    <div class="flex justify-between">
                        <label class="font-bold text-custom-marron">Durée :</label>
                        <div class="font-semibold text-custom-marron">{{ $duration }} nuit(s) </div>
                    </div>

                    <div class="flex justify-between">
                        <label class="font-bold text-custom-marron">Nombre de pers. :</label>
                        <div class="flex flex-col">
                            <div class="flex space-x-2">
                                <label class="text-custom-marron text-sm mt-1">Adultes :</label>
                                <div class="font-semibold text-custom-marron mt-0.5">{{ $nombreAdultes }} </div>
                            </div>

                            <div class="flex space-x-2">
                                <label class="text-custom-marron text-sm mt-1">Enfants :</label>
                                <div class="font-semibold text-custom-marron mt-0.5"> {{ $nombreEnfants }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-col">
                    <label class="font-bold text-custom-marron mb-4">Extras :</label>

                    <div class="uppercase text-center underline mb-2">Restauration</div>

                    <div class="italic mb-4">  
                        <div class="flex justify-between"> 
                            <div class="font-semibold text-custom-marron">Déjeuners Adulte : </div>
                            <div>{{ $extras['dejeuner_adulte'] }} x {{$dejeuner->prix_adulte}} €</div>
                        </div>

                        <div class="flex justify-between"> 
                            <div class="font-semibold text-custom-marron">Déjeuners Enfant : </div>
                            <div>{{ $extras['dejeuner_enfant'] }} x  {{$dejeuner->prix_enfant}} €</div>
                        </div>
                     
                        <div class="flex justify-between"> 
                            <div class="font-semibold text-custom-marron">Diners Adulte : </div>
                            <div>{{ $extras['diner_adulte'] }} x {{$diner->prix_adulte}} € </div>
                        </div>

                        <div class="flex justify-between mb-6"> 
                            <div class="font-semibold text-custom-marron">Diners Enfant : </div>
                            <div>{{ $extras['diner_enfant'] }} x {{$diner->prix_enfant}} €</div>
                        </div>
                     

                        <div class="flex flex-col">
                            <div class="uppercase text-center underline mb-2">Spa </div>

                            @foreach($extras['spa_counts'] as $index => $count)
                            <div class="flex justify-between">
                                <div class="font-semibold text-custom-marron">{{ $massages[$index]->type }}</div>
                                <div>{{ $count }} x {{ $massages[$index]->prix_adulte }} € </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="flex justify-between"> 
                        <div class="italic font-black text-custom-marron"> Total des extras :  </div>
                        <div class="font-black text-custom-marron"> {{ $totalExtra }} € </div>
                    </div>
                </div>

                <div class="flex flex-col mt-4 space-y-2">
                    <hr class="border-1 h-0.5 bg-custom-marron">

                    <div class="flex justify-between">
                        <label class="font-black text-custom-marron uppercase text-xl">Total :</label>
                        <div class="font-black text-custom-marron text-xl">  {{ $prixFinal }} €</div>
                    </div>
                </div>

                <p class="italic text-sm">Taxes de séjour non incluses</p>
            </div>
        </div>
    </div>
 </div>

@endsection



</body>
</html>

