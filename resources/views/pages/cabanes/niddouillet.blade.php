@extends('layouts.main')

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
    <a href="{{ route('login') }}" class="absolute top-8 right-52 bg-gray-400 bg-opacity-65 text-white py-2.5 px-3 font-bold border-none inline-block text-center rounded w-12 tracking-wide text-base">
        <i class="fa-solid fa-user"></i>
    </a>
@endif

    <a href="{{ route('lang.switch', ['lang' => App::getLocale() === 'en' ? 'fr' : 'en']) }}" 
            class="absolute top-8 right-36 bg-gray-400 bg-opacity-65 text-white py-2.5 px-3 font-bold border-none inline-block text-center rounded w-12 tracking-wide text-base">
             {{ App::getLocale() === 'en' ? 'FR' : 'EN' }}
         </a>   
          <a href="{{ route('reserver') }}" class="absolute top-8 right-8 bg-custom-vert bg-opacity-90 tracking-widest text-white py-3 px-3 border-none rounded w-30 font-semibold text-sm"> RÉSERVER </a>  
</div>
@endsection


@section('main')

<div style="background-color:#F9F4EE" class="h-screen w-full flex"> 
        
    <img class="w-[550px] h-screen" src="{{ Storage::url('images/cabanenid.jpg') }}" alt="Cabane intérieur">

<div class="flex flex-col justify-center px-8 md:px-16 text-center md:text-left">

    <div class="text-4xl text-custom-marron font-bold mb-4 uppercase">{{ __('content.' . $nomCabane) }}</div>
    <div class="text-justify text-custom-marron max-w-lg mx-auto md:mx-0"> {{ __('content.' . $descriptionCabane) }}</div>
    <div class="italic mt-12 text-justify text-2xl text-custom-marron font-bold max-w-lg mx-auto md:mx-0">{{ __('content.' . $prixCabane) }}</div>
    <div class="relative top-4"> 
    <a class="bg-custom-marron rounded text-white font-bold py-2 px-4 uppercase" href="{{ route('reserver') }}"> {{ __('content.reserver') }}</a>
    </div>
</div>



</div>


<div style="background-color:#F9F4EE" class="h-screen w-full"> 
    <div class="flex flex-col justify-center items-center">
        <span class="font-bold text-custom-marron text-[40px] mt-8 uppercase">{{ __('content.equipement') }}</span>
        <hr class="border-t-4 border-custom-beige w-32 relative top-2 left-2">
    </div>
    

    <div class="flex flex-row justify-center items-center space-x-20 text-custom-marron relative top-20">
        <div class="flex flex-col items-center space-y-2">
            <i class="fa-solid fa-person text-5xl"></i>
            <div class="text-base">2 {{ __('content.pax') }}</div>
        </div>
        <div class="flex flex-col items-center space-y-2">
            <i class="fa-solid fa-hot-tub-person text-5xl"></i>
            <div class="text-base"> {{ __('content.spa-privatif') }}</div>
        </div>
        <div class="flex flex-col items-center space-y-2">
            <i class="fa-regular fa-snowflake text-5xl"></i>
            <div class="text-base">{{ __('content.climatisation') }}</div>
        </div>
        <div class="flex flex-col items-center space-y-2">
            <i class="fa-solid fa-shower text-5xl"></i>
            <div class="text-base">{{ __('content.douche') }}</div>
        </div>
        <div class="flex flex-col items-center space-y-2">
            <i class="fa-solid fa-toilet-portable text-5xl"></i>
            <div class="text-base">{{ __('content.frigo') }}</div>
        </div>
    </div>
    
    
    <div class="flex flex-col justify-center items-center mt-40">
        <div class="grid grid-cols-2 gap-y-6 text-custom-marron">
            @foreach($equipements as $equipement)
                <div class="flex flex-col justify-center text-left -mx-32">- {{ $equipement->nomEquipement }}</div>
            @endforeach
        </div>
    </div>

</div>


<div style="background-color:#F9F4EE" class="h-screen w-full"> 
    <div class="flex flex-col justify-center items-center">
        <span class="font-bold text-custom-marron text-[40px] mt-10 uppercase">{{ __('content.prestation') }}</span>
        <hr class="border-t-4 border-custom-beige w-32 relative top-2 left-2">
    </div>

    <div class="flex flex-row justify-center space-x-16 relative top-16" >
    <div class="flex flex-col items-center max-w-lg	"> 
        <i class="fa-solid fa-bell-concierge text-custom-marron text-4xl"></i>
        <div class="font-bold text-custom-marron text-2xl"> {{ __('content.restauration') }} </div>
        <div class="mt-6 text-justify">
            {{ __('content.restauration-cabane') }} 
        </div>
    </div>
    


<div class="flex flex-col items-center max-w-lg" > 
    <i class="fa-solid fa-spa text-custom-marron text-4xl"></i>
    <div class="font-bold text-custom-marron text-2xl"> Spa </div>
    <div class="mt-6 text-justify ">
        {{ __('content.spa-cabane') }}
    </div>
</div>
    </div>

<div class="flex justify-center" >
    <a href="{{ route('prestations') }}" class="bg-custom-marron text-white font-bold text-base px-4 py-2 rounded-md relative top-28 uppercase">{{ __('content.decouvrir-bouton') }}</a>
</div>
    
</div>

<div class="w-full h-screen bg-custom-beige text-white relative"> 

    <img class="w-full h-screen object-cover opacity-20" src="{{ Storage::url('images/reservation.jpg') }}" alt="Cabane au bord de l'eau">

    <div class="absolute inset-0 flex justify-center items-center">
        <div class="text-center px-6">
            <div class="font-bold text-3xl">{{ __('content.savoir') }}</div>
            <div class="text-justify font-semibold text-lg max-w-3xl mt-12 mx-auto">
                {!! nl2br(__('content.conseil')) !!}
            </div>
        </div>
    </div>

</div>


<div style="background-color:#F9F4EE" class="h-screen w-full"> 

    <div id="animation-carousel" class="relative top-28 left-60 max-w-screen-md"  data-carousel="static">
        <!-- Carousel wrapper -->
        <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
             <!-- Item 1 -->
            <div class="hidden duration-200 ease-linear" data-carousel-item>
                <img src="{{ Storage::url('images/caroussel1.jpg') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="Cabane chambre">
            </div>
            <!-- Item 2 -->
            <div class="hidden duration-200 ease-linear" data-carousel-item>
                <img src="{{ Storage::url('images/caroussel2.png') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="Cabane terrasse">
            </div>
            <!-- Item 3 -->
            <div class="hidden duration-200 ease-linear" data-carousel-item="active">
                <img src="{{ Storage::url('images/caroussel3.jpg') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="Cabane salon">
            </div>
            <!-- Item 4 -->
            <div class="hidden duration-200 ease-linear" data-carousel-item>
                <img src="{{ Storage::url('images/caroussel4.jpg') }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="Cabane chambre étage">
            </div>
        
        </div>
        <!-- Slider controls -->
        <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
            <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>


</div> 


@endsection

  
     
