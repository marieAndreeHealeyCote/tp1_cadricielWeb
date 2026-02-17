<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudiant;
use App\Models\Ville;

class EtudiantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // Affiche la liste des étudiants
    public function index()
    {
        $etudiants = Etudiant::with('ville')->get(); // Evite le problème N+1
        return view('etudiants.index', compact('etudiants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // Affiche le formulaire pour créer un nouvel étudiant
    public function create()
    {
        $villes = Ville::all();
        return view('etudiants.create', compact('villes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    // Enregistre un nouvel étudiant dans la base de données
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'email' => 'required|email|unique:etudiants,email',
            'date_naissance' => 'required|date',
            'ville_id' => 'required|exists:villes,id'
        ]);

        Etudiant::create($request->all());

        return redirect()->route('etudiants.index')->with('success', 'Étudiant ajouté avec succès !');
    }

    /**
     * Display the specified resource.
     */
    // Affiche les détails d’un étudiant
    public function show($id)
    {
        $etudiant = Etudiant::with('ville')->findOrFail($id);
        return view('etudiants.show', compact('etudiant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // Affiche le formulaire pour modifier un étudiant
    public function edit($id)
    {
        $etudiant = Etudiant::findOrFail($id);
        $villes = Ville::all();
        return view('etudiants.edit', compact('etudiant', 'villes'));
    }

    /**
     * Update the specified resource in storage.
     */
    // Met à jour un étudiant dans la base de données
    public function update(Request $request, $id)
    {
        $etudiant = Etudiant::findOrFail($id);

        $request->validate([
            'nom' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'telephone' => 'required|string|max:20',
            'email' => 'required|email|unique:etudiants,email,' . $etudiant->id,
            'date_naissance' => 'required|date',
            'ville_id' => 'required|exists:villes,id'
        ]);

        $etudiant->update($request->all());

        return redirect()->route('etudiants.index')->with('success', 'Étudiant mis à jour avec succès !');
    }


    /**
     * Remove the specified resource from storage.
     */
    // Supprime un étudiant
    public function destroy($id)
    {
        $etudiant = Etudiant::findOrFail($id);
        $etudiant->delete();

        return redirect()->route('etudiants.index')->with('success', 'Étudiant supprimé avec succès !');
    }
}
