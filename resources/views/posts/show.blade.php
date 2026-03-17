@extends('layout')

@section('content')

<div class="card shadow">
    <div class="card-header bg-info text-white">
        <h4 class="mb-0">{{ __('messages.article_details') }}</h4>
    </div>

    <div class="card-body">
        <h3>{{ $post->title }}</h3>

        <p class="text-muted">
            {{ __('messages.by') }} {{ $post->user->name ?? __('messages.unknown_user') }} |
            {{ __('messages.language') }} : {{ strtoupper($post->language) }} |
            {{ $post->created_at->format('Y-m-d') }}
        </p>

        <hr>

        <p>{{ $post->content }}</p>

        <div class="mt-4 d-flex gap-2">
            @if(auth()->id() == $post->user_id)
            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">
                {{ __('messages.edit') }}
            </a>
            @endif

            <a href="{{ route('posts.index') }}" class="btn btn-secondary">
                {{ __('messages.back') }}
            </a>
        </div>
    </div>
</div>

@endsection