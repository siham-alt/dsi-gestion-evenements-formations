<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\Models\Inscription;

class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $formations = Formation::orderBy('created_at', 'DESC')->get();
        return view('Formation.index')->with('formations', $formations);

    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Formation.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'nom' => 'required',
            'description' => 'required',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date',
            'nb_places' => 'required'
        ];
        if ($request->hasFile('image')) {
            $rules['image'] = 'image';
        }

        $validator = Validator::make($request->all(), $rules);

        $formations = new Formation();
        $formations->nom = $request->nom;
        $formations->description = $request->description;
        $formations->date_debut = $request->date_debut;
        $formations->date_fin = $request->date_fin;
        $formations->nb_places = $request->nb_places;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $imageName = time() . '.' . $ext;
            $image->move(public_path('uploads/Formation'), $imageName);
            $formations->image = $imageName;
        }

        $formations->save();

        return redirect()->route('Formation.index')->with('success', 'Formation ajouté avec succès');
    }

    public function edit($id)
    {
        $formations = Formation::findOrFail($id);
        return view('Formation.edit', compact('formations'));
    }
    public function show()
    {
        $formations = Formation::orderBy('created_at', 'DESC')->get();
        return view('Formation.show', compact('formations'));
    }
    



      public function update( $id,Request $request)
      {
        $formations =Formation::findOrFail($id);
        $rules = [
            'nom' => 'required',
            'description' => 'required',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date',
            'nb_places' => 'required'
        ];
        if ($request->hasFile('image')) {
            $rules['image'] = 'image';
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }



       
        $formations->nom = $request->nom;
        $formations->description = $request->description;
        $formations->date_debut = $request->date_debut;
        $formations->date_fin = $request->date_fin;
        $formations->nb_places = $request->nb_places;



           
        
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($evenements->image && File::exists(public_path('uploads/Formation/' . $evenements->image))) {
                File::delete(public_path('uploads/Formation/' . $formations->image));
            }
    
            $image = $request->file('image');
            $ext = $image->getClientOriginalExtension();
            $imageName = time() . '.' . $ext;
            $image->move(public_path('uploads/Formation'), $imageName);
            $evenements->image = $imageName;
    
            // Debugging messages
            echo "Image uploaded successfully: " . $imageName;
        } else {
            // Debugging message
            echo "No image uploaded";
        }
    
        $formations->save();
    
        return redirect()->route('Formation.index')->with('success', 'Formation mis à jour avec succès');
    }
    



      public function destroy(string $id)
      {
          $formations =Formation::findOrFail($id);
          $formations->delete();
          return redirect('/Formation')->with('succes','formation supprimée avec succès');
      }
     
          public function inscriptions($id)
          {
              $formation = Formation::findOrFail($id);
              $inscriptions = Inscription::where('formation_id', $id)->get();
      
              return view('Formation.insc', compact('formation', 'inscriptions'));
          }
      }
      
    