@php use Illuminate\Support\Str; @endphp

@extends('layout')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>{{ __('messages.student_forum') }}</h1>

    <a href="{{ route('posts.create') }}" class="btn btn-success">
        {{ __('messages.new_article') }}
    </a>
</div>

<div class="card shadow">
    <div class="card-body">
        @forelse($posts as $post)
        <div class="border rounded p-3 mb-3">
            <h4>{{ $post->title }}</h4>

            <p class="text-muted mb-2">
                {{ __('messages.by') }} {{ $post->user->name ?? __('messages.unknown_user') }} |
                {{ __('messages.language') }} : {{ strtoupper($post->language) }} |
                {{ $post->created_at->format('Y-m-d') }}
            </p>

            <p>{{ Str::limit($post->content, 200) }}</p>

            <div class="d-flex gap-2">
                <a href="{{ route('posts.show', $post->id) }}" class="btn btn-info btn-sm">
                    {{ __('messages.view') }}
                </a>

                @if(auth()->id() == $post->user_id)
                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning btn-sm">
                    {{ __('messages.edit') }}
                </a>

                <form action="{{ route('posts.destroy', $post->id) }}"
                    method="POST"
                    class="d-inline"
                    data-confirm="{{ __('messages.confirm_delete_article') }}"
                    onsubmit="return confirm(this.dataset.confirm)">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">
                        {{ __('messages.delete') }}
                    </button>
                </form>
                @endif
            </div>
        </div>
        @empty
        <p class="text-muted mb-0">{{ __('messages.no_article') }}</p>
        @endforelse
    </div>
</div>

@endsection