<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cabane;


class CabaneViewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showCabaneNidDouillet() {
        $cabane = Cabane::with('equipements')->findOrFail(1);
        return view('pages.cabanes.niddouillet', ['cabane' => $cabane,  'equipements' => $cabane->equipements,
    
     'nomCabane' => 'nidDouillet',
     'descriptionCabane' => 'nidDouillet-description',
     'prixCabane' => 'prix-2',
     
    ]);
    }
    
    public function showCabaneOsmose() {
        $cabane = Cabane::with('equipements')->findOrFail(2);
        return view('pages.cabanes.osmose', ['cabane' => $cabane,  'equipements' => $cabane->equipements,
    
        'nomCabane' => 'osmose',
        'descriptionCabane' => 'osmose-description',
        'prixCabane' => 'prix-2',
    
    ]);
    }
        

    public function showCabaneEscapade() {
        $cabane = Cabane::with('equipements')->findOrFail(3);
        return view('pages.cabanes.escapade', ['cabane' => $cabane,  'equipements' => $cabane->equipements,
    
        'nomCabane' => 'escapade',
        'descriptionCabane' => 'escapade-description',
        'prixCabane' => 'prix-4',
    
    ]);
    }

    public function showCabaneEden() {
        $cabane = Cabane::with('equipements')->findOrFail(4);
       
        return view('pages.cabanes.eden', ['cabane' => $cabane,  'equipements' => $cabane->equipements,
    
        'nomCabane' => 'eden',
        'descriptionCabane' => 'eden-description',
        'prixCabane' => 'prix-6',
    ]);
    }
    










    }

  