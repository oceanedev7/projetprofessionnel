<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestation;

class PrestationViewController extends Controller
{

    public function showPrestations()
    {
    
    $restaurants = Prestation::with('categorie')->where('categorie_id', 1)->get();
    $massages = Prestation::with('categorie')->where('categorie_id', 2)->get();

    return view('pages.prestations', [
        'restaurants' => $restaurants,
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
