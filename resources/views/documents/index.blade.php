@extends('layout')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>{{ __('messages.document_directory') }}</h1>

    <a href="{{ route('documents.create') }}" class="btn btn-success">
        {{ __('messages.add_document') }}
    </a>
</div>

<div class="card shadow">
    <div class="card-body">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>{{ __('messages.title') }}</th>
                    <th>{{ __('messages.language') }}</th>
                    <th>{{ __('messages.shared_by') }}</th>
                    <th>{{ __('messages.date') }}</th>
                    <th width="260">{{ __('messages.actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse($documents as $document)
                <tr>
                    <td>{{ $document->title }}</td>
                    <td>{{ strtoupper($document->language) }}</td>
                    <td>{{ $document->user->name ?? __('messages.unknown_user') }}</td>
                    <td>{{ $document->created_at->format('Y-m-d') }}</td>
                    <td>
                        <a href="{{ route('documents.show', $document->id) }}" class="btn btn-info btn-sm">
                            {{ __('messages.view') }}
                        </a>

                        <a href="{{ asset('storage/' . $document->file) }}" target="_blank" class="btn btn-primary btn-sm">
                            {{ __('messages.open') }}
                        </a>

                        @if(auth()->id() == $document->user_id)
                        <a href="{{ route('documents.edit', $document->id) }}" class="btn btn-warning btn-sm">
                            {{ __('messages.edit') }}
                        </a>

                        <form action="{{ route('documents.destroy', $document->id) }}"
                            method="POST"
                            class="d-inline"
                            data-confirm="{{ __('messages.confirm_delete_document') }}"
                            onsubmit="return confirm(this.dataset.confirm)">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">
                                {{ __('messages.delete') }}
                            </button>
                        </form>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">
                        {{ __('messages.no_document') }}
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

        <div class="mt-3">
            {{ $documents->links() }}
        </div>
    </div>
</div>

@endsection