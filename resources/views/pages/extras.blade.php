@extends('layouts.main')

@section('title', __('content.extra'))

    @section('navbar')
    <div class="z-10 w-full"> 
        <a href="{{ route('menu') }}" class="absolute top-4 left-8 bg-gray-800 bg-opacity-65 text-white py-3.5 px-3 border-none rounded-md w-12 text-base inline-block text-center"><i class="fa-solid fa-bars"></i></a>    
        @if(Auth::check())
        <div class="hidden sm:flex sm:items-center sm:ms-6 absolute top-6 right-24">
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
        <a href="{{ route('login') }}" class="absolute top-4 right-24 bg-gray-800 bg-opacity-65 text-white py-3.5 px-3 font-bold border-none inline-block text-center rounded w-12 tracking-wide text-base">
            <i class="fa-solid fa-user"></i>
        </a>
    @endif
       
       
    <a href="{{ route('lang.switch', ['lang' => App::getLocale() === 'en' ? 'fr' : 'en']) }}" 
        class="absolute top-4 right-8 bg-gray-800 bg-opacity-65 text-white py-2.5 px-3 font-bold border-none inline-block text-center rounded w-12 tracking-wide text-base">
         {{ App::getLocale() === 'en' ? 'FR' : 'EN' }}
     </a>   

    </div>
@endsection

@section('main')

    <div class="flex flex-row p-6 mt-12">
        <div class="flex-grow">

            <form id="reservationForm" action="{{ route('info-client') }}" method="post"> 
                @csrf 

            <div class="max-w-4xl mx-auto border border-2 border-custom-marron rounded-lg bg-white mb-6 p-8">
                <div class="uppercase font-bold text-custom-marron text-xl ml-4">{{ __('content.restauration') }} </div>
                <hr class="w-12 h-0.5 bg-custom-marron ml-2 md:mb-4 mb-8">

        
                <div class="md:flex md:flex-row flex flex-col md:ml-4 md:space-x-8 md:mb-6 mb-8 space-y-8 md:space-y-0 items-center">


                    @foreach ($restaurants as $index => $restaurant)
                
                    <div class="w-60 bg-custom-beige rounded flex flex-col items-center p-4">
                        <div class="rounded-md">
                            <img class="mb-2 rounded-md" src="{{ Storage::url('images/dejeuner.jpg') }}" alt="">
                        </div>
                
                        <div class="text-white font-semibold text-center mb-4">
                            @if ($restaurant->type == 'Déjeuner : Panier du Terroir (11H à 13H30)')
                            {{ __('content.restaurant_panier_du_terroir') }}
                        @elseif ($restaurant->type == 'Dîner : Panier Gourmand (19H à 21H)')
                            {{ __('content.restaurant_panier_gourmand') }}
                        @endif    
                        </div>
                
                        <div class="flex flex-col space-y-1 mb-4 items-center">
                            <div class="text-white italic">~ {{ __('content.adultes') }} ({{ $restaurant->prix_adulte }}€) ~</div>
                            <div class="flex space-x-4">
                                <button type="button" class="bg-white text-custom-marron font-black rounded flex justify-center items-center py-0 px-2"  onclick="cateringAdultCount(event, {{ $index }}, -1)"> 
                                    <span> - </span>
                                </button>
                                <span class="text-custom-marron font-black" id="cateringAdult{{ $index }}">0</span> 
                                <input type="hidden" name="catering_adult[]" id="inputcateringAdult{{ $index }}" value="0"> 
                                <button type="button" class="bg-white text-custom-marron font-black rounded flex justify-center items-center py-0 px-2"  onclick="cateringAdultCount(event, {{ $index }}, 1)"> 
                                    <span> + </span>
                                </button>
                            </div>
                        </div>
                
                        <div class="flex flex-col space-y-1 items-center">
                            <div class="text-white italic">~ {{ __('content.enfants-1') }} ({{ $restaurant->prix_enfant }}€) ~</div>
                            <div class="flex space-x-4">
                                <button type="button" class="bg-white text-custom-marron font-black rounded flex justify-center items-center py-0 px-2" onclick="cateringChildCount(event, {{ $index }}, -1)"> 
                                    <span> - </span>
                                </button>
                                <span class="text-custom-marron font-black" id="cateringChild{{ $index }}">0</span> 
                                <input type="hidden" name="catering_child[]" id="inputcateringChild{{ $index }}" value="0"> 
                                <button type="button" class="bg-white text-custom-marron font-black rounded flex justify-center items-center py-0 px-2" onclick="cateringChildCount(event, {{ $index }}, 1)"> 
                                    <span> + </span>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
         

                </div>
        
                <div class="uppercase font-bold text-custom-marron text-xl ml-4">Spa</div>
                <hr class="w-12 h-0.5 bg-custom-marron ml-2 md:mb-4 mb-8">
        
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 justify-items-center">

                    @foreach ($massages as $index => $massage)
                    <div class="w-60 bg-custom-beige rounded flex flex-col items-center p-4">
                        <div class="rounded-md">
                            <img class="mb-2 rounded-md" src="{{ Storage::url('images/resaspa.jpg') }}" alt="Prestation Spa">
                        </div>
                        <div class="text-white font-medium mb-4 flex flex-col text-center">
                         {{ __('content.type_' . $massage->id) }}
                            <span>({{ $massage->duree }} min - {{ $massage->prix_adulte }} €)</span>
                        </div>
                        <div class="flex space-x-4">
                            <button type="button" class="bg-white text-custom-marron font-black rounded flex justify-center items-center py-0 px-2" onclick="SpaCount(event, {{ $index }}, -1)"> 
                                <span> - </span>
                            </button>
                            <span class="text-custom-marron font-black" id="spa{{ $index }}">0</span> 
                            <input type="hidden" name="spa_count[]" id="inputSpa{{ $index }}" value="0"> 
                            <button type="button" class="bg-white text-custom-marron font-black rounded flex justify-center items-center py-0 px-2" onclick="SpaCount(event, {{ $index }}, 1)"> 
                                <span> + </span>
                            </button>
                        </div>
                        
                    </div>
                @endforeach
                
        
                </div>

        <input type="hidden" name="capacite" value="{{ $capacite }}">
        <input type="hidden" name="prixTotal" value="{{ $prixTotal }}">
        <input type="hidden" name="dateArrivee" value="{{ $dateArrivee }}"> 
        <input type="hidden" name="dateDepart" value="{{ $dateDepart }}"> 
        <input type="hidden" name="nombreNuitees" value="{{ $nombreNuitees }}">
        <input type="hidden" name="nombreAdultes" value="{{ $nombreAdultes }}">
        <input type="hidden" name="nombreEnfants" value="{{ $nombreEnfants }}">
        <input type="hidden" name="cabane_id" value="{{ $cabane->id }}">
        
            <div class="flex md:justify-end justify-center mt-8">
                <button type="submit" class="text-white font-bold px-4 py-2 rounded-md bg-custom-marron uppercase" > {{ __('content.valider') }} </button>
            </div>
        
            </div>
        </form>
        </div>
        

        <div class="hidden md:block">
            <div class="sticky top-16 border border-2 border-custom-marron rounded-lg p-6 ml-6" style="min-width: 300px;">
                <h2 class="font-bold mb-4 text-center text-custom-marron uppercase italic">{{ __('content.recap') }}</h2>

                <div class="flex text-custom-marron font-bold space-x-2 uppercase justify-center">
                    
                        <div> {{ __('content.nom_cabane_' . lcfirst(str_replace(' ', '',  $cabane->nomCabane))) }} </div>
                        <div> - </div>
                        <div> {{ $capacite }}  {{ __('content.pax') }} </div>
                 
                </div>

                <div class="flex text-custom-marron space-x-3 justify-center">
                    <i class="fa-solid fa-mug-saucer mt-1"></i>
                    <div class="text-sm">{{ __('content.pdj') }}</div>
                </div>

                <div class="flex flex-col mt-8 space-y-4">
                    <div class="flex justify-between">
                        <label class="font-bold text-custom-marron">{{ __('content.arrivee') }} :</label>
                        <div class="font-semibold text-custom-marron">
                            @if ( App::getLocale() === 'en')
                                {{ \Carbon\Carbon::parse($dateArrivee)->format('m/d/Y') }}
                            @else
                                {{ \Carbon\Carbon::parse($dateArrivee)->format('d/m/Y') }}
                            @endif
                        </div>
                    </div>

                    <div class="flex justify-between">
                        <label class="font-bold text-custom-marron">{{ __('content.depart') }} :</label>
                        <div class="font-semibold text-custom-marron">
                            @if ( App::getLocale() === 'en')
                            {{ \Carbon\Carbon::parse($dateDepart)->format('m/d/Y') }}
                        @else
                            {{ \Carbon\Carbon::parse($dateDepart)->format('d/m/Y') }}
                        @endif
                        </div>
                    </div>

                    <div class="flex justify-between">
                        <label class="font-bold text-custom-marron">{{ __('content.duree') }}  :</label>
                        <div class="font-semibold text-custom-marron"> {{ $nombreNuitees }} {{ __('content.nuit') }} </div>
                    </div>

                    <div class="flex justify-between">
                        <label class="font-bold text-custom-marron">{{ __('content.nombre') }} :</label>
                        <div class="flex flex-col">
                            <div class="flex space-x-2">
                                <label class="text-custom-marron text-sm mt-1">{{ __('content.adultes') }} :</label>
                                <div class="font-semibold text-custom-marron mt-0.5"> {{ $nombreAdultes }} </div>
                            </div>

                            @if ($nombreEnfants > 0)
                            <div class="flex space-x-2">
                                <label class="text-custom-marron text-sm mt-1">{{ __('content.enfants-1') }} :</label>
                                <div class="font-semibold text-custom-marron mt-0.5"> {{ $nombreEnfants }} </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="flex justify-between">
                    <label class="font-bold text-custom-marron">{{ __('content.extra') }} :</label>
                    <div class="font-semibold text-custom-marron">  </div>
                </div>

                <div class="flex flex-col mt-4 space-y-2">
                    <hr class="border-1 h-0.5 bg-custom-marron">

                    <div class="flex justify-between">
                        <label class="font-black text-custom-marron uppercase text-xl">Total :</label>
                        <div class="font-black text-custom-marron text-xl"> {{ $prixTotal }} € </div>
                    </div>
                </div>

                <p class="italic text-sm">{{ __('content.taxe') }}</p>
            </div>
        </div>
    </div>


@endsection


<script>
    
    const spaCounts = Array.from({ length: {{ count($massages) }} }, () => 0);
    const cateringAdultCounts = Array.from({ length: {{ count($restaurants) }} }, () => 0);
    const cateringChildCounts = Array.from({ length: {{ count($restaurants) }} }, () => 0);


    function cateringAdultCount(event, index, change) {
    event.preventDefault();
   
    cateringAdultCounts[index] += change;
    
    if (cateringAdultCounts[index] < 0) {
        cateringAdultCounts[index] = 0;
    }

    document.getElementById("cateringAdult" + index).innerHTML = cateringAdultCounts[index];
    document.getElementById("inputcateringAdult" + index).value = cateringAdultCounts[index]; 
}


function cateringChildCount(event, index, change) {
    event.preventDefault();
   
    cateringChildCounts[index] += change;
    
    if (cateringChildCounts[index] < 0) {
        cateringChildCounts[index] = 0;
    }

    document.getElementById("cateringChild" + index).innerHTML = cateringChildCounts[index];
    document.getElementById("inputcateringChild" + index).value = cateringChildCounts[index]; 
}




function SpaCount(event, index, change) {
    event.preventDefault();
   
    spaCounts[index] += change;
    
    if (spaCounts[index] < 0) {
        spaCounts[index] = 0;
    }

    document.getElementById("spa" + index).innerHTML = spaCounts[index];
    document.getElementById("inputSpa" + index).value = spaCounts[index]; 
}


    </script>