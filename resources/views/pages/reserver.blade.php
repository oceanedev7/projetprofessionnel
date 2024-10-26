@extends('layouts.main')


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

                        <x-dropdown-link :href="route('user-reservation')">
                            {{ __('Mes réservations') }}
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


    <div class="bg-custom-vert h-screen w-full" >
        <div class="flex flex-row"> 
            <img class="w-[550px] h-screen" src="{{ Storage::url('images/cgv.jpg') }}" alt="Cabane intérieur">
            <h1 class=" relative top-60 left-32 text-6xl text-white font-bold "> Réserver <br/> votre séjour </h1>
            <hr class="border-t-4 border-custom-beige w-24 relative top-96 right-52">
        </div>
    </div> 

    <div class="w-full h-screen bg-black"> 

    <img class="w-full h-screen object-cover opacity-50" src="{{ Storage::url('images/reservation.jpg') }}" alt="Cabane au bord de l'eau">
    
   <div class="flex justify-center relative bottom-96">
    <div class="bg-custom-vert w-[800px] h-[200px] rounded"> 

        <form action="{{ route('disponibilite') }}" method="POST">
            @csrf

<div class="flex justify-end mr-12 relative top-6">
 <div class="text-custom-beige font-bold text-sm relative top-6 "> Adultes </div>
 <div class="text-custom-beige font-bold ml-8 text-sm"> Enfants <br/> (de 2 à 10 ans)</div>
</div>

    <div class="flex flex-row justify-center p-8">   
<div id="date-range-picker"  class="flex items-center">
    <div class="relative">
      <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
           <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
          </svg>
      </div>
      <input datepicker datepicker-format="dd-mm-yyyy" id="datepicker-range-start" name="dateArrivee" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:border-custom-marron focus:ring-custom-marron block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required placeholder="Date d'arrivée">
    </div>
    <span class="mx-4 text-white">au</span>
    <div class="relative">
      <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
           <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
          </svg>
      </div>
      <input datepicker datepicker-format="dd-mm-yyyy" id="datepicker-range-end" name="dateDepart" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded focus:border-custom-marron focus:ring-custom-marron block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required placeholder="Date de départ">
  </div>
  </div>
  
  <select name="nombreAdultes" class="text-sm rounded mx-4 focus:border-custom-marron focus:ring-custom-marron" required>
    <option value="" disabled selected>0</option>
    @for ($i = 1; $i <= 6; $i++)
        <option value="{{ $i }}">{{ $i }}</option>
    @endfor
</select>


  <select name="nombreEnfants" class="text-sm rounded focus:border-custom-marron focus:ring-custom-marron">
    <option value="" disabled selected>0</option>
    @for ($i = 1; $i <= 6; $i++)
        <option value="{{ $i }}">{{ $i }}</option>
    @endfor
</select>


  </div>

  <div class="flex flex-row-reverse">
    <button type="submit" style="background-color: #C4AA84" class="text-white font-bold text-sm px-4 py-2 rounded-md relative bottom-2 right-8">Vérifier les disponibilités</button>
</div>
        </form>
    </div>

    </div>

       
    </div>


    @endsection


