@extends('layout')

@section('content')

<div class="card shadow">
    <div class="card-header bg-primary text-white">
        <h4 class="mb-0">{{ __('messages.add_student') }}</h4>
    </div>

    <div class="card-body">
        <form action="{{ route('etudiants.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">{{ __('messages.name') }}</label>
                <input type="text" name="nom" class="form-control @error('nom') is-invalid @enderror" value="{{ old('nom') }}">
                @error('nom') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">{{ __('messages.address') }}</label>
                <input type="text" name="adresse" class="form-control @error('adresse') is-invalid @enderror" value="{{ old('adresse') }}">
                @error('adresse') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">{{ __('messages.phone') }}</label>
                <input type="text" name="telephone" class="form-control @error('telephone') is-invalid @enderror" value="{{ old('telephone') }}">
                @error('telephone') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">{{ __('messages.email') }}</label>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">{{ __('messages.birth_date') }}</label>
                <input type="date" name="date_naissance" class="form-control @error('date_naissance') is-invalid @enderror" value="{{ old('date_naissance') }}">
                @error('date_naissance') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">{{ __('messages.city') }}</label>
                <select name="ville_id" class="form-select @error('ville_id') is-invalid @enderror">
                    <option value="">{{ __('messages.select_city') }}</option>
                    @foreach($villes as $ville)
                    <option value="{{ $ville->id }}" {{ old('ville_id') == $ville->id ? 'selected' : '' }}>
                        {{ $ville->nom }}
                    </option>
                    @endforeach
                </select>
                @error('ville_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="d-flex gap-2">
                <button class="btn btn-success">{{ __('messages.add') }}</button>
                <a href="{{ route('etudiants.index') }}" class="btn btn-secondary">{{ __('messages.cancel') }}</a>
            </div>
        </form>
    </div>
</div>

@endsection