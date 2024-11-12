@extends('layouts.cgv')

@section('title', __('content.data'))


@section ('titre')
<div class="flex flex-col ">
<h1 class=" ml-12 mt-60 text-6xl text-white font-bold uppercase"> {!! nl2br(__('content.politique')) !!}</h1>
<hr class="border-t-4 border-custom-beige w-32 relative top-6 left-14">
</div>
@endsection



    @section('main')

    <div style="background-color:#F9F4EE" class="w-full">
        <div class="ml-32 mr-32 text-justify p-10">
            <h3 class="text-custom-vert font-bold text-xl">1- {{ __('content.collecte') }}</h3>
            <br/>
            <p>
                {{ __('content.collecte_text') }}      
            </p>
      <br/>

      <h3 class="text-custom-vert font-bold text-xl">2- {{ __('content.utilisation') }}</h3>
      <br/>
      <p>
        {{ __('content.utilisation_text') }} 
      </p>
      <br/>

      <h3 class="text-custom-vert font-bold text-xl">3- {{ __('content.conservation') }}</h3>
      <br/>
      <p>
        {{ __('content.conservation_text') }}      
    </p>
      <br/>

      <h3 class="text-custom-vert font-bold text-xl">4- {{ __('content.protection') }}</h3>
      <br/>
      <p>
        {{ __('content.protection_text') }}     
     </p>
      <br/>

      <h3 class="text-custom-vert font-bold text-xl">5- {{ __('content.partage') }}</h3>
      <br/>
      <p>
        {{ __('content.partage_text') }}
      </p>
      <br/>

      <h3 class="text-custom-vert font-bold text-xl">6- {{ __('content.droits') }}</h3>
      <br/>
      <p>
        {{ __('content.droits_text') }}
      </p>
      <br/>

      <h3 class="text-custom-vert font-bold text-xl">7- {{ __('content.modification') }}</h3>
      <br/>
      <p>
        {{ __('content.modification_text') }}      
    </p>
      <br/>

      <h3 class="text-custom-vert font-bold text-xl">8- Contact</h3>
      <br/>
      <p>
        {{ __('content.contact_text') }} 
      </p>
      <br/>
    </div>
    </div>
    
    @endsection

