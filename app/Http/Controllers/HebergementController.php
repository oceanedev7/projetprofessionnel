<?php

namespace App\Http\Controllers;
use App\Models\Cabane;
use App\Models\Equipement;
use Illuminate\Http\Request;

class HebergementController extends Controller
{
    /**
     * Afficher les informations des cabanes
     */
    public function index()
    {
        $afficherCabanes = Cabane::all();
        $afficherEquipements = Equipement::with('cabane')->get();
    return view(
        'pages.admin.infos', ['cabanes'=>$afficherCabanes, 'equipements'=>$afficherEquipements]
    );}

    /**
     * Ajouter de nouvelles cabanes
     */
    public function create(Request $request)
    {
        // dd($request);
        $request->validate(
            [
            'nomCabane'=>'required|string|min:3',
            'description'=>'required|string',
            'capacite'=>'required|integer',
            'prix'=>'required|decimal:0',
            'disponibilite'=>'required|boolean',
         
            ]);
         Cabane::create($request->all());
 
    return redirect("/infos/cabanes");
    }

  
    /**
     * Modifier un ou plusieurs informations
     */
    public function edit(string $id)
    {
        $cabane=Cabane::findOrFail($id); 
        // dd($edit);
        return view("pages.admin.editCabane", compact('cabane'));
    }

    /**
     * Mettre à jour les informations
     */
    public function update(Request $request, $id)
    {
        // dd($request); 
        // dd($request->nomCabane);
        $validatedData =  $request->validate(
            [
            'nomCabane'=>'required|string|min:3',
            'description'=>'required|string',
            'capacite'=>'required|integer',
            'prix'=>'required|decimal:0',
            'disponibilite'=>'required|boolean',
            ]);
            // dd($request->nomCabane);

            $update=Cabane::findOrFail($id);           
            $update->update($validatedData);
    
            return redirect("/infos/cabanes/update");
    }

    /**
     * Supprimer une cabane 
     */
    public function destroy(string $id)
    {
        $delete  = Cabane::findOrFail($id);
        $delete->delete();

        return redirect("/infos/cabanes");
    }
}
