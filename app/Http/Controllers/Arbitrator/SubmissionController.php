<?php

namespace App\Http\Controllers\Arbitrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubmissionRequest;
use App\Models\SubmissionReview;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SubmissionController extends Controller
{
    /**
     * Muestra la lista de solicitudes asignadas al árbitro actual.
     */
    public function index()
    {
        $user = Auth::user();
        $submissions = $user->assignedSubmissions()
            ->with(['author', 'arbitrators' => function ($query) {
                $query->withPivot('status', 'comments', 'created_at');
            }])
            ->latest()
            ->get();

        return view('arbitrator.submissions.index', compact('submissions'));
    }

    /**
     * Muestra los detalles de una solicitud específica.
     */
    public function show(SubmissionRequest $submission)
    {
        // Verifica que el árbitro tenga acceso a esta solicitud
        $user = Auth::user();
        $arbitrator = $submission->arbitrators()->where('user_id', $user->id)->first();

        if (!$arbitrator) {
            abort(403, 'No tienes permiso para ver esta solicitud.');
        }

        // Obtiene las revisiones previas realizadas por este árbitro
        $previousReviews = SubmissionReview::where('submission_request_id', $submission->id)
            ->where('user_id', $user->id)
            ->latest()
            ->get();

        return view('arbitrator.submissions.show', compact('submission', 'previousReviews'));
    }
    /**
     * Actualiza el estado del árbitro para una solicitud.
     */
    public function updateStatus(Request $request, SubmissionRequest $submission)
    {
        // Verifica que el árbitro tenga acceso a esta solicitud
        $user = Auth::user();
        $arbitrator = $submission->arbitrators()->where('user_id', $user->id)->first();

        if (!$arbitrator) {
            abort(403, 'No tienes permiso para evaluar esta solicitud.');
        }

        // Valida los datos
        $validated = $request->validate([
            'status' => 'required|in:pendiente,en_proceso,completado',
        ]);

        // Actualizar el estado del árbitro en la tabla pivot
        $submission->arbitrators()->updateExistingPivot($user->id, [
            'status' => $validated['status'],
        ]);

        return redirect()->route('arbitro.submissions.show', $submission)
            ->with('success', 'Tu estado de revisión ha sido actualizado correctamente.');
    }

    /**
     * Procesa la evaluación de una solicitud por parte del árbitro.
     */
    public function evaluate(Request $request, SubmissionRequest $submission)
    {
        // Verifica que el árbitro tenga acceso a esta solicitud
        $user = Auth::user();
        $arbitrator = $submission->arbitrators()->where('user_id', $user->id)->first();

        if (!$arbitrator) {
            abort(403, 'No tienes permiso para evaluar esta solicitud.');
        }

        // Valida los datos
        $validated = $request->validate([
            'comments' => 'nullable|string',
            'review_document' => 'nullable|file|mimes:doc,docx',
        ]);

        // Procesar el documento si existe
        $documentPath = null;
        if ($request->hasFile('review_document')) {
            $documentPath = $request->file('review_document')->store('reviews', 'public');
        }

        // Verificar que al menos haya comentarios o un documento
        if (empty($validated['comments']) && !$documentPath) {
            return redirect()->back()->withErrors([
                'error' => 'Debes proporcionar comentarios o adjuntar un documento.'
            ]);
        }

        // Crear una nueva revisión
        $reviewData = [
            'submission_request_id' => $submission->id,
            'user_id' => $user->id,
            'comments' => $validated['comments'],
            'document_path' => $documentPath,
            'status' => 'completado' // Las revisiones siempre se consideran completadas
        ];

        SubmissionReview::create($reviewData);

        return redirect()->route('arbitro.submissions.show', $submission)
            ->with('success', 'Tu revisión ha sido guardada correctamente.');
    }
}
