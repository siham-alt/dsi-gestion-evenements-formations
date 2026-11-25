<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Evenement;
use App\Models\InscriptionEv;
use Illuminate\Support\Facades\Auth;

class InscriptionEvController extends Controller
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
        // Validate the request data
        $request->validate([
            'evenement_id' => 'required|exists:evenements,id',
            'nom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        $evenement = Evenement::find($request->evenement_id);

        if ($evenement->inscription_evs->count() >= $evenement->nb_places) {
            return redirect()->back()->with('error', 'Cet événement est complet.');
        }
        if (InscriptionEv::where('evenement_id', $evenement->id)->where('email', $request->email)->exists()) {
            return back()->with('error', ' Vous etes déjà inscrit à cet événement.');
        }

        // Create a new inscription
        $inscription = new InscriptionEv();
        $inscription->evenement_id = $request->evenement_id;
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
