<?php

namespace App\Http\Controllers;

use App\Models\Equipement;
use App\Models\Cabane;

use Illuminate\Http\Request;

class EquipementController extends Controller
{
    /**
     * 
     */
    public function index()
    {
      
        $afficherCabanes = Cabane::all();
        $afficherEquipements = Equipement::with('cabane')->get();
       
    return view(
        'pages.admin.equipements-create', ['cabanes'=>$afficherCabanes, 'equipements'=>$afficherEquipements]
    );}

    /**
     * Ajouter un nouvel équipement
     */
    public function create(Request $request)
    {
        $request->validate([
            'nomEquipement' => 'required|string',
            'categorie' => 'required|string',
            'cabane_id'=>'required|exists:cabanes,id', 
            
        ]);

        Equipement::create($request->all()); 

        return redirect("/admin/equipements");
    }
    

    // /**
    //  * Store a newly created resource in storage.
    //  */
    
    //     public function store(Request $request)
    //     {
    //        //
    // }


    /**
     * Modifier une ou plusieurs informations
     */
    public function edit(string $id)
    {
        $equipement=Equipement::findOrFail($id); 
        $cabanes = Cabane::all();
        // dd($equipement);
        return view("pages.admin.editEquipement", compact('equipement', 'cabanes'));
    }

    /**
     * Mettre à jour les informations
     */
    public function update(Request $request, $id)
    {
        $validatedData =  $request->validate(
            [
            'nomEquipement'=>'required|string',
            'categorie'=>'required|string',
            'cabane_id'=>'required|exists:cabanes,id',
            
            ]);
            // dd($request->nomCabane);

            $update=Equipement::findOrFail($id);           
            $update->update($validatedData);
    
            return redirect("/admin/equipements");
    }


    /**
     * Supprimer un equipement
     */
    public function destroy(string $id)
    {
        $delete  = Equipement::findOrFail($id);
        $delete->delete();

        return redirect("/admin/equipements");
    }
}
