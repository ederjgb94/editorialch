<?php

namespace App\Http\Controllers\Editor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubmissionRequest;
use App\Models\User;
use App\Models\Role;

class SubmissionManagementController extends Controller
{
    /**
     * Muestra la lista de solicitudes para asignar árbitros.
     */
    public function index()
    {
        $submissions = SubmissionRequest::with('user')->latest()->get();
        return view('editor.submissions.index', compact('submissions'));
    }

    /**
     * Muestra formulario para asignar árbitros a una solicitud específica.
     */
    public function assignArbitrators(SubmissionRequest $submission)
    {
        // Obtenemos todos los usuarios con rol de árbitro
        $arbitratorRole = Role::where('slug', 'asociado-arbitro')->first();
        $arbitrators = User::whereHas('roles', function ($query) use ($arbitratorRole) {
            $query->where('roles.id', $arbitratorRole->id);
        })->get();

        return view('editor.submissions.assign', compact('submission', 'arbitrators'));
    }

    /**
     * Procesa la asignación de árbitros a la solicitud.
     */
    public function storeAssignment(Request $request, SubmissionRequest $submission)
    {
        $request->validate([
            'arbitrator_ids' => 'required|array|min:1',
            'arbitrator_ids.*' => 'exists:users,id'
        ]);

        // Asignamos los árbitros seleccionados a la solicitud, con timestamps actualizados
        $arbitratorData = array_fill_keys($request->arbitrator_ids, [
            'created_at' => now(),
            'updated_at' => now(),
            'status' => 'pendiente'
        ]);

        $submission->arbitrators()->sync($arbitratorData);

        // Actualizamos el estado de la solicitud
        $submission->status = 'en_revision';
        $submission->save();

        return redirect()->route('editor.submissions.index')
            ->with('success', 'Árbitros asignados correctamente a la solicitud.');
    }
}
