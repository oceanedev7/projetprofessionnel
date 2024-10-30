@foreach($reservations as $reservation)
                    <tr>
                        <td>{{ $reservation->nomCabane }}</td>
                        <td>{{ $reservation->nombreAdultes }}</td>
                        <td>{{ $reservation->nombreEnfants }}</td>
                        <td>{{ $reservation->dateArrivee }}</td>
                        <td>{{ $reservation->dateDepart }}</td>
                        <td>{{ $reservation->prix }}</td>
                        <td>
                            <ul>
                                @foreach($reservation->prestations as $prestation)
                                <li>
                                    {{ $prestation->type }} ({{ $prestation->prix_adulte }} € pour adultes, {{ $prestation->prix_enfant }} € pour enfants) - Quantité : {{ $prestation->pivot->quantite }}
                                    <br>Description : {{ $prestation->description }}
                                </li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
@endforeach