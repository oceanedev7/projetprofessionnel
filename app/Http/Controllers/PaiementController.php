<?php

namespace App\Http\Controllers;

use App\Models\Paiement;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Stripe\Stripe;
use Stripe\Charge;

class PaiementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.paiement');
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

        Stripe::setApiKey(env('STRIPE_SECRET'));

        try {
            
            $charge = Charge::create([
                'amount' => $montant * 100, 
                'currency' => 'eur', 
                'source' => $request->stripeToken, 
                'description' => 'Paiement pour votre réservation', 
            ]);

            Paiement::create([
                'moyenPaiement' => 'Stripe', 
                'montant' => $montant, 
                'statutPaiement' => true, 
                'description' => 'Paiement effectué via Stripe pour la commande #' . $charge->id,
            ]);

            return redirect()->route('confirmed')->with('success', __('content.success'));
            
        } catch (\Exception $e) {
            
            Paiement::create([
                'moyenPaiement' => 'Stripe',
                'montant' => $montant,
                'statutPaiement' => false, 
                'description' => 'Erreur lors du paiement : ' . $e->getMessage(),
            ]);

            return redirect()->route('payment.failure')->with('error', 'Erreur lors du paiement. Veuillez réessayer.');
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
