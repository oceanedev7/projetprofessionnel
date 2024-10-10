<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cabane;
use Carbon\Carbon;

class ReservationController extends Controller
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



    public function checkAvailability(Request $request)
    {
        $dateArrivee = Carbon::createFromFormat('d-m-Y', $request->input('dateArrivee'));
        $dateDepart = Carbon::createFromFormat('d-m-Y', $request->input('dateDepart'));
        $duration = $dateArrivee->diffInDays($dateDepart);
        
        $nombreAdultes = $request->input('nombreAdultes');
        $nombreEnfants = $request->input('nombreEnfants');
        
        $nombreTotalPersonnes = $nombreAdultes + $nombreEnfants;
    
        $availableCabanes = Cabane::whereDoesntHave('reservations', function($query) use ($dateArrivee, $dateDepart) {
            $query->where(function($query) use ($dateArrivee, $dateDepart) {
                $query->whereBetween('reservation_cabanes.dateArrivee', [$dateArrivee, $dateDepart])
                      ->orWhereBetween('reservation_cabanes.dateDepart', [$dateArrivee, $dateDepart])
                      ->orWhere(function($query) use ($dateArrivee, $dateDepart) {
                          $query->where('reservation_cabanes.dateArrivee', '<=', $dateArrivee)
                                ->where('reservation_cabanes.dateDepart', '>=', $dateDepart);
                      });
            });
        })
        ->where('capacite', '>=', $nombreTotalPersonnes)
        ->get();

        foreach ($availableCabanes as $cabane) {
            $cabane->prixTotal = $duration * $cabane->prix; 
        }
    
        return view('pages.available-rooms', compact('duration', 'availableCabanes', 'dateArrivee', 'dateDepart', 'nombreAdultes', 'nombreEnfants'));
    
    }
    
    public function extras(Request $request)
    {
        $data = $request->all(); 

        return view('pages.extras', [
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
    
}
