<?php

namespace App\Http\Controllers;

use App\Models\SubmissionRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class SubmissionRequestController extends Controller
{
    public function index()
    {
        $submissions = SubmissionRequest::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('submissions.index', compact('submissions'));
    }

    public function create()
    {
        return view('submissions.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'manuscript' => 'required|file|mimes:doc,docx|max:10240',
        ]);

        $manuscriptPath = $request->file('manuscript')->store('manuscripts', 'public');

        $submission = SubmissionRequest::create([
            'user_id' => Auth::id(),
            'title' => $validated['title'],
            'description' => $validated['description'],
            'manuscript_path' => $manuscriptPath,
            'status' => 'pending'
        ]);

        return redirect()->route('submissions.show', $submission)
            ->with('success', 'Tu solicitud de publicación ha sido enviada correctamente.');
    }

    public function show(SubmissionRequest $submission)
    {
        $this->authorize('view', $submission);
        return view('submissions.show', compact('submission'));
    }

    public function destroy(SubmissionRequest $submission)
    {
        $this->authorize('delete', $submission);

        if ($submission->manuscript_path) {
            Storage::disk('public')->delete($submission->manuscript_path);
        }

        $submission->delete();

        return redirect()->route('submissions.index')
            ->with('success', 'La solicitud ha sido eliminada correctamente.');
    }
}
