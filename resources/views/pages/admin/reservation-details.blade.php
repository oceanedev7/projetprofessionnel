@foreach($reservation->prestations as $prestation)
<li>
    {{ $prestation->type }} ({{ $prestation->prix_adulte }} € pour adultes, {{ $prestation->prix_enfant }} € pour enfants) - Quantité : {{ $prestation->pivot->quantite }}
    <br>Description : {{ $prestation->description }}
</li>
@endforeach