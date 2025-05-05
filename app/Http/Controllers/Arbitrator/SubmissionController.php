<?php

namespace App\Http\Controllers\Arbitrator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubmissionRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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

        return view('arbitrator.submissions.show', compact('submission'));
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
            'status' => 'required|in:pendiente,en_proceso,completado',
            'comments' => 'nullable|string',
        ]);

        // Actualiza el estado y comentarios del árbitro
        $submission->arbitrators()->updateExistingPivot($user->id, [
            'status' => $validated['status'],
            'comments' => $validated['comments'],
        ]);

        return redirect()->route('arbitro.submissions.show', $submission)
            ->with('success', 'La evaluación ha sido guardada correctamente.');
    }
}
