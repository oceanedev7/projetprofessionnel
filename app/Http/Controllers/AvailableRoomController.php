<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cabane;
use App\Models\Prestation;
use Carbon\Carbon;


class AvailableRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
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

        $dateArrivee = Carbon::createFromFormat('d-m-Y', $request->input('dateArrivee'));
        $dateDepart = Carbon::createFromFormat('d-m-Y', $request->input('dateDepart'));
        $nombreNuitees = $dateArrivee->diffInDays($dateDepart);

        if ($dateDepart <= $dateArrivee) {
            return redirect()->back()->withErrors(['dateDepart' => 'La date de départ doit être après la date d\'arrivée.']);
        }
        
        $nombreAdultes = $request->input('nombreAdultes');
        $nombreEnfants = $request->input('nombreEnfants');
        
        $nombreTotalPersonnes = $nombreAdultes + $nombreEnfants;
    
        $availableCabanes = Cabane::whereDoesntHave('reservations', function($query) use ($dateArrivee, $dateDepart) {
            $query->where(function($query) use ($dateArrivee, $dateDepart) {
                $query->whereBetween('reservations.dateArrivee', [$dateArrivee, $dateDepart])
                      ->orWhereBetween('reservations.dateDepart', [$dateArrivee, $dateDepart])
                      ->orWhere(function($query) use ($dateArrivee, $dateDepart) {
                          $query->where('reservations.dateArrivee', '<=', $dateArrivee)
                                ->where('reservations.dateDepart', '>=', $dateDepart);
                      });
            });
        })
        ->where('capacite', '>=', $nombreTotalPersonnes)
        ->get();

        foreach ($availableCabanes as $cabane) {
            $cabane->prixTotal = $nombreNuitees * $cabane->prix; 
        }
    
        return view('pages.available-rooms', compact('nombreNuitees', 'availableCabanes', 'dateArrivee', 'dateDepart', 'nombreAdultes', 'nombreEnfants'));
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
