<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index()
    {
        $documents = Document::with('user')->latest()->paginate(10);
        return view('documents.index', compact('documents'));
    }

    public function create()
    {
        return view('documents.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255',
            'file' => 'required|file|mimes:pdf,zip,doc,docx|max:2048',
            'language' => 'required|in:fr,en'
        ]);

        $data['file'] = $request->file('file')->store('documents', 'public');
        $data['user_id'] = auth()->id();

        Document::create($data);

        return redirect()->route('documents.index')
            ->with('success', __('messages.document_created'));
    }

    public function show($id)
    {
        $document = Document::with('user')->findOrFail($id);
        return view('documents.show', compact('document'));
    }

    public function edit($id)
    {
        $document = Document::findOrFail($id);

        if ($document->user_id !== auth()->id()) {
            abort(403);
        }

        return view('documents.edit', compact('document'));
    }

    public function update(Request $request, $id)
    {
        $document = Document::findOrFail($id);

        if ($document->user_id !== auth()->id()) {
            abort(403);
        }

        $data = $request->validate([
            'title' => 'required|max:255',
            'language' => 'required|in:fr,en'
        ]);

        if ($request->hasFile('file')) {
            $data['file'] = $request->file('file')->store('documents', 'public');
        }

        $document->update($data);

        return redirect()->route('documents.index')
            ->with('success', __('messages.document_updated'));
    }

    public function destroy($id)
    {
        $document = Document::findOrFail($id);

        if ($document->user_id !== auth()->id()) {
            abort(403);
        }

        $document->delete();

        return redirect()->route('documents.index')
            ->with('success', __('messages.document_deleted'));
    }
}
