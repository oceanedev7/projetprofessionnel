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

            <form id="reservationForm" action="{{ route('info-client') }}" method="post"> <!-- Spécifiez votre route ici -->
                @csrf 

            <div class="max-w-4xl mx-auto border border-2 border-custom-marron rounded-lg bg-white mb-6 p-8">
                <div class="uppercase font-bold text-custom-marron text-xl ml-4">Restauration</div>
                <hr class="w-12 h-0.5 bg-custom-marron ml-2 mb-4">
        
                <div class="flex ml-4 space-x-8 mb-6">
                    <div class="w-60 bg-custom-beige rounded flex flex-col items-center p-4">
                        <div class="rounded-md">
                            <img class="mb-2 rounded-md" src="{{ Storage::url('images/dejeuner.jpg') }}" alt="">
                        </div>

                        
                        @if(isset($dejeuner))
                        <div class="text-white font-semibold text-center mb-4">{{$dejeuner->type}}</div>
        
                        <div class="flex flex-col space-y-1 mb-4 items-center">
                            <div class="text-white italic">~ Adultes ({{$dejeuner->prix_adulte}}€) ~</div>
                            <div class="flex space-x-4">
                                <button type="button" class="bg-white text-custom-marron font-black rounded flex justify-center items-center py-0 px-2" onclick="addDejAdulte(event)"> 
                                    <span> + </span>
                                </button>
                                <span class="text-custom-marron font-black" id="dejeunerAdulte">0</span> 
                                <input type="hidden" name="dejeuner_adulte" id="inputDejeunerAdulte" value="0"> <!-- Champ caché pour adultes -->
                                <button type="button" class="bg-white text-custom-marron font-black rounded flex justify-center items-center py-0 px-2" onclick="substractDejAdulte(event)"> 
                                    <span> - </span>
                                </button>
                            </div>
                        </div>
                        @endif
        
                        <div class="flex flex-col space-y-1 items-center">
                            <div class="text-white italic">~ Enfants ({{$dejeuner->prix_enfant}}€) ~</div>
                            <div class="flex space-x-4">
                                <button type="button" class="bg-white text-custom-marron font-black rounded flex justify-center items-center py-0 px-2" onclick="addDejEnfant(event)"> 
                                    <span> + </span>
                                </button>
                                <span class="text-custom-marron font-black" id="dejeunerEnfant">0</span> 
                                <input type="hidden" name="dejeuner_enfant" id="inputDejeunerEnfant" value="0"> <!-- Champ caché pour enfants -->
                                <button type="button" class="bg-white text-custom-marron font-black rounded flex justify-center items-center py-0 px-2" onclick="substractDejEnfant(event)"> 
                                    <span> - </span>
                                </button>
                            </div>
                        </div>
                    </div>
        
                    <div class="w-60 bg-custom-beige rounded flex flex-col items-center p-4">
                        <div class="rounded-md">
                            <img class="mb-2 rounded-md" src="{{ Storage::url('images/diner.jpg') }}" alt="">
                        </div>
                        @if(isset($diner))
                        <div class="text-white font-semibold text-center mb-4">{{$diner->type}}</div>
        
                        <div class="flex flex-col space-y-1 mb-4 items-center">
                            <div class="text-white italic">~ Adultes ({{$diner->prix_adulte}}€) ~</div>
                            <div class="flex space-x-4">
                                <button type="button" class="bg-white text-custom-marron font-black rounded flex justify-center items-center py-0 px-2" onclick="addDinAdulte(event)"> 
                                    <span> + </span>
                                </button>
                                <span class="text-custom-marron font-black" id="dinerAdulte">0</span> 
                                <input type="hidden" name="diner_adulte" id="inputDinerAdulte" value="0"> <!-- Champ caché pour adultes -->
                                <button type="button" class="bg-white text-custom-marron font-black rounded flex justify-center items-center py-0 px-2" onclick="substractDinAdulte(event)"> 
                                    <span> - </span>
                                </button>
                            </div>
                        </div>
                        @endif
        
                        <div class="flex flex-col space-y-1 items-center">
                            <div class="text-white italic">~ Enfants ({{$diner->prix_enfant}}€) ~</div>
                            <div class="flex space-x-4">
                                <button type="button" class="bg-white text-custom-marron font-black rounded flex justify-center items-center py-0 px-2" onclick="addDinEnfant(event)"> 
                                    <span> + </span>
                                </button>
                                <span class="text-custom-marron font-black" id="dinerEnfant">0</span> 
                                <input type="hidden" name="diner_enfant" id="inputDinerEnfant" value="0"> <!-- Champ caché pour enfants -->
                                <button type="button" class="bg-white text-custom-marron font-black rounded flex justify-center items-center py-0 px-2" onclick="substractDinEnfant(event)"> 
                                    <span> - </span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
        
                <div class="uppercase font-bold text-custom-marron text-xl ml-4">Spa</div>
                <hr class="w-12 h-0.5 bg-custom-marron ml-2 mb-4">
        
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 justify-items-center">

                    @foreach ($massages as $index => $massage)
                    <div class="w-60 bg-custom-beige rounded flex flex-col items-center p-4">
                        <div class="rounded-md">
                            <img class="mb-2 rounded-md" src="{{ Storage::url('images/resaspa.jpg') }}" alt="">
                        </div>
                        <div class="text-white font-medium mb-4 flex flex-col text-center">
                            {{ $massage->type }} 
                            <span>({{ $massage->duree }} min - {{ $massage->prix_adulte }} €)</span>
                        </div>
                        <div class="flex space-x-4">
                            <button type="button" class="bg-white text-custom-marron font-black rounded flex justify-center items-center py-0 px-2" onclick="SpaCount(event, {{ $index }}, 1)"> 
                                <span> + </span>
                            </button>
                            <span class="text-custom-marron font-black" id="spa{{ $index }}">0</span> 
                            <input type="hidden" name="spa_count[]" id="inputSpa{{ $index }}" value="0"> 
                            <button type="button" class="bg-white text-custom-marron font-black rounded flex justify-center items-center py-0 px-2" onclick="SpaCount(event, {{ $index }}, -1)"> 
                                <span> - </span>
                            </button>
                        </div>
                        
                    </div>
                @endforeach
                
        
                </div>


                <input type="hidden" name="nomCabane" value="{{ $nomCabane }}">
        <input type="hidden" name="capacite" value="{{ $capacite }}">
        <input type="hidden" name="prixTotal" value="{{ $prixTotal }}">
        <input type="hidden" name="dateArrivee" value="{{ $dateArrivee }}"> 
        <input type="hidden" name="dateDepart" value="{{ $dateDepart }}"> 
        <input type="hidden" name="duration" value="{{ $duration }}">
        <input type="hidden" name="nombreAdultes" value="{{ $nombreAdultes }}">
        <input type="hidden" name="nombreEnfants" value="{{ $nombreEnfants }}">

        
            <div class="flex justify-end mt-8">
                <button type="submit" class="text-white font-bold px-4 py-2 rounded-md bg-custom-marron uppercase" > Valider </button>
            </div>
        
            </div>
        </form>
        </div>
        

        <div>
            <div class="sticky top-24 border border-2 border-custom-marron rounded-lg p-6 ml-6" style="min-width: 300px;">
                <h2 class="font-bold mb-4 text-custom-marron uppercase italic">Récapitulatif de la réservation</h2>

                <div class="flex text-custom-marron font-bold space-x-2 uppercase justify-center">
                    
                        <div> {{ $nomCabane }} </div>
                        <div> - </div>
                        <div> {{ $capacite }} pers. </div>
                 
                </div>

                <div class="flex text-custom-marron space-x-3 justify-center">
                    <i class="fa-solid fa-mug-saucer mt-1"></i>
                    <div class="text-sm">Petit-déjeuner inclus</div>
                </div>

                <div class="flex flex-col mt-8 space-y-4">
                    <div class="flex justify-between">
                        <label class="font-bold text-custom-marron">Date d'arrivée :</label>
                        <div class="font-semibold text-custom-marron"> {{ \Carbon\Carbon::parse($dateArrivee)->format('d/m/Y') }}</div>
                    </div>

                    <div class="flex justify-between">
                        <label class="font-bold text-custom-marron">Date de départ :</label>
                        <div class="font-semibold text-custom-marron"> {{ \Carbon\Carbon::parse($dateDepart)->format('d/m/Y') }}</div>
                    </div>

                    <div class="flex justify-between">
                        <label class="font-bold text-custom-marron">Durée :</label>
                        <div class="font-semibold text-custom-marron"> {{ $duration }} nuit(s) </div>
                    </div>

                    <div class="flex justify-between">
                        <label class="font-bold text-custom-marron">Nombre de pers. :</label>
                        <div class="flex flex-col">
                            <div class="flex space-x-2">
                                <label class="text-custom-marron text-sm mt-1">Adultes :</label>
                                <div class="font-semibold text-custom-marron mt-0.5"> {{ $nombreAdultes }} </div>
                            </div>

                            <div class="flex space-x-2">
                                <label class="text-custom-marron text-sm mt-1">Enfants :</label>
                                <div class="font-semibold text-custom-marron mt-0.5"> {{ $nombreEnfants }} </div>
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
                        <div class="font-black text-custom-marron text-xl"> {{ $prixTotal }} € </div>
                    </div>
                </div>

                <p class="italic text-sm">Taxes de séjour non incluses</p>
            </div>
        </div>
    </div>


@endsection



</body>
</html>


<script>
    var dejeunerAdulte = 0;
    var dejeunerEnfant = 0;
    var dinerAdulte = 0;
    var dinerEnfant = 0;
    const spaCounts = Array.from({ length: {{ count($massages) }} }, () => 0);

   
    function addDejAdulte(event){
        event.preventDefault();
        dejeunerAdulte++;
       document.getElementById("dejeunerAdulte").innerHTML = dejeunerAdulte;
       document.getElementById("inputDejeunerAdulte").value = dejeunerAdulte; // Met à jour le champ caché
    }

    function addDejEnfant(event){
        event.preventDefault();
           dejeunerEnfant++;
      
       document.getElementById("dejeunerEnfant").innerHTML = dejeunerEnfant;
       document.getElementById("inputDejeunerEnfant").value = dejeunerEnfant; // Met à jour le champ caché
       
    }

    function addDinAdulte(event){
        event.preventDefault();
        dinerAdulte++;
       document.getElementById("dinerAdulte").innerHTML = dinerAdulte;
       document.getElementById("inputDinerAdulte").value = dinerAdulte; // Met à jour le champ caché
    }

    function addDinEnfant(event){
        event.preventDefault();
           dinerEnfant++;
      
       document.getElementById("dinerEnfant").innerHTML = dinerEnfant;
       document.getElementById("inputDinerEnfant").value = dinerEnfant; // Met à jour le champ caché
       
    }

    function substractDejAdulte(event){
        event.preventDefault();
        if (dejeunerAdulte > 0) {
            dejeunerAdulte--;
    }
       document.getElementById("dejeunerAdulte").innerHTML = dejeunerAdulte;
       document.getElementById("inputDejeunerAdulte").value = dejeunerAdulte; // Met à jour le champ caché
    }

    function substractDejEnfant(event){
        event.preventDefault();
        if (dejeunerEnfant > 0) {
            dejeunerEnfant--;
    }
      document.getElementById("dejeunerEnfant").innerHTML = dejeunerEnfant;
      document.getElementById("inputDejeunerEnfant").value = dejeunerEnfant; // Met à jour le champ caché
    }

    function substractDinAdulte(event){
        event.preventDefault();
        if (dinerAdulte > 0) {
        dinerAdulte--;
    }
       document.getElementById("dinerAdulte").innerHTML = dinerAdulte;
       document.getElementById("inputDinerAdulte").value = dinerAdulte; // Met à jour le champ caché
    }

    function substractDinEnfant(event) {
        event.preventDefault();
    if (dinerEnfant > 0) {
        dinerEnfant--;
    }
    document.getElementById("dinerEnfant").innerHTML = dinerEnfant;
    document.getElementById("inputDinerEnfant").value = dinerEnfant; // Met à jour le champ caché
    }

   
function SpaCount(event, index, change) {
    event.preventDefault();
   
    spaCounts[index] += change;
    
    if (spaCounts[index] < 0) {
        spaCounts[index] = 0;
    }

    document.getElementById("spa" + index).innerHTML = spaCounts[index];
    document.getElementById("inputSpa" + index).value = spaCounts[index]; // Met à jour le champ caché
}
   
    </script>