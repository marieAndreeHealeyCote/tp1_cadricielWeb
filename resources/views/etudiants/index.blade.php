@extends('layout')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>{{ __('messages.student_list') }}</h1>

    <a href="{{ route('etudiants.create') }}" class="btn btn-success">
        {{ __('messages.add_student') }}
    </a>
</div>

<div class="card shadow">
    <div class="card-body">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th>{{ __('messages.name') }}</th>
                    <th>{{ __('messages.email') }}</th>
                    <th>{{ __('messages.phone') }}</th>
                    <th>{{ __('messages.city') }}</th>
                    <th width="220">{{ __('messages.actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse($etudiants as $etudiant)
                <tr>
                    <td>{{ $etudiant->nom }}</td>
                    <td>{{ $etudiant->email }}</td>
                    <td>{{ $etudiant->telephone }}</td>
                    <td>{{ $etudiant->ville->nom ?? '—' }}</td>
                    <td>
                        <a href="{{ route('etudiants.show', $etudiant->id) }}" class="btn btn-info btn-sm">
                            {{ __('messages.view') }}
                        </a>

                        <a href="{{ route('etudiants.edit', $etudiant->id) }}" class="btn btn-warning btn-sm">
                            {{ __('messages.edit') }}
                        </a>

                        <form action="{{ route('etudiants.destroy', $etudiant->id) }}"
                            method="POST"
                            class="d-inline"
                            data-confirm="{{ __('messages.confirm_delete_student') }}"
                            onsubmit="return confirm(this.dataset.confirm)">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">
                                {{ __('messages.delete') }}
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">
                        {{ __('messages.none_found') }}
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection