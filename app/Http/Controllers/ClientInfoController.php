<?php

namespace App\Http\Controllers;

use App\Models\Prestation;
use Illuminate\Http\Request;

class ClientInfoController extends Controller
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
        $validatedData = $request->validate([
            'dejeuner_adulte' => 'required|integer|min:0',
            'dejeuner_enfant' => 'required|integer|min:0',
            'diner_adulte' => 'required|integer|min:0',
            'diner_enfant' => 'required|integer|min:0',
            'spa_count' => 'array', 
            // 'spa_count.*' => 'integer|min:0'
        ]);
    
        $extras = [
            'dejeuner_adulte' => $validatedData['dejeuner_adulte'],
            'dejeuner_enfant' => $validatedData['dejeuner_enfant'],
            'diner_adulte' => $validatedData['diner_adulte'],
            'diner_enfant' => $validatedData['diner_enfant'],
            'spa_counts' => $validatedData['spa_count'],
        ];
    
        $dejeuner = Prestation::with('categorie')->where('id', 1)->first();
        $diner = Prestation::with('categorie')->where('id', 2)->first();
        $massages = Prestation::with('categorie')->where('categorie_id', 2)->get();
    
        $total = 0;
    
        $total += $extras['dejeuner_adulte'] * $dejeuner->prix_adulte;
        $total += $extras['dejeuner_enfant'] * $dejeuner->prix_enfant;
        $total += $extras['diner_adulte'] * $diner->prix_adulte;
        $total += $extras['diner_enfant'] * $diner->prix_enfant;
    
        foreach ($extras['spa_counts'] as $index => $count) {
            if ($count > 0) {
                $total += $count * $massages[$index]->prix_adulte;
            }
        }
    
        return view('pages.client-info', compact('extras', 'massages', 'dejeuner', 'diner', 'total'));
       
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
