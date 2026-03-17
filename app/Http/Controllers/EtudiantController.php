<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Etudiant;
use App\Models\Ville;

class EtudiantController extends Controller
{
    public function index()
    {
        $etudiants = Etudiant::with('ville')->get();
        return view('etudiants.index', compact('etudiants'));
    }

    public function create()
    {
        $villes = Ville::all();
        return view('etudiants.create', compact('villes'));
    }

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

        return redirect()->route('etudiants.index')
            ->with('success', __('messages.student_created'));
    }

    public function show($id)
    {
        $etudiant = Etudiant::with('ville')->findOrFail($id);
        return view('etudiants.show', compact('etudiant'));
    }

    public function edit($id)
    {
        $etudiant = Etudiant::findOrFail($id);
        $villes = Ville::all();

        return view('etudiants.edit', compact('etudiant', 'villes'));
    }

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

        return redirect()->route('etudiants.index')
            ->with('success', __('messages.student_updated'));
    }

    public function destroy($id)
    {
        $etudiant = Etudiant::findOrFail($id);
        $etudiant->delete();

        return redirect()->route('etudiants.index')
            ->with('success', __('messages.student_deleted'));
    }
}
