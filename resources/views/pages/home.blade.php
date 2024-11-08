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


<div class="w-full md:h-screen bg-black"> 
    <video autoplay muted loop class="w-full h-screen object-cover opacity-50">
        <source src="{{ Storage::url('videos/videoaccueil.mp4') }}" type="video/mp4"  alt="Vidéo drone Martinique">
    </video>

<div class="flex flex-col items-center justify-center">
    <div class=" absolute top-10"> 
        <img class="w-64 h-64" src="{{ Storage::url('images/logoaccueil.png') }}" alt="Logo Tout-là-haut"> 
    </div>

        <div class="absolute md:max-w-3xl max-w-sm top-72 text-white font-bold text-center text-2xl"> 
           <div> {{ __('content.titre') }} </div>              
        <div class="mt-2 text-white font-light text-center text-base tracking-widest"> 
            {{ __('content.sous-titre') }}  
        </div>
        </div>  
        
        <div class="absolute right-1/2 top-96 bottom-0 mx-4 items-center justify-center hidden md:flex">
            <hr class="w-0 h-24 border-l-2 border-white" />
        </div>
        
</div>                      
</div>

<div style="background-color:#F9F4EE" class="w-full md:h-[500px] ">

    <div class="flex flex-col justify-center items-center">
        <span class="font-bold text-custom-marron text-[40px] mt-8 uppercase">{{ __('content.domaine') }} </span>
        <hr class="border-t-4 border-custom-beige w-32 relative top-2 left-2">
    </div>


    <div class="flex flex-col p-6 items-center md:space-x-28 md:flex-row  md:items-center md:justify-center md:space-y-16">
         <p class="w-96 text-justify text-left mb-6">  
            {{ __('content.presentation') }}
         </p> 
     
        <p class="w-96 text-justify text-right">  

        <span class="text-custom-vert font-bold text-lg ml-28"> {{ __('content.engagement') }}</span>

       <br/> {{ __('content.responsable') }}
        </p> 
    </div>

</div>
 
<div class=" w-full h-screen bg-fixed bg-center bg-cover" alt="Cabane en bois" style="background-image: url('{{ Storage::url('images/imageparallax.png') }}');"></div>



<div class="bg-custom-vert md:h-screen w-full"> 

    <div class="flex flex-col items-center md:justify-center md:items-center">
        <span class="font-bold text-white text-center text-[40px] mt-8 uppercase"> {{ __('content.decouvrir') }} </span>
        <hr class="border-t-4 border-custom-beige w-32 relative top-2 ">
    </div>


        <div class="md:justify-items-center md:grid md:grid-cols-2 md:gap-y-6 md:relative md:top-12 md:p-0 p-6 items-center justify-center md:space-y-0 space-y-4 flex flex-col">


            <a href="{{ route('cabane1')}}" class="relative group block overflow-visible ml:0 md:ml-32">
        
                <img class="h-[200px] w-[250px] object-cover transition-opacity duration-300 ease-in-out group-hover:opacity-60" src="{{ Storage::url('images/nid.png') }}" alt="Cabane Nid douillet">
                <div class="absolute inset-0 bg-black bg-opacity-70 opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-in-out flex items-center justify-center">
                    <div class="absolute top-1/2 left-8 md:left-28 bg-opacity-70 p-4 rounded-md text-white whitespace-nowrap space-y-2 z-10 transform -translate-y-1/2">
                        <h3 class="text-3xl font-bold"> {{ __('content.nidDouillet') }} </h3>
                        <p class="text-lg font-normal">2 {{ __('content.pax') }} | 60m² | 8m {{ __('content.hauteur') }}</p>
                    </div>
                </div>
            </a>
            
            <a href="{{ route('cabane2') }}" class="relative group block overflow-visible mr-0 md:mr-32">
                <img class="h-[200px] w-[250px] object-cover transition-opacity duration-300 ease-in-out group-hover:opacity-60" src="{{ Storage::url('images/osmose.png') }}" alt="Cabane Osmose">
                <div class="absolute inset-0 bg-black bg-opacity-70 opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-in-out flex items-center justify-center">
                    <div class="absolute top-1/2 left-8 md:left-28 bg-opacity-70 p-4 rounded-md text-white whitespace-nowrap space-y-2 z-10 transform -translate-y-1/2">
                        <h3 class="text-3xl font-bold">{{ __('content.osmose') }} </h3>
                        <p class="text-lg font-normal">2 {{ __('content.pax') }}  | 60m² | 8m {{ __('content.hauteur') }}</p>
                    </div>
                </div>
            </a>
            
            <a href="{{ route('cabane3') }}" class="relative group block overflow-visible ml:0 md:ml-32">
                <img class="h-[200px] w-[250px] object-cover transition-opacity duration-300 ease-in-out group-hover:opacity-60" src="{{ Storage::url('images/escapade.png') }}" alt="Cabane Escapade">
                <div class="absolute inset-0 bg-black bg-opacity-70 opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-in-out flex items-center justify-center">
                    <div class="absolute top-1/2 left-0.5 md:left-28 bg-opacity-70 p-4 rounded-md text-white whitespace-nowrap space-y-2 z-10 transform -translate-y-1/2">
                        <h3 class="text-3xl font-bold">{{ __('content.escapade') }} </h3>
                        <p class="text-lg font-normal">4 {{ __('content.pax') }}  | 85m² + {{ __('content.ilot') }}  | 8m {{ __('content.hauteur') }} </p>
                    </div>
                </div>
            </a>

            <a href="{{ route('cabane4') }}" class="relative group block overflow-visible mr-0 md:mr-32">
                <img class="h-[200px] w-[250px] object-cover transition-opacity duration-300 ease-in-out group-hover:opacity-60" src="{{ Storage::url('images/eden.png') }}" alt="Cabane Eden">
                <div class="absolute inset-0 bg-black bg-opacity-70 opacity-0 group-hover:opacity-100 transition-opacity duration-300 ease-in-out flex items-center justify-center">
                    <div class="absolute top-1/2 left-12 md:left-28 bg-opacity-70 p-4 rounded-md text-white whitespace-nowrap space-y-2 z-10 transform -translate-y-1/2">
                        <h3 class="text-3xl font-bold">{{ __('content.eden') }} </h3>
                        <p class="text-lg font-normal">6 {{ __('content.pax') }}  | 110m² | 6m {{ __('content.hauteur') }} </p>
                    </div>
                </div>
            </a>
        
         </div>
      
</div>

<div style="background-color:#F9F4EE" class="w-full h-screen"> 

    <div class="flex flex-col items-center justify-center">
        <span class="font-bold text-custom-marron text-[40px] relative top-6 uppercase"> {{ __('content.plan') }} </span>
        <hr class="border-t-4 border-custom-beige w-32 relative top-8 ">

    </div>

            <div class=" flex justify-center md:mt-0 mt-12"> 
                <img class="md:h-[550px] md:w-[800px] h-[400px]"  src="{{ Storage::url('images/plandomaine.png') }}" alt="Plan du domaine">
            </div>

    </div>

@endsection

  
     
