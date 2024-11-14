<?php

namespace App\Http\Controllers;

use App\Models\Cabane;
use App\Models\Prestation;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ClientInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
      }
    
    /**
     * Store a newly created resource in storage.
     */

public function store(Request $request)
{
    $validatedData = $request->validate([     
        'spa_count' => 'array', 
        'catering_adult' => 'array', 
        'catering_child' => 'array', 
    ]);

    $extras = [
        'spa_counts' => $validatedData['spa_count'] ?? [],
        'catering_adults' => $validatedData['catering_adult'] ?? [],
        'catering_children' => $validatedData['catering_child'] ?? [],
    ];
    
    $nomCabane = $request->input('nomCabane');
    $capacite = $request->input('capacite');
    $prixTotal = $request->input('prixTotal');
    $dateArrivee = $request->input('dateArrivee');
    $dateDepart = $request->input('dateDepart');
    $nombreNuitees = $request->input('nombreNuitees');
    $nombreAdultes = $request->input('nombreAdultes');
    $nombreEnfants = $request->input('nombreEnfants');

    $restaurants = Prestation::with('categorie')->where('categorie_id', 1)->get();
    $massages = Prestation::with('categorie')->where('categorie_id', 2)->get();

    $totalExtra = 0;

    $restaurationIds = [];
$massageIds = [];
$restaurationQuantites = [];
$massageQuantites = [];
$prestationsTypes = [];

    foreach ($extras['catering_adults'] as $index => $count) {
        if ($count > 0) {
            $restaurationIds[] = $restaurants[$index]->id; 
            $restaurationQuantites[] = $count;
            $prestationsTypes[] = 'Adulte';
            $totalExtra += $count * $restaurants[$index]->prix_adulte;
        }
    }

    foreach ($extras['catering_children'] as $index => $count) {
        if ($count > 0) {
            $restaurationIds[] = $restaurants[$index]->id;
            $restaurationQuantites[] = $count;
            $prestationsTypes[] = 'Enfant';  
            $totalExtra += $count * $restaurants[$index]->prix_enfant;
        }
    }

    foreach ($extras['spa_counts'] as $index => $count) {
        if ($count > 0) {       

            $massageIds[] = $massages[$index]->id;
            $massageQuantites[] = $count; 
            $prestationsTypes[] = 'Massage';
            $totalExtra += $count * $massages[$index]->prix_adulte;
        }
    }

    $prixFinal = $prixTotal + $totalExtra; 

    return view('pages.client-info', compact(
        'extras', 'massages', 'restaurants', 'totalExtra', 'nomCabane', 
        'capacite', 'dateArrivee', 'dateDepart', 'nombreNuitees', 
        'nombreAdultes', 'nombreEnfants', 'prixTotal', 'prixFinal',
        'restaurationIds', 'restaurationQuantites', 'massageIds', 
        'massageQuantites', 'prestationsTypes'
    )); 
}

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        
    // 
}

    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
