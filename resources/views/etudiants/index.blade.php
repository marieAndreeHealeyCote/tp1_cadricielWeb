@extends('layout')

@section('content')
<h1 class="mb-4">Liste des Étudiants</h1>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>Nom</th>
            <th>Email</th>
            <th>Téléphone</th>
            <th>Ville</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($etudiants as $etudiant)
        <tr>
            <td>{{ $etudiant->nom }}</td>
            <td>{{ $etudiant->email }}</td>
            <td>{{ $etudiant->telephone }}</td>
            <td>{{ $etudiant->ville->nom }}</td>
            <td>
                <a href="{{ route('etudiants.show', $etudiant->id) }}" class="btn btn-info btn-sm">Voir</a>
                <a href="{{ route('etudiants.edit', $etudiant->id) }}" class="btn btn-warning btn-sm">Modifier</a>
                <form action="{{ route('etudiants.destroy', $etudiant->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Voulez-vous vraiment supprimer cet étudiant ?')">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection