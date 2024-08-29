<?php

namespace App\Http\Controllers;

use App\Models\Formulaire;
use App\Models\Visiteur;

use Illuminate\Http\Request;

class FormulaireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $afficherFormulaire = Formulaire::with('visiteur')->get();
        // dd($afficherEmails);
    return view(
        'pages.admin.demandecontact', ['formulaires'=>$afficherFormulaire]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        $donneesVisiteurs = $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|string',
        ]);

        $visiteur = Visiteur::create($donneesVisiteurs);

    
        $request->validate([
        // 'visiteur_id' => 'required|exists:visiteurs,id',
        'prenom' => 'required|string',
        'nom' => 'required|string',
        'numeroTelephone' => 'required|string',
        'email' => 'required|email',
        'message' => 'required|string',
    
        ]);

        $request['visiteur_id'] = $visiteur->id;

    //  dd($request);
       Formulaire::create($request->all()); 
        return redirect()->route('contact')->with('success', 'Votre message a été transmis avec succès !');
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
        $delete  = Formulaire::findOrFail($id);
        $delete->delete();

        return redirect("/formulaire");
    }
}
