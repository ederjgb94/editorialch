<?php

namespace App\Http\Controllers\Editor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubmissionRequest;

class ProgressTrackingController extends Controller
{
    /**
     * Muestra una lista de todas las solicitudes con sus actualizaciones y estado actual.
     */
    public function index()
    {
        // Obtenemos todas las solicitudes con sus autores y árbitros asignados
        $submissions = SubmissionRequest::with(['user', 'arbitrators'])
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
        // Cargamos las relaciones necesarias
        $submission->load(['user', 'arbitrators']);

        return view('editor.progress.show', compact('submission'));
    }
}
