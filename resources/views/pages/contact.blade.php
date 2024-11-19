@extends('layouts.cgv')

@section('title', __('content.contactez-nous'))

@section ('titre')

<h1 class="p-12 mt-12 md:mt-0 md:text-left text-center md:p-0 md:ml-36 md:mt-60 text-6xl text-white font-bold uppercase">{!! nl2br(__('content.acces-contact')) !!}</h1>
<hr class="hidden md:block border-t-4 border-custom-beige w-24 mt-96 absolute right-[450px]">
@endsection
    

@section('main')

<div style="background-color:#F9F4EE" class="w-full md:h-screen">
    <div class="flex flex-col justify-center items-center">
        <span class="font-bold text-custom-marron text-[40px] mt-12 uppercase"> {{ __('content.contactez-nous') }} </span>
        <hr class="border-t-4 border-custom-beige w-24 mt-2 ">
    </div>

        <div class="flex flex-col items-center p-6 md:min-h-screen">
            
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



<div style="background-color:#F9F4EE" class="w-full flex flex-col md:flex-row">


    <div class="md:w-[650px] md:h-[585px]">
        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m24!1m12!1m3!1d1591.8543542236362!2d-61.1507548668958!3d14.700926540024968!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m9!3e6!4m1!2sJolimont%20%2C%2097226!4m5!1s0x8c6aaf86c96f4bd3%3A0x2acb1458a2c34fd6!2sMorne-Vert!3m2!1d14.7070314!2d-61.145001!5e1!3m2!1sfr!2sfr!4v1730125969006!5m2!1sfr!2sfr" 
            class="w-full h-[400px] md:h-full" 
            style="border:0;" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>
    
    <div class="flex flex-col justify-center p-8 w-full md:w-2/4">
        
        <div class="flex flex-col justify-center items-center">
            <span class="font-bold text-custom-marron text-[40px] ml-0  mb-20 text-center leading-tight uppercase">{!! nl2br(__('content.coordonnees')) !!}</span>
            <hr class="border-t-4 border-custom-beige w-24 relative left-0  bottom-16 md:bottom-16">
        </div>

        <div class=" text-xl ml-0 md:ml-24 space-y-10"> 
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

