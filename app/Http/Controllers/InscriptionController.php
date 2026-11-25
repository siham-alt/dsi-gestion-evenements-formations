<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Inscription;
use App\Models\Formation;
use Illuminate\Support\Facades\Auth;

class InscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'formation_id' => 'required|exists:formations,id',
            'nom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        $formation = Formation::find($request->formation_id);

        if ($formation->inscriptions->count() >= $formation->nb_places) {
            return redirect()->back()->with('error', 'Cette formation est complète.');
        }
        if (Inscription::where('formation_id', $formation->id)->where('email', $request->email)->exists()) {
            return back()->with('error', 'Vous etes déjà inscrit à cet événement.');
        }

        // Create a new inscription
        $inscription = new Inscription();
        $inscription->formation_id = $request->formation_id;
        $inscription->user_id = Auth::id(); 
        $inscription->nom = $request->nom;
        $inscription->email = $request->email;
        $inscription->date_inscription = now();

        // Save the inscription
        $inscription->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Inscription réussie!');
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
