@extends('layout')

@section('content')
<h1 class="mb-4">Ajouter un Nouvel Étudiant</h1>

<form action="{{ route('etudiants.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Nom</label>
        <input type="text" name="nom" class="form-control" value="{{ old('nom') }}">
        @error('nom') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label>Adresse</label>
        <input type="text" name="adresse" class="form-control" value="{{ old('adresse') }}">
        @error('adresse') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label>Téléphone</label>
        <input type="text" name="telephone" class="form-control" value="{{ old('telephone') }}">
        @error('telephone') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ old('email') }}">
        @error('email') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label>Date de naissance</label>
        <input type="date" name="date_naissance" class="form-control" value="{{ old('date_naissance') }}">
        @error('date_naissance') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label>Ville</label>
        <select name="ville_id" class="form-select">
            <option value="">Sélectionnez une ville</option>
            @foreach($villes as $ville)
            <option value="{{ $ville->id }}" {{ old('ville_id') == $ville->id ? 'selected' : '' }}>{{ $ville->nom }}</option>
            @endforeach
        </select>
        @error('ville_id') <div class="text-danger">{{ $message }}</div> @enderror
    </div>

    <button type="submit" class="btn btn-success">Ajouter</button>
</form>
@endsection