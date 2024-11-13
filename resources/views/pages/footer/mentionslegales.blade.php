@extends('layouts.cgv')

@section('title', __('content.mention'))


@section ('titre')

<div class="flex flex-col ">
<h1 class=" ml-36 mt-56 text-6xl text-white font-bold uppercase"> {!! nl2br(__('content.mention-1')) !!} </h1>
<hr class="border-t-4 border-custom-beige w-32 relative top-4 left-36">
</div>
@endsection



    @section('main')
    <div style="background-color:#F9F4EE" class="w-full flex flex-col justify-center">
        <div class="ml-44 mr-44 text-justify p-10">
            <h3 class="text-custom-vert font-bold text-xl">1- {{ __('content.proprio') }} :</h3> 
            <br/>
            <p>
                Tout Là-Haut<br />
                {{ __('content.adresse-postale') }} : Route de Jolimont, 97226 Morne-Vert<br />
                {{ __('content.telephone') }} : 0596 67 64 53<br />
                {{ __('content.email') }} : contact@toutlahaut.org
            </p>
            <br/>


            <h3 class="text-custom-vert font-bold text-xl">2- {{ __('content.publication') }} :</h3>
            <br/>
            <p>
                {{ __('content.agence') }} "CréaWeb"<br />
                {{ __('content.adresse-postale') }} : 123 Avenue des Créateurs, Ville, Pays<br />
                {{ __('content.telephone') }} : +123456789<br />
                {{ __('content.email') }} : contact@creaweb.com
            </p>
            <br/>
        
            <h3 class="text-custom-vert font-bold text-xl">3- {{ __('content.hebergeur') }} :</h3>
            <br/>
            <p>
                {{ __('content.nom-1') }} : Exemple<br />
                {{ __('content.adresse-postale') }} : 123 Rue de l'Hébergement, Ville, Pays<br />
                {{ __('content.telephone') }} : +123456789<br />
                {{ __('content.email') }} : support@exemple.com
            </p>
            <br/>
        
            <h3 class="text-custom-vert font-bold text-xl">4- {{ __('content.protection') }} :</h3>
            <br/>
            <p>
                {{ __('content.rgpd') }}           
             </p>
            <br/>
        
            <h3 class="text-custom-vert font-bold text-xl">5-  {{ __('content.auteur') }}   :</h3>
            <br/>
            <p>
                {{ __('content.auteur_text') }}            </p>
            <br/>
    
        
            <h3 class="text-custom-vert font-bold text-xl">6- Cookies :</h3>
            <br/>
            <p>
                {{ __('content.cookie') }}            
            </p>
            <br/>
        
            <h3 class="text-custom-vert font-bold text-xl">7-  {{ __('content.credit') }}  :</h3>
            <br/>
            <p>
                {!! nl2br(__('content.credit_text')) !!}            
            </p>
            <br/>
        </div>
    </div>
@endsection

