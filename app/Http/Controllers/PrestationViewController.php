<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestation;

class PrestationViewController extends Controller
{

    public function showPrestations()
    {
        $dejeuner = Prestation::with('categorie')->where('id', 1)->first();
    $diner = Prestation::with('categorie')->where('id', 2)->first();
    $massages = Prestation::with('categorie')->where('categorie_id', 2)->get();

    return view('pages.prestations', [
        'dejeuner' => $dejeuner,
        'diner' => $diner,
        'massages' => $massages,

        'dejeunerDescription' => 'dejeuner_description',
        'dejeunerType' => 'dejeuner_type',
        'dinerDescription' => 'diner_description',
        'dinerType' => 'diner_type',
    
    ]);
    }



//     public function showPrestationMassage()
// {
//     $massages = Prestation::with('categorie')->where('categorie_id', 2)->get();
//     // dd($massages);
//     return view('pages.prestations', [
//         'massages' => $massages,
//     ]);
// }
}
