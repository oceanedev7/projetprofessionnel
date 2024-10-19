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
            'dejeuner_adulte' => 'required|integer|min:0',
            'dejeuner_enfant' => 'required|integer|min:0',
            'diner_adulte' => 'required|integer|min:0',
            'diner_enfant' => 'required|integer|min:0',
            'spa_count' => 'array', 
        ]);
    
        $extras = [
            'dejeuner_adulte' => $validatedData['dejeuner_adulte'],
            'dejeuner_enfant' => $validatedData['dejeuner_enfant'],
            'diner_adulte' => $validatedData['diner_adulte'],
            'diner_enfant' => $validatedData['diner_enfant'],
            'spa_counts' => $validatedData['spa_count'],
        ];
        
        $nomCabane = $request->input('nomCabane');
        $capacite = $request->input('capacite');
        $prixTotal = $request->input('prixTotal');
        $dateArrivee = $request->input('dateArrivee');
        $dateDepart = $request->input('dateDepart');
        $duration = $request->input('duration');
        $nombreAdultes = $request->input('nombreAdultes');
        $nombreEnfants = $request->input('nombreEnfants');
    
        $dejeuner = Prestation::with('categorie')->where('id', 1)->first();
        $diner = Prestation::with('categorie')->where('id', 2)->first();
        $massages = Prestation::with('categorie')->where('categorie_id', 2)->get();
    
        $totalExtra = 0;
    
        $totalExtra += $extras['dejeuner_adulte'] * $dejeuner->prix_adulte;
        $totalExtra += $extras['dejeuner_enfant'] * $dejeuner->prix_enfant;
        $totalExtra += $extras['diner_adulte'] * $diner->prix_adulte;
        $totalExtra += $extras['diner_enfant'] * $diner->prix_enfant;
    
        foreach ($extras['spa_counts'] as $index => $count) {
            if ($count > 0) {
                $totalExtra += $count * $massages[$index]->prix_adulte;
            }
        }

        $prixFinal = $prixTotal + $totalExtra; 
    
        return view('pages.client-info', compact('extras', 'massages', 'dejeuner', 'diner', 'totalExtra', 
            'nomCabane', 'capacite', 'dateArrivee', 'dateDepart', 'duration', 
            'nombreAdultes', 'nombreEnfants', 'prixTotal', 'prixFinal' )); 
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
