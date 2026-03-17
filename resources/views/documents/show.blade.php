@extends('layout')

@section('content')

<div class="card shadow">
    <div class="card-header bg-info text-white">
        <h4 class="mb-0">{{ __('messages.document_details') }}</h4>
    </div>

    <div class="card-body">
        <p><strong>{{ __('messages.title') }} :</strong> {{ $document->title }}</p>
        <p><strong>{{ __('messages.language') }} :</strong> {{ strtoupper($document->language) }}</p>
        <p><strong>{{ __('messages.shared_by') }} :</strong> {{ $document->user->name ?? __('messages.unknown_user') }}</p>
        <p><strong>{{ __('messages.date') }} :</strong> {{ $document->created_at->format('Y-m-d') }}</p>

        <div class="mt-4 d-flex gap-2">
            <a href="{{ asset('storage/' . $document->file) }}" target="_blank" class="btn btn-primary">
                {{ __('messages.open_file') }}
            </a>

            @if(auth()->id() == $document->user_id)
            <a href="{{ route('documents.edit', $document->id) }}" class="btn btn-warning">
                {{ __('messages.edit') }}
            </a>
            @endif

            <a href="{{ route('documents.index') }}" class="btn btn-secondary">
                {{ __('messages.back') }}
            </a>
        </div>
    </div>
</div>

@endsection