@extends('layout')

@section('content')

<div class="card shadow">
    <div class="card-header bg-info text-white">
        <h4 class="mb-0">{{ __('messages.student_details') }}</h4>
    </div>

    <div class="card-body">
        <p><strong>{{ __('messages.name') }} :</strong> {{ $etudiant->nom }}</p>
        <p><strong>{{ __('messages.email') }} :</strong> {{ $etudiant->email }}</p>
        <p><strong>{{ __('messages.phone') }} :</strong> {{ $etudiant->telephone }}</p>
        <p><strong>{{ __('messages.address') }} :</strong> {{ $etudiant->adresse }}</p>
        <p><strong>{{ __('messages.birth_date') }} :</strong> {{ $etudiant->date_naissance }}</p>
        <p><strong>{{ __('messages.city') }} :</strong> {{ $etudiant->ville->nom ?? '—' }}</p>

        <div class="mt-4 d-flex gap-2">
            <a href="{{ route('etudiants.edit', $etudiant->id) }}" class="btn btn-warning">
                {{ __('messages.edit') }}
            </a>
            <a href="{{ route('etudiants.index') }}" class="btn btn-secondary">
                {{ __('messages.back') }}
            </a>
        </div>
    </div>
</div>

@endsection