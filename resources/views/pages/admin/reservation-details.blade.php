<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite(['resources/css/app.css','resources/js/app.js'])
    <title>Tout Là-Haut</title>
</head>
<body >
    

    <div class="w-full bg-custom-vert p-12 space-y-8"> 
        <div class="flex space-x-2 hover:underline underline-white text-white absolute top-8 left-8"> 
            <i class="fa-solid fa-arrow-left mt-1 "></i>
                <a href="{{ route('admin-reservation') }}" class="font-bold ">Voir toutes les réservations</a>
        </div> 
        
    <div class="text-center uppercase text-3xl font-black text-white mb-8"> Détails de la réservation n°{{ $reservation->id }} </div>
    
        <div class="mx-72 items-center flex flex-col bg-white rounded-lg shadow-md p-6 space-y-8">

            <div> 
                <img class="rounded-lg" src="{{ Storage::url('images/caroussel1.jpg') }}" alt="Chambre">
            </div>
    
        <div class="flex flex-col items-center">
            <div class="font-bold uppercase mb-2"> Informations du client </div>
            <p><span class="font-medium">Prénom :</span> {{ $reservation->user->prenom ?? $reservation->guest->prenom }}</p>
            <p><span class="font-medium">Nom :</span> {{ $reservation->user->nom ?? $reservation->guest->nom }}</p>
            <p><span class="font-medium">Adresse postale :</span>
                {{ $reservation->user->adresse_postale ?? $reservation->guest->adresse_postale }}, 
                {{ $reservation->user->ville ?? $reservation->guest->ville }}
                {{ $reservation->user->code_postal ?? $reservation->guest->code_postal}}
            </p>
            <p><span class="font-medium">Numéro de téléphone :</span> {{ $reservation->user->telephone ?? $reservation->guest->telephone }}</p>
            <p><span class="font-medium">Adresse email :</span> {{ $reservation->user->email ?? $reservation->guest->email }}</p>
    
        </div>
    
        <div  class="flex flex-col items-center">
            <div class="font-bold uppercase mb-6"> Détails de la réservation </div>
            <div class="font-semibold ml-10 italic underline mb-2"> Hébergement </div>
    
            <p><span class="font-medium">Hébergement :</span> {{ $reservation->cabane->nomCabane }}</p>
            <p><span class="font-medium">Date d'arrivée :</span> {{ \Carbon\Carbon::parse($reservation->dateArrivee)->format('d/m/Y') }}</p>
            <p><span class="font-medium">Date de départ :</span> {{ \Carbon\Carbon::parse($reservation->dateDepart)->format('d/m/Y') }}</p>
            <p><span class="font-medium">Nombre de nuitée(s) :</span> {{  $reservation->nombreNuitees }} nuit(s)</p>
            <p><span class="font-medium">Nombre d'adultes :</span> {{  $reservation->nombreAdultes }} adultes</p>
            @if($reservation->nombreEnfants > 0)
                <p><span class="font-medium">Nombre d'enfants :</span> {{  $reservation->nombreEnfants }} enfants</p>
            @endif
        </div>
    
    
        <div  class="flex flex-col items-center">
            <div class="font-semibold ml-10 italic underline mb-2"> Extras </div>
    
         @foreach($reservation->prestations as $prestation)
         
         @if($prestation->pivot->type === 'Adulte')
         <div class="flex space-x-1">
            <div class="flex font-semibold space-x-1">
         <div>
            @php
                $parts = explode(":", $prestation->type);  
            @endphp
            {{ trim($parts[0]) }}  
        </div>
        
            <div>{{$prestation->pivot->type}} :</div>
         </div>
                <div>{{$prestation->pivot->quantite}}</div> <span> x </span>  <div>{{$prestation->prix_adulte}}€ </div> 
         </div>
        @endif
    
        @if($prestation->pivot->type === 'Enfant')
        <div class="flex space-x-1">
            <div class="flex font-semibold space-x-1">
         <div>
            @php
                $parts = explode(":", $prestation->type);  
            @endphp
            {{ trim($parts[0]) }}  
        </div>
            <div>{{$prestation->pivot->type}} :</div>
        </div>
            <div>{{$prestation->pivot->quantite}}</div> <span> x </span> <div>{{$prestation->prix_enfant}}€</div>
        </div>
        @endif
    
    
        @if($prestation->pivot->type === 'Massage')
        <div class="flex space-x-1">
            <div class="flex font-semibold space-x-1">
         <div>
            @php
                $parts = explode(":", $prestation->type);  
            @endphp
            {{ trim($parts[0]) }}  
        </div>
            <div>{{$prestation->pivot->type}} :</div>
        </div>
            <div>{{$prestation->pivot->quantite}}</div> <span> x </span> <div>{{$prestation->prix_adulte}}€</div>
        </div>
        @endif
    
    @endforeach
        </div>

        <p><span class="font-medium">Message :</span> {{  $reservation->message }}</p>

        <p class="font-bold uppercase text-xl"><span class="font-bold uppercase">Prix total :</span> {{ $reservation->prix }}€</p>



    <a href="{{ route('supprimerReservation', $reservation->id) }}" class="hover:bg-red-500 w-full text-center uppercase bg-red-600 text-white font-bold p-2 rounded">Annuler la réservation</a>
    
    
    </div>
    
     <div class="mx-72 justify-center flex rounded-lg text-white relative transition-all duration-300">
        <div class="relative">
            <input type="checkbox" id="dropdownToggle" class="hidden peer">
            <label 
                for="dropdownToggle" 
                class="text-white bg-custom-marron font-bold rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center cursor-pointer">
                Consulter le détail du paiement
                <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                </svg>
            </label>
    
            @if (isset($reservation->paiement))
            <div class="mt-2 hidden divide-y divide-gray-100 rounded-lg peer-checked:block z-10">
                <ul class="py-2 text-sm">
                    <li>
                        <div class="block px-4 py-2">
                            <span class="font-bold">Moyen de paiement :</span>
                            {{ $reservation->paiement->moyenPaiement }}
                        </div>
                    </li>
                    <li>
                        <div class="block px-4 py-2">
                            <span class="font-bold">Statut du paiement :</span>
                            @if ($reservation->paiement->statutPaiement === 1)
                            Paiement validée
                            @endif
                        </div>
                    </li>
                    <li>
                        <div class="block px-4 py-2">
                            <span class="font-bold">Description :</span>
                            <p>{{ $reservation->paiement->description }}</p>
                        </div>
                    </li>
                    <li>
                        <div class="block px-4 py-2">
                            <span class="font-bold">Date du paiement :</span>
                            {{ \Carbon\Carbon::parse($reservation->paiement->created_at)->setTimezone('GMT-4')->format('d/m/Y - H:i') }}
                        </div>
                    </li>
                </ul>
            </div>
            @endif
        </div>
    </div>
    
    
    
   
    


</body>
</html>
 

