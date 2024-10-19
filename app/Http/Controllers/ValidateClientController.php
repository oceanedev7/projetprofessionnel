<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ValidateClientController extends Controller
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
        $nomCabane = $request->input('nomCabane');
        $dateArrivee = $request->input('dateArrivee');
        $dateDepart = $request->input('dateDepart');
        $duration = $request->input('duration');
        $nombreAdultes = $request->input('nombreAdultes');
        $nombreEnfants = $request->input('nombreEnfants');

        $validated = $request->validate([
            'prenom' => 'required|string',
            'nom' => 'required|string',
            'telephone' => 'required|string',
            'email' => 'required|email',
            'adresse_postale' => 'required|string',
            'code_postal' => 'required|string',
            'ville' => 'required|string',
            'message' => 'required|string',

            'nomCabane' => 'required|string',
            'nombreAdultes' => 'required|integer',
            'nombreEnfants' => 'required|integer',
            'dateArrivee' => 'required|date',
            'dateDepart' => 'required|date',
            'nombreNuitees' => 'required|integer',
        ]);
    
        // Vérifier si l'utilisateur est authentifié
        if (Auth::check()) {
            $user = Auth::user();
        } else {
         
            $user = User::create([
                'prenom' => $validated['prenom'],
                'nom' => $validated['nom'],
                'telephone' => $validated['telephone'],
                'email' => $validated['email'],
                'adresse_postale' => $validated['adresse_postale'],
                'code_postal' => $validated['code_postal'],
                'ville' => $validated['ville'],
            ]);
        }
    
       
        Reservation::create([
            'user_id' => $user->id,
            'message' => $validated['message'],
            'nomCabane' => $validated['nomCabane'],
        'nombreAdultes' => $validated['nombreAdultes'],
        'nombreEnfants' => $validated['nombreEnfants'],
        'dateArrivee' => $validated['dateArrivee'],
        'dateDepart' => $validated['dateDepart'],
        'nombreNuitees' => $validated['nombreNuitees'],
        ]);
    
        return redirect()->route('resa-payment', [
            'nomCabane' => $nomCabane,
            'dateArrivee' => $dateArrivee,
            'dateDepart' => $dateDepart,
            'nombreNuitees' => $duration,
            'nombreAdultes' => $nombreAdultes,
            'nombreEnfants' => $nombreEnfants,
        ]);
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
