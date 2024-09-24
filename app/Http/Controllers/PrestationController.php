<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestation;
use App\Models\Categorie;



class PrestationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {      
        $afficherPrestations = Prestation::with('categorie')->get();
        $categories = Categorie::all();

    return view(
        'pages.admin.prestations-create', ['prestations'=>$afficherPrestations,  'categories' => $categories ])
    ;}

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
// dd($request);
        $request->validate([
            'categorie_id'=>'required|exists:categories,id', 
            'type' => 'required|string',
            'duree'=> 'nullable|integer',
            'prix_adulte'=> 'required|numeric',
            'prix_enfant'=> 'nullable|numeric',
            'description' => 'required|string',
        ]);
    
        

       Prestation::create($request->all()); 
        return redirect("/admin/prestations");
    }

    public function createCategory(Request $request)
    {

    $request->validate([
        'categorie_id' => 'nullable|exists:categories,id', 
        'new_categorie' => 'nullable|string|max:255', 
    ]);

    if ($request->new_categorie) {
        Categorie::create(['type' => $request->new_categorie]);
    }

    return redirect("/admin/prestations");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        // dd($id);
        $prestation=Prestation::findOrFail($id);  
        $categories = Categorie::all();
      
        return view("pages.admin.editPrestation", compact('prestation', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $validatedData =  $request->validate(
            [
            'categorie_id'=>'required|exists:categories,id', 
            'type' => 'required|string',
            'duree'=> 'required|integer',
            'prix_adulte'=> 'required|numeric',
            'prix_enfant' => 'nullable|numeric',
            'description' => 'required|string',
            
            ]);
            

            $update=Prestation::findOrFail($id);           
            $update->update($validatedData);
            
            return redirect()->route('afficherPrestation');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete  = Prestation::findOrFail($id);
        $delete->delete();

        return redirect("/admin/prestations");
    }
}
