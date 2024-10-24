<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log; 



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
    //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

$nomCabane = $request->input('nomCabane');
$dateArrivee = $request->input('dateArrivee');
$dateDepart = $request->input('dateDepart');
$nombreNuitees = $request->input('nombreNuitees');
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
    'nombreEnfants' => 'nullable|integer',
    'dateArrivee' => 'required|date',
    'dateDepart' => 'required|date',
    'nombreNuitees' => 'required|integer',
]);

$user = null;
$guest = null;

if (Auth::check()) {
    $user = Auth::user();
    
    Reservation::create([
        'user_id' => $user->id,
        'guest_id' => null,
        'message' => $validated['message'],
        'nomCabane' => $nomCabane,
        'nombreAdultes' => $nombreAdultes,
        'nombreEnfants' => $nombreEnfants,
        'dateArrivee' => $dateArrivee,
        'dateDepart' => $dateDepart,
        'nombreNuitees' => $nombreNuitees,
    ]);
} else {
    $guest = Guest::create([
        'prenom' => $validated['prenom'],
        'nom' => $validated['nom'],
        'telephone' => $validated['telephone'],
        'email' => $validated['email'],
        'adresse_postale' => $validated['adresse_postale'],
        'code_postal' => $validated['code_postal'],
        'ville' => $validated['ville'],
    ]);

    Reservation::create([
        'user_id' => null,
        'guest_id' => $guest->id,
        'message' => $validated['message'],
        'nomCabane' => $nomCabane,
        'nombreAdultes' => $nombreAdultes,
        'nombreEnfants' => $nombreEnfants,
        'dateArrivee' => $dateArrivee,
        'dateDepart' => $dateDepart,
        'nombreNuitees' => $nombreNuitees,
    ]);
}

return view('pages.paiement', compact(
    'nomCabane', 'dateArrivee', 'dateDepart', 'nombreNuitees', 
    'nombreAdultes', 'nombreEnfants', 'user', 'guest',
));

    
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
