<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prestation;


class PrestationController extends Controller
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
    public function create(Request $request)
    {
        $request->validate([
            'categorie'=> 'required|string',
            'type' => 'required|string',
            'duree'=> 'required|integer',
            'prix'=> 'required|decimal:0',
            'description' => 'required|string',
        ]);

       Prestation::create($request->all()); 

        return redirect("/infos/cabanes");
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
        $prestation=Prestation::findOrFail($id); 
        return view("pages.admin.editPrestation", compact('prestation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData =  $request->validate(
            [
            'categorie'=> 'required|string',
            'type' => 'required|string',
            'duree'=> 'required|integer',
            'prix'=> 'required|decimal:0',
            'description' => 'required|string',
            ]);

            $update=Prestation::findOrFail($id);           
            $update->update($validatedData);
    
            return redirect("/infos/cabanes");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete  = Prestation::findOrFail($id);
        $delete->delete();

        return redirect("/infos/cabanes");
    }
}
