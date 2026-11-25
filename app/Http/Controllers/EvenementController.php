<?php namespace App\Http\Controllers;

use App\Models\Evenement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use App\Models\InscriptionEv;

class EvenementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $evenements =Evenement::orderBy('created_at', 'DESC')->get();
        return view('Evenement.index')->with('evenements', $evenements);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Evenement.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
      
    $rules = [
        'title' => 'required',
        'description' => 'required',
        'date' => 'required|date',
        'location' => 'required',
        'nb_places' => 'required'
    ];
    if ($request->hasFile('image')) {
        $rules['image'] = 'image';
    }

    $validator = Validator::make($request->all(), $rules);

    $evenements = new Evenement();
    $evenements->title = $request->title;
    $evenements->description = $request->description;
    $evenements->date = $request->date;
    $evenements->location = $request->location;
    $evenements->nb_places = $request->nb_places;

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $ext = $image->getClientOriginalExtension();
        $imageName = time() . '.' . $ext;
        $image->move(public_path('uploads/Evenement'), $imageName);
        $evenements->image = $imageName;
    }

    $evenements->save();

        return redirect('/Evenements')->with('success', 'Evenement ajouté avec succès');
    }




    /**
     * Display the specified resource.
     */
    public function show()
    {
        $evenements = Evenement::orderBy('created_at', 'DESC')->get();
        return view('Evenement.show', compact('evenements')); 
    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $evenements = Evenement::findOrFail($id);
        return view('Evenement.edit', compact('evenements'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{ 
    $evenements = Evenement::findOrFail($id);
    
    $rules = [
        'title' => 'required',
        'description' => 'required',
        'date' => 'required|date',
        'location' => 'required',
        'nb_places' => 'required'
    ];
    
    if ($request->hasFile('image')) {
        $rules['image'] = 'image';
    }

    $validator = Validator::make($request->all(), $rules);
    
    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    $evenements->title = $request->title;
    $evenements->description = $request->description;
    $evenements->date = $request->date;
    $evenements->location = $request->location;
    $evenements->nb_places = $request->nb_places;

    if ($request->hasFile('image')) {
        // Supprimer l'ancienne image si elle existe
        if ($evenements->image && File::exists(public_path('uploads/Evenement/' . $evenements->image))) {
            File::delete(public_path('uploads/Evenement/' . $evenements->image));
        }

        $image = $request->file('image');
        $ext = $image->getClientOriginalExtension();
        $imageName = time() . '.' . $ext;
        $image->move(public_path('uploads/Evenement'), $imageName);
        $evenements->image = $imageName;

        // Debugging messages
        echo "Image uploaded successfully: " . $imageName;
    } else {
        // Debugging message
        echo "No image uploaded";
    }

    $evenements->save();

    return redirect()->route('Evenements.index')->with('success', 'Evenement mis à jour avec succès');
}

    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $evenements =Evenement::findOrFail($id);
        $evenements->delete();
        return redirect('/Evenements')->with('succes','Evenement supprimé avec succès');
    }




    public function inscriptions($id)
{
    // Récupérez l'événement spécifique
    $evenement = Evenement::findOrFail($id);

    // Récupérez les inscriptions pour cet événement depuis la table 'inscription_evs'
    $inscriptions = InscriptionEv::where('evenement_id', $id)->get();

    // Chargez la vue avec les données récupérées
    return view('Evenement.insc', compact('evenement', 'inscriptions'));
}


}
