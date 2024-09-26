@extends('layouts.main')

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cabanes Disponibles</title>
</head>
<body>

    @section('navbar')
    <div class="fixed z-10 w-full"> 
        <a href="{{ route('menu') }}" class="absolute top-8 left-8 bg-gray-400 bg-opacity-65 text-white py-2.5 px-3 border-none rounded-md w-12 text-base inline-block text-center"><i class="fa-solid fa-bars"></i></a>    
        {{-- <a class="absolute top-8 right-24 bg-gray-400 bg-opacity-65 text-white py-2.5 px-3 font-bold border-none inline-block text-center rounded w-12 tracking-wide text-base"> <i class="fa-solid fa-user"></i> </a>  --}}
        @if(Auth::check())
        <div class="hidden sm:flex sm:items-center sm:ms-6 absolute top-9 right-24">
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
        <a href="{{ route('login') }}" class="absolute top-8 right-24 bg-gray-400 bg-opacity-65 text-white py-2.5 px-3 font-bold border-none inline-block text-center rounded w-12 tracking-wide text-base">
            <i class="fa-solid fa-user"></i>
        </a>
    @endif
       
       
        <a class="absolute top-8 right-8 bg-gray-400 bg-opacity-65 text-white py-2.5 px-3 font-bold border-none inline-block text-center rounded w-12 tracking-wide text-base"> EN </a> 
    </div>
@endsection


@section('main')

<a href="{{route('reserver')}}"> Modifier ma réservation</a>
    {{-- <h1>Cabanes disponibles du {{ $dateArrivee }} au {{ $dateDepart }}</h1>  

    <p>Nombre d'adultes : {{ $nombreAdultes }}</p>
    <p>Nombre d'enfants : {{ $nombreEnfants }}</p> --}}

    
    @if($availableCabanes->isEmpty())
    <p>Aucune cabane disponible pour cette période.</p>
@else

<div class="flex flex-row p-6 mt-12">
    <!-- Section des cabanes disponibles -->
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
                            <div class="text-custom-marron"> Pour {{ $duration }} nuit(s) </div>
                            <div class="font-black text-2xl text-custom-marron "> {{ $cabane->prixTotal }} €  </div>
                            <div class="italic text-custom-marron"> Taxes de séjour non incluses </div>
                        </div>

                        <div>
                            <button type="submit"  class="text-white font-bold text-sm px-4 py-2 rounded-md bg-custom-marron">Réserver</button>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

<div>
    <div class="sticky top-24 border border-2 border-custom-marron rounded-lg p-6 ml-6" style="min-width: 300px;">
        <h2 class="font-bold mb-4 text-custom-marron uppercase">Récapitulatif de la réservation</h2>
        
        <div class="flex text-custom-marron font-bold space-x-2 uppercase justify-center mb-4">
            @if(isset($cabane))
                <div> {{ $cabane->nomCabane }} </div> 
                <div> - </div>
                <div> {{ $cabane->capacite }} pers. </div>
            @endif
        </div>

        <div class="flex text-custom-marron space-x-3 justify-center"> 
            <i class="fa-solid fa-mug-saucer mt-1"></i>
            <div>Petit-déjeuner inclus</div>
        </div>

        <div class="flex justify-between">
        <label class="font-bold text-custom-marron">Date d'arrivée :</label>
        <div class="font-semibold text-custom-marron">  {{ \Carbon\Carbon::parse($dateArrivee)->format('d/m/Y') }}</div>
        </div>

        <div class="flex justify-between">
            <label class="font-bold text-custom-marron">Date de départ :</label>
            <div class="font-semibold text-custom-marron">  {{ \Carbon\Carbon::parse($dateDepart)->format('d/m/Y') }}</div>
        </div>

        <div class="flex justify-between">
            <label class="font-bold text-custom-marron">Nombre de pers. :</label>

            <div class="flex flex-col"> 

                <div class="flex space-x-2">
            <label class="text-custom-marron">Adultes :</label>
            <div  class="font-semibold text-custom-marron"> {{ $nombreAdultes }} </div>
                </div>

                <div class="flex space-x-2">
            <label class="text-custom-marron">Enfants :</label>
            <div> {{ $nombreEnfants  }} </div>
        </div>
            </div>
        </div>


        <div class="flex justify-between">
            <label class="font-bold text-custom-marron">Durée :</label>
            <div class="font-semibold text-custom-marron"> {{ $duration }} nuit(s) </div>
        </div>

        
        <p class="font-bold text-lg">Total : {{ $cabane->prixTotal}} €</p>
        <p class="italic">Taxes de séjour non incluses.</p>
    </div>
</div>
</div>

@endif


  

        

    @endsection
</body>
</html>
