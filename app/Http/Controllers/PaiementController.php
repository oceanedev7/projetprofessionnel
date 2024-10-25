<?php

namespace App\Http\Controllers;

use App\Models\Paiement;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;

class PaiementController extends Controller
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
    $montant = session('prixFinal');

        if (!$montant || $montant <= 0) {
            return redirect()->back()->with('error', 'Le montant de la réservation est invalide.');
        }

        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
          
            $charge = Charge::create([
                'amount' => $montant * 100, 
                'currency' => 'eur', 
                'source' => $request->stripeToken, 
                'description' => 'Paiement pour votre commande', 
            ]);

           
            Paiement::create([
                'moyenPaiement' => 'Stripe', 
                'montant' => $montant, 
                'statutPaiement' => true, 
                'description' => 'Paiement effectué via Stripe pour la commande #' . $charge->id,
            ]);

            $reservationId = $request->id;
            $reservation = Reservation::find($reservationId);
            if ($reservation) {
                $reservation->prix = $montant;
                $reservation->save();
            }

            
            return redirect()->route('confirmed')->with('success', 'Paiement effectué avec succès !');
        } catch (\Exception $e) {
            
            Paiement::create([
                'moyenPaiement' => 'Stripe',
                'montant' => $montant,
                'statutPaiement' => false, 
                'description' => 'Erreur lors du paiement : ' . $e->getMessage(),
            ]);

            
            return redirect()->route('payment.process')->with('error', 'Erreur lors du paiement : ' . $e->getMessage());
}
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
