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
<body>
    

<div class="w-full bg-custom-vert p-12"> 
    <div class="flex space-x-2 hover:underline underline-white text-white absolute top-6 left-6"> 
        <i class="fa-solid fa-arrow-left mt-1 "></i>
            <a href="{{ route('admin-reservation') }}" class="font-bold ">Voir toutes les réservations</a>
    </div> 
    
    <div class="text-center uppercase text-3xl font-black text-white"> Détails de la réservation n°{{ $reservation->id }} </div>




</div>

    <div class="flex flex-col md:flex-row items-center bg-white rounded-lg shadow-md p-6 ">
        <div class="flex-1">
            <h2 class="text-2xl font-semibold text-gray-800 mb-2">{{ $reservation->nomCabane }}</h2>
            
            <div class="text-gray-600 mb-4">
                <p><span class="font-medium">Adultes :</span> {{ $reservation->nombreAdultes }}</p>
    
                <p><span class="font-medium">Enfants :</span> {{ $reservation->nombreEnfants }}</p>
            </div>
            
            <div class="text-gray-600 mb-4">
                <p><span class="font-medium">Arrivée :</span> {{ \Carbon\Carbon::parse($reservation->dateArrivee)->format('d/m/Y') }}</p>
                <p><span class="font-medium">Départ :</span> {{ \Carbon\Carbon::parse($reservation->dateDepart)->format('d/m/Y') }}</p>
            </div>
        </div>
        
        <div class="flex flex-col"> 
        <div class="text-gray-800 font-semibold text-lg mt-4 md:mt-0 md:ml-6">
            Prix : {{ $reservation->prix }} €
        </div>
    
        
        </div>
    </div>
    
     @foreach($reservation->prestations as $prestation)
    <li>
        {{ $prestation->type }} ({{ $prestation->prix_adulte }} € pour adultes, {{ $prestation->prix_enfant }} € pour enfants) - Quantité : {{ $prestation->pivot->quantite }}
        <br>Description : {{ $prestation->description }}
    </li>
    @endforeach  
    
    <p><span class="font-medium">Nom :</span>
        @if ($reservation->user)
            {{ $reservation->user->nom }}
        @elseif ($reservation->guest)
            {{ $reservation->guest->nom }}
        @endif
    </p>
    



</body>
</html>
 

