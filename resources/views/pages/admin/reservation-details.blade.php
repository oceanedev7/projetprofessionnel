
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




