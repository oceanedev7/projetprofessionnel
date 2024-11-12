@extends('layouts.cgv')

@section('title', __('content.cgv'))


@section ('titre')

<div class="flex flex-col ">
<h1 class=" ml-32 mt-52 text-6xl text-white font-bold uppercase"> {!! nl2br(__('content.cgv-1')) !!} </h1>
<hr class="border-t-4 border-custom-beige w-32 relative top-6 left-32">
</div>
@endsection



    @section('main')

    <div style="background-color:#F9F4EE" class="w-full">
        <div class="ml-32 mr-32 text-justify p-10">
            <h3 class="text-custom-vert font-bold text-xl">1- {{ __('content.objet') }}</h3>
            <br/>
            <p>
                {{ __('content.objet_text') }} 
            </p>
            <br/>
      
            <h3 class="text-custom-vert font-bold text-xl">2-  {{ __('content.reservation-1') }}</h3>
            <br/>
            <p>
                {{ __('content.reservation_text') }}            
            </p>
            <br/>
      
            <h3 class="text-custom-vert font-bold text-xl">3- {{ __('content.tarif') }}</h3>
            <br/>
            <p>
                {{ __('content.tarif_text') }}            
            </p>
            <br/>
      
            <h3 class="text-custom-vert font-bold text-xl">4- {{ __('content.modalite') }}</h3>
            <br/>
            <p>
                {{ __('content.modalite_text') }}            
            </p>
            <br/>
      
            <h3 class="text-custom-vert font-bold text-xl">5- {{ __('content.annulation-1') }}</h3>
            <br/>
            <p>
                {{ __('content.annulation_text') }}            
            </p>
            <br/>
      
            <h3 class="text-custom-vert font-bold text-xl">6- {{ __('content.responsabilite') }}</h3>
            <br/>
            <p>
                {{ __('content.responsabilite_text') }}            
            </p>
            <br/>
      
            <h3 class="text-custom-vert font-bold text-xl">7- {{ __('content.law') }}</h3>
            <br/>
            <p>
                {{ __('content.law_text') }}        
            </p>
            <br/>
      
           
    </div>
    </div>
    @endsection

