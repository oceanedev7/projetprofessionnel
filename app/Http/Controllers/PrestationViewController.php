<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestation;

class PrestationViewController extends Controller
{
    public function showPrestationDejeuner() {
        $dejeuner = Prestation::with('categorie')->findOrFail(1);
        $diner = Prestation::with('categorie')->findOrFail(2);
        return view('pages.prestations', [
            'dejeuner' => $dejeuner,
            'diner' => $diner
        ]);
    }

    public function showPrestationDiner() {
        $diner = Prestation::with('categorie')->findOrFail(2);
        return view('pages.prestations', [
            'diner' => $diner
        ]);
    }
}
