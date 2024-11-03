@extends('layouts.main')

@section('navbar')
<div class="fixed z-10 w-full"> 
    <a href="{{ route('menu') }}" class="absolute top-8 left-8 bg-custom-vert bg-opacity-90 text-white py-2.5 px-3 border-none rounded-md w-12 text-base inline-block text-center"><i class="fa-solid fa-bars"></i></a>    
    {{-- <a href="{{ route('login') }}" class="absolute top-8 right-52 bg-gray-400 bg-opacity-65 text-white py-2.5 px-3 font-bold border-none inline-block text-center rounded w-12 tracking-wide text-base">
        <i class="fa-solid fa-user"></i>
    </a> --}}
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
@endsection

@section('main')
 
<div class="min-h-screen w-full bg-custom-beige"> 

    <div class="text-center uppercase relative top-24 text-white font-black text-3xl"> Mes réservations </div>

    <div class="space-y-12">

        @foreach($reservations as $reservation)
    
    <div class="mx-auto flex bg-white max-w-3xl rounded-lg p-8 relative top-40 shadow-xl space-x-10">

    <div> 
        <img class="rounded-lg w-[200px] h-[200px]" src="{{ Storage::url('images/caroussel1.jpg') }}" alt="Plan du domaine">
    </div>

    <div class="flex flex-col space-y-2 flex-grow justify-center"> 
       
            <div class=" uppercase font-bold text-xl">{{ $reservation->nomCabane }}</div>
        
        <div class="flex space-x-2 font-semibold">
            <div> du </div>
            <div> {{ \Carbon\Carbon::parse($reservation->dateArrivee)->format('d/m/Y') }}</div> 
            <div> au </div>  
            <div> {{ \Carbon\Carbon::parse($reservation->dateDepart)->format('d/m/Y') }}</div>
         </div>

         <div class="flex space-x-2">
            <div>{{ $reservation->nombreAdultes }} adultes</div>
            @if ($reservation->nombreEnfants > 0)  
            <div> - </div>  
            <div> {{ $reservation->nombreEnfants }} enfants</div>  
            @endif
         </div>

    <div class="flex flex-col ml-auto">
    <div class="font-black text-xl mb-2 ml-auto">TOTAL : {{ $reservation->prix }} € </div>
    <a class=" bg-custom-marron rounded text-white font-bold py-2 px-4 ">Voir le détail de ma réservation</a>
    </div>

    </div>

    </div>
    @endforeach


    </div>

</div>

@endsection