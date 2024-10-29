<?php

namespace App\Http\Controllers;

use App\Models\Prestation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ExtrasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

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
    
    
        return view('pages.extras', [
            'restaurants' => $restaurants,
            'massages' => $massages,
            'nomCabane' => $nomCabane,
            'capacite' => $capacite,
            'prixTotal' => $prixTotal,
            'dateArrivee' => $dateArrivee,
            'dateDepart' => $dateDepart,
            'nombreNuitees' => $nombreNuitees,
            'nombreAdultes' => $nombreAdultes,
            'nombreEnfants' => $nombreEnfants,
        ]);
    }
    


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
