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

    <div class="flex space-x-2 hover:underline underline-white text-white absolute top-6 left-6"> 
        <i class="fa-solid fa-arrow-left mt-1 "></i>
            <a href="{{ route('dashboard') }}" class="font-bold ">Revenir au dashboard</a>
    </div> 

    <div class="w-full bg-custom-vert p-12"> 
        <div class="text-center uppercase text-3xl font-black text-white"> listes des réservations </div>
        
        
        <div class="mx-auto p-4 space-y-8 mt-10">
            @foreach($reservations as $reservation)

        
                <div class="flex flex-col md:flex-row items-center bg-white rounded-lg shadow-md p-6 space-y-6 md:space-y-0 md:space-x-10">
    
                    <img class="w-[200px] h-[200px] rounded-lg" src="{{ Storage::url('images/osmose.png') }}" alt="Cabane Osmose">
                    
                    <div class="flex-1">
                        <h2 class="text-xl font-bold uppercase text-custom-marron mb-2">{{ $reservation->nomCabane }}</h2>
                        
                        <div>
                            <p><span class="font-medium">Adultes :</span> {{ $reservation->nombreAdultes }}</p>
                            @if ($reservation->nombreEnfants > 0)
                                <p><span class="font-medium">Enfants :</span> {{ $reservation->nombreEnfants }}</p>
                            @endif
                        </div>
                        
                        
                        <div>
                            <p><span class="font-medium">Arrivée :</span> {{ \Carbon\Carbon::parse($reservation->dateArrivee)->format('d/m/Y') }}</p>
                            <p><span class="font-medium">Départ :</span> {{ \Carbon\Carbon::parse($reservation->dateDepart)->format('d/m/Y') }}</p>
                        </div>
                    </div>
                    
                    <hr class="w-0 h-32 border-l-2 border-black relative right-7" />
                    
                    <div class="flex-1 ">
                        <h2 class="text-xl font-bold uppercase mb-2 text-custom-marron">Informations client</h2>
                
                        <p><span class="font-medium">Nom :</span>
                            @if ($reservation->user)
                                {{ $reservation->user->nom }}
                            @elseif ($reservation->guest)
                                {{ $reservation->guest->nom }}
                            @endif
                        </p>
                        <p><span class="font-medium">Prénom :</span>
                            @if ($reservation->user)
                                {{ $reservation->user->prenom }}
                            @elseif ($reservation->guest)
                                {{ $reservation->guest->prenom }}
                            @endif
                        </p>
                        <p><span class="font-medium">Numéro de tél. :</span>
                            @if ($reservation->user)
                                {{ $reservation->user->telephone }}
                            @elseif ($reservation->guest)
                                {{ $reservation->guest->telephone }}
                            @endif
                        </p>
                        <p><span class="font-medium">Adresse email :</span>
                            @if ($reservation->user)
                                {{ $reservation->user->email }}
                            @elseif ($reservation->guest)
                                {{ $reservation->guest->email }}
                                @endif
                        </p>
                    </div>
                    
                    <div class="flex flex-col  space-y-2">
                        <div class="font-bold text-lg uppercase">
                            Prix Total : {{ $reservation->prix }} €
                        </div>
                        
                        <a href="{{ route('admin-reservation-details', ['id' => $reservation->id]) }}" 
                           class="bg-custom-marron rounded text-white font-bold py-2 text-center">
                            Voir le détail
                        </a>
                    </div>
                </div>
                
                
                
            @endforeach
        </div>
        
        
        </div>
    
</body>
</html>




