<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Newsletter;


class NewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $afficherEmails = Newsletter::all();
        // dd($afficherEmails);
    return view(
        'pages.admin.newsletter', ['newsletters'=>$afficherEmails]
    );}

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
    
        ]);
    //  dd($request);

       Newsletter::create($request->all()); 
        return redirect()->route('accueil');
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
        // dd($id);
        $delete  = Newsletter::findOrFail($id);
        $delete->delete();

        return redirect("/newsletter");
    }
}
