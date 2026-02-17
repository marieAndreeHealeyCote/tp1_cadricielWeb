@extends('layout')

@section('content')
<h1 class="mb-4">Détails de l'Étudiant</h1>

<div class="card">
    <div class="card-header">
        {{ $etudiant->nom }}
    </div>
    <div class="card-body">
        <p><strong>Email :</strong> {{ $etudiant->email }}</p>
        <p><strong>Téléphone :</strong> {{ $etudiant->telephone }}</p>
        <p><strong>Adresse :</strong> {{ $etudiant->adresse }}</p>
        <p><strong>Date de naissance :</strong> {{ $etudiant->date_naissance }}</p>
        <p><strong>Ville :</strong> {{ $etudiant->ville->nom }}</p>
        <a href="{{ route('etudiants.edit', $etudiant->id) }}" class="btn btn-warning">Modifier</a>
        <a href="{{ route('etudiants.index') }}" class="btn btn-secondary">Retour</a>
    </div>
</div>
@endsection