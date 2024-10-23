@extends('layouts.cgv')


@section ('titre')

<h1 class=" ml-36 mt-60 text-6xl text-white font-bold uppercase">{!! nl2br(__('content.acces-contact')) !!}</h1>
<hr class="border-t-4 border-custom-beige w-24 mt-96 absolute right-[450px]">
@endsection
    

@section('main')

<div style="background-color:#F9F4EE" class="w-full h-screen">
    <div class="flex flex-col justify-center items-center">
        <span class="font-bold text-custom-marron text-[40px] mt-12 uppercase"> {{ __('content.contactez-nous') }} </span>
        <hr class="border-t-4 border-custom-beige w-24 mt-2 ">
    </div>

        <div class="flex flex-col items-center p-6 min-h-screen">
            
                <form method="post" action="{{ route('contact-request') }}" class="w-full max-w-3xl">
                    @csrf
                <div class="grid grid-cols-2 gap-y-6 gap-x-4 mb-6">
                    <input class="rounded border-custom-marron border-solid border-2 py-2 px-4 w-full focus:border-custom-vert focus:ring-custom-vert" name="prenom" placeholder="{{ __('content.prenom') }}" required/>
                    <input class="rounded border-custom-marron border-solid border-2 py-2 px-4 w-full focus:border-custom-vert focus:ring-custom-vert" name="nom" placeholder="{{ __('content.nom') }}" required/>
                    <input class="rounded border-custom-marron border-solid border-2 py-2 px-4 w-full focus:border-custom-vert focus:ring-custom-vert" name="numeroTelephone"  placeholder="{{ __('content.telephone') }}" required/>
                    <input class="rounded border-custom-marron border-solid border-2 py-2 px-4 w-full focus:border-custom-vert focus:ring-custom-vert" name="email" placeholder="{{ __('content.email') }}" required/>
                </div>
                <div class="flex flex-col items-center">
                    <textarea class="resize-none rounded border-custom-marron border-solid border-2 w-full max-w-3xl p-2 focus:border-custom-vert focus:ring-custom-vert" rows="8" name="message" placeholder="Message" required></textarea>
                    <button class="bg-custom-marron text-white font-medium text-base px-6 py-2 rounded-md mt-4 uppercase">{{ __('content.envoyer') }} </button>
                </form>
                </div>

                @if (session('success'))
                    <div class="font-bold">
                         {{ session('success') }}
                     </div>
                @endif

        </div>
        
        
</div>



<div style="background-color:#F9F4EE" class="w-full h-screen flex flex-col md:flex-row">

    <div style="background-color:#945508" class="h-screen w-full md:w-2/4"></div>

    <div class="flex flex-col justify-center p-8 w-full md:w-2/4">
        
        <div class="flex flex-col justify-center items-center">
            <span class="font-bold text-custom-marron text-[40px] ml-0  mb-20 text-center leading-tight uppercase">{!! nl2br(__('content.coordonnees')) !!}</span>
            <hr class="border-t-4 border-custom-beige w-24 relative left-0  bottom-16 md:bottom-16">
        </div>

        <div class="text-xl ml-0 md:ml-24 space-y-10"> 
            <div>
                <span class="text-custom-marron font-bold">{{ __('content.adresse-postale') }} :</span> <br/>
                Route de Jolimont, 97226 Morne-Vert
            </div>
            <div>
                <span class="text-custom-marron font-bold">{{ __('content.telephone') }} :</span> <br/>
                0596 67 64 53
            </div>
            <div>
                <span class="text-custom-marron font-bold">{{ __('content.email') }} :</span> <br/>
                contact@toutlahaut.org
            </div>
        </div>
    </div>
    
</div>


@endsection

