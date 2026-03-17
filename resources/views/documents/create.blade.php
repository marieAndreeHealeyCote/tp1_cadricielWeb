@extends('layout')

@section('content')

<div class="card shadow">
    <div class="card-header bg-info text-white">
        <h4 class="mb-0">{{ __('messages.add_document') }}</h4>
    </div>

    <div class="card-body">
        <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label">{{ __('messages.title') }}</label>
                <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}">
                @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">{{ __('messages.language') }}</label>
                <select name="language" class="form-select @error('language') is-invalid @enderror">
                    <option value="">{{ __('messages.choose_language') }}</option>
                    <option value="fr" {{ old('language') == 'fr' ? 'selected' : '' }}>Français</option>
                    <option value="en" {{ old('language') == 'en' ? 'selected' : '' }}>English</option>
                </select>
                @error('language') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">{{ __('messages.file') }}</label>
                <input type="file" name="file" class="form-control @error('file') is-invalid @enderror">
                @error('file') <div class="invalid-feedback">{{ $message }}</div> @enderror

                <small class="text-muted">
                    {{ __('messages.accepted_formats') }}
                </small>
            </div>

            <div class="d-flex gap-2">
                <button class="btn btn-success">{{ __('messages.add') }}</button>
                <a href="{{ route('documents.index') }}" class="btn btn-secondary">{{ __('messages.cancel') }}</a>
            </div>
        </form>
    </div>
</div>

@endsection