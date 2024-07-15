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
        Cabane::with('equipements')->findOrFail(1);
        return view('pages.cabanes.niddouillet', ['cabane' => $cabane,  'equipements' => $cabane->equipements]);
    }
    
    public function showCabaneOsmose() {
        $cabane = Cabane::with('equipements')->findOrFail(2);
        Cabane::with('equipements')->findOrFail(2);
        return view('pages.cabanes.osmose', ['cabane' => $cabane,  'equipements' => $cabane->equipements]);
    }
        

    public function showCabaneEscapade() {
        $cabane = Cabane::with('equipements')->findOrFail(3);
        Cabane::with('equipements')->findOrFail(3);
        return view('pages.cabanes.escapade', ['cabane' => $cabane,  'equipements' => $cabane->equipements]);
    }

    public function showCabaneEden() {
        $cabane = Cabane::with('equipements')->findOrFail(4);
        Cabane::with('equipements')->findOrFail(4);
        return view('pages.cabanes.eden', ['cabane' => $cabane,  'equipements' => $cabane->equipements]);
    }
    










    }

  