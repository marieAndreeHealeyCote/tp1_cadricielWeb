<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->latest()->get();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'language' => 'required|in:fr,en'
        ]);

        $data['user_id'] = auth()->id();

        Post::create($data);

        return redirect()->route('posts.index')
            ->with('success', __('messages.post_created'));
    }

    public function show($id)
    {
        $post = Post::with('user')->findOrFail($id);
        return view('posts.show', compact('post'));
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);

        if ($post->user_id !== auth()->id()) {
            abort(403);
        }

        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        if ($post->user_id !== auth()->id()) {
            abort(403);
        }

        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'language' => 'required|in:fr,en',
        ]);

        $post->update($data);

        return redirect()->route('posts.index')
            ->with('success', __('messages.post_updated'));
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);

        if ($post->user_id !== auth()->id()) {
            abort(403);
        }

        $post->delete();

        return redirect()->route('posts.index')
            ->with('success', __('messages.post_deleted'));
    }
}
