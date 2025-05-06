@extends('layouts.app')

@php
use Illuminate\Support\Facades\Auth;
@endphp

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mb-8 border-b border-gray-200 pb-6">
        <a href="{{ route('dashboard') }}" class="text-sm font-medium text-gray-600 hover:text-gray-900">
            ← Volver al Panel de Control
        </a>
        <h1 class="font-serif text-4xl font-bold text-gray-900 mb-2">Mis Solicitudes Asignadas</h1>
        <p class="text-lg text-gray-600">Gestiona las evaluaciones de las solicitudes que te han sido asignadas</p>
    </div>

    @if($submissions->isEmpty())
        <div class="bg-white overflow-hidden shadow-sm rounded-lg border border-gray-200">
            <div class="p-6 text-center">
                <svg class="mx-auto h-12 w-12 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900">No hay solicitudes asignadas</h3>
                <p class="mt-1 text-sm text-gray-500">Aún no tienes solicitudes asignadas para evaluar.</p>
            </div>
        </div>
    @else
        <div class="bg-white shadow-sm rounded-lg border border-gray-200 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Título</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Autor</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Estado</th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha Asignación</th>
                            <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($submissions as $submission)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                    #{{ $submission->id }}
                                </td>
                                <td class="px-6 py-4 text-sm text-gray-900">
                                    {{ $submission->title }}
                                </td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <div class="text-sm text-gray-900">{{ $submission->author->name }}</div>
                    <div class="text-sm text-gray-500">{{ $submission->author->email }}</div>
                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @php
                                        $arbitrator = $submission->arbitrators->where('id', Auth::id())->first();
                                        $status = $arbitrator && $arbitrator->pivot ? $arbitrator->pivot->status : 'pendiente';
                                    @endphp
                                    @if($status === 'pendiente')
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                            Pendiente de Revisión
                                        </span>
                                    @elseif($status === 'en_proceso')
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                            En Revisión
                                        </span>
                                    @elseif($status === 'completado')
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Revisión Completada
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    @php
                                        $arbitrator = $submission->arbitrators->where('id', Auth::id())->first();
                                        $assignedDate = $arbitrator && isset($arbitrator->pivot) && $arbitrator->pivot->created_at ? $arbitrator->pivot->created_at->format('d/m/Y H:i:s') : 'N/A';
                                    @endphp
                                    {{ $assignedDate }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ route('arbitro.submissions.show', $submission) }}" 
                                       class="text-indigo-600 hover:text-indigo-900">
                                        Ver detalles
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</div>
@endsection
