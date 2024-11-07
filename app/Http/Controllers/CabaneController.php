<?php

namespace App\Http\Controllers;
use App\Models\Cabane;
use App\Models\Equipement;
use App\Models\Prestation;
use App\Models\Categorie;
use Illuminate\Http\Request;

class CabaneController extends Controller
{
    /**
     * Afficher les informations des cabanes
     */
    public function index()
    {
        $afficherCabanes = Cabane::all();
      
        return view('pages.admin.cabanes-create', ['cabanes'=>$afficherCabanes]
    );}

    /**
     * Ajouter de nouvelles cabanes
     */
    public function create(Request $request)
    {
        $request->validate(
            [
            'nomCabane'=>'required|string|min:3',
            'description'=>'required|string',
            'capacite'=>'required|integer',
            'prix'=>'required|decimal:0',
            'disponibilite'=>'required|boolean',
         
            ]);
         Cabane::create($request->all());
 
    return redirect("/admin/cabanes");
    }




    /**
     * Modifier un ou plusieurs informations
     */
    public function edit(string $id)
    {
        $cabane=Cabane::findOrFail($id); 
        return view("pages.admin.editCabane", compact('cabane'));
    }

    /**
     * Mettre à jour les informations
     */
    public function update(Request $request, $id)
    {
        
        $validatedData =  $request->validate(
            [
            'nomCabane'=>'required|string|min:3',
            'description'=>'required|string',
            'capacite'=>'required|integer',
            'prix'=>'required|numeric',
            'disponibilite'=>'required|boolean',
            ]);
               
            $update=Cabane::findOrFail($id);  
            $update->update($validatedData);
    
            return redirect()->route('afficherCabane');
    }

        /**
     * Mettre à jour les informations
     */
    // public function updateTest(Request $request, $id)
    // {
    //     $validatedData =  $request->validate(
    //         [
    //         'nomCabane'=>'required|string|min:3',
    //         'description'=>'required|string',
    //         'capacite'=>'required|integer',
    //         'prix'=>'required|numeric',
    //         'disponibilite'=>'required|boolean',
    //         ]);
    //         // dd($request->nomCabane);

    //         $update=Cabane::findOrFail($id);           
    //         $update->update($validatedData);
    
    //         return redirect()->route('afficherCabane');
    //         // return view('pages.admin.infos');
    // }



    /**
     * Supprimer une cabane 
     */
    public function destroy(string $id)
    {
        $delete  = Cabane::findOrFail($id);
        $delete->delete();

        return redirect("/admin/cabanes");
    }
}
