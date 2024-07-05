<?php

namespace App\Http\Controllers;

use App\Models\Equipement;
use App\Models\Cabane;

use Illuminate\Http\Request;

class EquipementController extends Controller
{
    /**
     * Filtrer les equipements par cabanes
     */
    public function index()
    {
        $equipements = Equipement::with('cabane')->get();
    dd($equipements); // Vérifiez que cette ligne affiche les données attendues

    return view('pages.admin.infos', ['equipements' => $equipements]);
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create(Request $request)
    // {
    //     $request->validate([
    //         'nomEquipement' => 'required|string',
    //         'categorie' => 'required|string',
    //         'cabane_id', 
    //     ]);

    //     Equipement::create($request->all()); 

    //     return redirect("/infos/cabanes");}
    

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
