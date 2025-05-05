<?php

namespace App\Http\Controllers\Editor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubmissionRequest;
use App\Models\SubmissionReview;

class ProgressTrackingController extends Controller
{
    /**
     * Muestra una lista de todas las solicitudes con sus actualizaciones y estado actual.
     */
    public function index()
    {
        // Obtenemos todas las solicitudes con sus autores y árbitros asignados
        $submissions = SubmissionRequest::with(['user', 'arbitrators' => function ($query) {
            $query->withPivot('status', 'comments', 'review_document_path', 'created_at', 'updated_at');
        }])
            ->latest()
            ->get();

        // Agrupamos las solicitudes por estado para una mejor visualización
        $pendingSubmissions = $submissions->where('status', 'pendiente');
        $inReviewSubmissions = $submissions->where('status', 'en_revision');
        $approvedSubmissions = $submissions->where('status', 'aprobado');
        $rejectedSubmissions = $submissions->where('status', 'rechazado');

        return view('editor.progress.index', compact(
            'pendingSubmissions',
            'inReviewSubmissions',
            'approvedSubmissions',
            'rejectedSubmissions'
        ));
    }

    /**
     * Muestra los detalles de una solicitud específica, incluyendo todas sus actualizaciones.
     */
    public function show(SubmissionRequest $submission)
    {
        // Cargamos las relaciones necesarias y ordenamos los árbitros por fecha de actualización
        $submission->load(['user', 'arbitrators' => function ($query) {
            $query->withPivot('status', 'comments', 'review_document_path', 'created_at', 'updated_at')
                ->orderBy('pivot_updated_at', 'desc');
        }]);

        // Cargar todas las revisiones de todos los árbitros para esta solicitud
        $reviewHistory = SubmissionReview::where('submission_request_id', $submission->id)
            ->with('arbitrator')
            ->latest()
            ->get();

        // Agrupamos las revisiones por árbitro
        $reviewsByArbitrator = $reviewHistory->groupBy('user_id');

        return view('editor.progress.show', compact('submission', 'reviewHistory', 'reviewsByArbitrator'));
    }

    /**
     * Aprueba una solicitud después de verificar que todos los árbitros han completado sus evaluaciones.
     */
    public function approveSubmission(SubmissionRequest $submission)
    {
        // Cargar las relaciones de árbitros
        $submission->load('arbitrators');

        // Verificar que todos los árbitros hayan completado su evaluación
        $allCompleted = true;
        $arbitratorsCount = $submission->arbitrators->count();

        if ($arbitratorsCount === 0) {
            return redirect()->back()->with('error', 'No se puede aprobar la solicitud sin árbitros asignados.');
        }

        // Verificar si todos los árbitros han completado su evaluación
        $completedCount = $submission->arbitrators->filter(function ($arbitrator) {
            return $arbitrator->pivot->status === 'completado';
        })->count();

        if ($completedCount < $arbitratorsCount) {
            return redirect()->back()->with(
                'error',
                'No es posible aprobar la solicitud. Faltan ' . ($arbitratorsCount - $completedCount) .
                    ' árbitros por completar su evaluación.'
            );
        }

        // Si todos los árbitros han completado sus evaluaciones, aprobar la solicitud
        $submission->status = 'aprobado';
        $submission->save();

        return redirect()->back()->with('success', 'La solicitud ha sido aprobada exitosamente.');
    }

    /**
     * Rechaza una solicitud de publicación.
     */
    public function rejectSubmission(SubmissionRequest $submission)
    {
        // Cambiar el estado de la solicitud a rechazado
        $submission->status = 'rechazado';
        $submission->save();

        return redirect()->back()->with('success', 'La solicitud ha sido rechazada.');
    }
}
