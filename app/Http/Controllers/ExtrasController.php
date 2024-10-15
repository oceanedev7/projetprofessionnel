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
    $data = $request->all(); 
        $dejeuner = Prestation::with('categorie')->where('id', 1)->first();
        $diner = Prestation::with('categorie')->where('id', 2)->first();
        $massages = Prestation::with('categorie')->where('categorie_id', 2)->get();

        return view('pages.extras', [
            'dejeuner' => $dejeuner,
            'diner' => $diner,
            'massages' => $massages,
            'nomCabane' => $data['nomCabane'],
            'capacite' => $data['capacite'],
            'prixTotal' => $data['prixTotal'],
            'dateArrivee' => $data['dateArrivee'],
            'dateDepart' => $data['dateDepart'],
            'duration' => $data['duration'],
            'nombreAdultes' => $data['nombreAdultes'],
            'nombreEnfants' => $data['nombreEnfants'],
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
