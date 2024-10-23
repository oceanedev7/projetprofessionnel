@extends('layouts.main')


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

<a href="{{route('reserver')}}"> Modifier ma réservation</a>
    
    @if($availableCabanes->isEmpty())
    <p>Aucune cabane disponible pour cette période.</p>
@else

<div class="flex flex-row p-6 mt-12">
   
    <div class="flex-grow">
        @foreach($availableCabanes as $cabane)
        <div class="max-w-4xl border border-2 border-custom-marron rounded-lg bg-white mb-6">
            <div class="flex">
                <div>
                    <img class="max-w-sm rounded" src="{{ Storage::url('images/cabaneeden.jpg') }}" alt="">
                </div>

                <div class="flex flex-col p-8 justify-center">
                    <div class="flex flex-col space-y-4">
                        <div class="flex text-custom-marron text-2xl font-black space-x-2 uppercase">
                            <div> {{ $cabane->nomCabane }} </div> 
                            <div> - </div>
                            <div> {{ $cabane->capacite }} pers. </div>
                        </div>

                        <div class="flex text-custom-marron space-x-3"> 
                            <i class="fa-solid fa-mug-saucer mt-1"></i>
                            <div>Petit-déjeuner inclus</div>
                        </div>
                        <div class="max-w-sm text-custom-marron text-justify text-sm"> {{ $cabane->description }} </div>
                    </div>

                    <div class="flex mt-12 justify-between items-center"> 
                        <div class="flex flex-col">
                            <div class="text-custom-marron"> Pour {{ $nombreNuitees }} nuit(s) </div>
                            <div class="font-black text-2xl text-custom-marron "> {{ $cabane->prixTotal }} €  </div>
                            <div class="italic text-custom-marron"> Taxes de séjour non incluses </div>
                        </div>

                        <form action="{{ route('extras') }}" method="POST">
                            @csrf
                            <input type="hidden" name="nomCabane" value="{{ $cabane->nomCabane }}">
                            <input type="hidden" name="capacite" value="{{ $cabane->capacite }}">
                            <input type="hidden" name="prixTotal" value="{{ $cabane->prixTotal }}">
                            <input type="hidden" name="dateArrivee" value="{{ $dateArrivee}}"> 
                            <input type="hidden" name="dateDepart" value="{{ $dateDepart}}"> 
                            <input type="hidden" name="nombreNuitees" value="{{ $nombreNuitees }}">
                            <input type="hidden" name="nombreAdultes" value="{{ $nombreAdultes }}">
                            <input type="hidden" name="nombreEnfants" value="{{ $nombreEnfants }}">
                        
                            <button class="bg-custom-marron text-white font-bold rounded py-2 px-4 text-center uppercase" type="submit">Réserver</button>
                        </form>
                        

                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

   

<div>
    <div class="sticky top-24 border border-2 border-custom-marron rounded-lg p-6 ml-6" style="min-width: 300px;">
        <h2 class="font-bold mb-4 text-custom-marron uppercase italic">Récapitulatif de la réservation</h2>
        
        
        <div class="flex text-custom-marron font-bold space-x-2 uppercase justify-center">
           
                <div> </div> 
                <div> - </div>
                <div>  pers. </div>
          
        </div>

        <div class="flex text-custom-marron space-x-3 justify-center"> 
            <i class="fa-solid fa-mug-saucer mt-1"></i>
            <div class="text-sm">Petit-déjeuner inclus</div>
        </div>
        
        <div class="flex flex-col mt-8 space-y-4">

        <div class="flex justify-between">
        <label class="font-bold text-custom-marron">Date d'arrivée :</label>
        <div class="font-semibold text-custom-marron">
            {{ \Carbon\Carbon::parse($dateArrivee)->format('d/m/Y') }}
        </div>
        </div>

        <div class="flex justify-between">
            <label class="font-bold text-custom-marron">Date de départ :</label>
            <div class="font-semibold text-custom-marron">
                {{ \Carbon\Carbon::parse($dateDepart)->format('d/m/Y') }}
            </div>
        </div>

        <div class="flex justify-between">
            <label class="font-bold text-custom-marron">Durée :</label>
            <div class="font-semibold text-custom-marron"> {{ $nombreNuitees }} nuit(s) </div>
        </div>

        <div class="flex justify-between">
            <label class="font-bold text-custom-marron">Nombre de pers. :</label>

            <div class="flex flex-col"> 

                <div class="flex space-x-2">
            <label class="text-custom-marron text-sm mt-1">Adultes :</label>
            <div  class="font-semibold text-custom-marron mt-0.5">{{ $nombreAdultes }}  </div>
                </div>

                <div class="flex space-x-2">
            <label class="text-custom-marron text-sm mt-1">Enfants :</label>
            <div class="font-semibold text-custom-marron mt-0.5">{{ $nombreEnfants }} </div>
        </div>
            </div>
        </div>


        </div>

        <div class="flex justify-between">
            <label class="font-bold text-custom-marron">Extras :</label>
            <div class="font-semibold text-custom-marron">  </div>
        </div>

        <div class="flex flex-col mt-4 space-y-2">
        <hr class="border-1 h-0.5 bg-custom-marron">

        <div class="flex justify-between">
            <label class="font-black text-custom-marron uppercase text-xl">Total :</label>
            <div class="font-black text-custom-marron text-xl"> € </div>
        </div> 
        </div>
        
        <p class="italic text-sm">Taxes de séjour non incluses</p>

    </div>
</div>
</div>

@endif

    @endsection
