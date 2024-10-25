<?php

namespace App\Http\Controllers;

use App\Models\Paiement;
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
    // return view ('pages.paiement');
    // // Récupérer le montant total depuis la session
    // $montant = session('prixFinal');

    // // Vérifier que le montant existe et est valide
    // if (!$montant || $montant <= 0) {
    //     return redirect()->back()->with('error', 'Le montant de la réservation est invalide.');
    // }

    // // Définir la clé API Stripe
    // Stripe::setApiKey(env('STRIPE_SECRET'));

    // try {
    //     // Créer la charge de paiement Stripe
    //     $charge = Charge::create([
    //         'amount' => $montant * 100, // Convertir le montant en cents
    //         'currency' => 'eur', // Devise en euros
    //         'source' => $request->stripeToken, // Token Stripe généré par Stripe.js
    //         'description' => 'Paiement pour votre commande', // Description du paiement
    //     ]);

    //     // Vérifier si le paiement est réussi
    //     $paymentStatus = $charge->status === 'succeeded';

    //     // Enregistrer dans la base de données avec le statut approprié
    //     Paiement::create([
    //         'moyenPaiement' => 'Stripe', // Moyen de paiement utilisé
    //         'montant' => $montant, // Montant payé
    //         'statutPaiement' => $paymentStatus, // Statut du paiement (true ou false)
    //         'description' => 'Paiement effectué via Stripe pour la commande #' . $charge->id,
    //     ]);

    //     // Redirection vers la page de confirmation
    //     return redirect()->route('confirmed')->with('success', 'Paiement effectué avec succès !');
    // } catch (\Exception $e) {
    //     // En cas d'échec, on enregistre le paiement comme échoué
    //     Paiement::create([
    //         'moyenPaiement' => 'Stripe',
    //         'montant' => $montant,
    //         'statutPaiement' => false, // Paiement échoué
    //         'description' => 'Erreur lors du paiement : ' . $e->getMessage(),
    //     ]);

    //     // Redirection vers une page d'erreur
    //     return redirect()->route('accueil')->with('error', 'Erreur lors du paiement : ' . $e->getMessage());
    // }
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
