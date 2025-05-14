@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    @if(session('success'))
        <div class="rounded-md bg-green-50 p-4 mb-6">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-green-800">
                        {{ session('success') }}
                    </p>
                </div>
                <div class="ml-auto pl-3">
                    <div class="-mx-1.5 -my-1.5">
                        <button type="button" class="inline-flex bg-green-50 rounded-md p-1.5 text-green-500 hover:bg-green-100">
                            <span class="sr-only">Cerrar</span>
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="rounded-md bg-red-50 p-4 mb-6">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-red-800">
                        {{ session('error') }}
                    </p>
                </div>
                <div class="ml-auto pl-3">
                    <div class="-mx-1.5 -my-1.5">
                        <button type="button" class="inline-flex bg-red-50 rounded-md p-1.5 text-red-500 hover:bg-red-100">
                            <span class="sr-only">Cerrar</span>
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="mb-8 border-b border-gray-200 pb-6">
        <a href="{{ route('editor.progress.index') }}" class="text-sm font-medium text-gray-600 hover:text-gray-900">
            ← Volver al seguimiento de solicitudes
        </a>
        <h1 class="font-serif text-4xl font-bold text-gray-900 mb-2">Solicitud #{{ $submission->id }}</h1>
        <div class="flex items-center">
            <p class="text-lg text-gray-600 mr-3">{{ $submission->title }}</p>
            @if($submission->status == 'pendiente')
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                    Pendiente
                </span>
            @elseif($submission->status == 'en_revision')
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                    En Revisión
                </span>
            @elseif($submission->status == 'aprobado')
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                    Aprobado
                </span>
            @elseif($submission->status == 'rechazado')
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                    Rechazado
                </span>
            @endif
        </div>
    </div>

    <!-- Primera fila: Información, Descripción y Acciones -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <!-- Información de la solicitud -->
        <div class="bg-white overflow-hidden shadow-sm rounded-lg border border-gray-200">
            <div class="px-4 py-3 border-b border-gray-200 bg-gray-50">
                <h2 class="text-lg font-medium text-gray-900">Información</h2>
            </div>
            <div class="p-4">
                <dl class="space-y-4">
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Autor</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $submission->user->name }}</dd>
                    </div>
                    
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Correo Electrónico</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $submission->user->email }}</dd>
                    </div>
                    
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Fecha de Envío</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $submission->created_at->format('d/m/Y H:i') }}</dd>
                    </div>
                    
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Estado</dt>
                        <dd class="mt-1">
                            @if($submission->status == 'pendiente')
                                <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-yellow-100 text-yellow-800">
                                    Pendiente
                                </span>
                            @elseif($submission->status == 'en_revision')
                                <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-blue-100 text-blue-800">
                                    En Revisión
                                </span>
                            @elseif($submission->status == 'aprobado')
                                <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-green-100 text-green-800">
                                    Aprobado
                                </span>
                            @elseif($submission->status == 'rechazado')
                                <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-red-100 text-red-800">
                                    Rechazado
                                </span>
                            @endif
                        </dd>
                    </div>
                </dl>
            </div>
        </div>

        <!-- Descripción de la solicitud -->
        <div class="bg-white overflow-hidden shadow-sm rounded-lg border border-gray-200">
            <div class="px-4 py-3 border-b border-gray-200 bg-gray-50">
                <h2 class="text-lg font-medium text-gray-900">Descripción</h2>
            </div>
            <div class="p-4">
                <div class="prose max-w-none">
                    {{ $submission->description ?? 'No hay descripción disponible.' }}
                </div>
                @if($submission->manuscript_path)
                    <div class="mt-4 pt-4 border-t border-gray-200">
                        <a href="{{ asset('storage/' . $submission->manuscript_path) }}" target="_blank" class="inline-flex items-center justify-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 w-full">
                            <svg class="-ml-1 mr-2 h-5 w-5 text-gray-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            Ver Manuscrito (Word)
                        </a>
                    </div>
                @endif
            </div>
        </div>

        <!-- Acciones disponibles -->
        <div class="bg-white overflow-hidden shadow-sm rounded-lg border border-gray-200">
            <div class="px-4 py-3 border-b border-gray-200 bg-gray-50">
                <h2 class="text-lg font-medium text-gray-900">Acciones</h2>
            </div>
            <div class="p-4 space-y-4">
                @if($submission->status === 'en_revision' || $submission->status === 'pendiente')
                    @php
                        $allArbitratorsCompleted = $submission->arbitrators->isNotEmpty() && $submission->arbitrators->every(function ($arbitrator) {
                            return $arbitrator->pivot->status === 'completado';
                        });
                        $anyArbitratorsAssigned = $submission->arbitrators->isNotEmpty();
                    @endphp

                    @if(!$allArbitratorsCompleted)
                        <div class="p-3 bg-yellow-50 border-l-4 border-yellow-400">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd" d="M8.485 2.495c.673-1.167 2.357-1.167 3.03 0l6.28 10.875c.673 1.167-.17 2.625-1.516 2.625H3.72c-1.347 0-2.189-1.458-1.515-2.625L8.485 2.495zM10 15a1 1 0 110-2 1 1 0 010 2zm0-3a1 1 0 01-1-1V7a1 1 0 112 0v4a1 1 0 01-1 1z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm text-yellow-700">
                                        @if(!$anyArbitratorsAssigned)
                                            No se han asignado árbitros. Para aceptar la solicitud, primero asigne árbitros y espere sus evaluaciones.
                                        @else
                                            Faltan {{ $submission->arbitrators->where('pivot.status', '!=', 'completado')->count() }} de {{ $submission->arbitrators->count() }} árbitros por completar su evaluación. El botón de Aceptar Solicitud está deshabilitado.
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div>
                        <label for="decision_reason" class="block text-sm font-medium text-gray-700">Motivo de la Decisión (Opcional)</label>
                        <textarea name="reason" id="decision_reason" rows="3" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"></textarea>
                    </div>

                    <form action="{{ route('editor.progress.reject', $submission) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas rechazar esta solicitud?');" class="actions-form">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="reason" class="reason_input_hidden">
                        <button type="submit" class="mt-2 w-full inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700">
                            <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            Rechazar Solicitud
                        </button>
                    </form>

                    <form action="{{ route('editor.progress.approve', $submission) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas aprobar esta solicitud?');" class="actions-form">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="reason" class="reason_input_hidden">
                        <button type="submit" 
                                class="rounded-md bg-[#013243] w-full justify-center px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-[#014357] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#013243] flex items-center 
                                       {{ !$allArbitratorsCompleted ? 'bg-gray-300 text-gray-500 cursor-not-allowed' : 'text-white bg-green-600 hover:bg-green-700' }}"
                                {{ !$allArbitratorsCompleted ? 'disabled' : '' }}>
                            <svg class="-ml-1 mr-2 h-5 w-5 {{ !$allArbitratorsCompleted ? 'text-gray-500' : 'text-white' }}" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                            Aceptar Solicitud
                        </button>
                    </form>
                @endif
                
                @if($submission->reason)
                <div class="mt-4 pt-4 border-t border-gray-200">
                    <h3 class="text-sm font-medium text-gray-500">Motivo de la decisión:</h3>
                    <p class="mt-1 text-sm text-gray-900">{{ $submission->reason }}</p>
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Segunda fila: Árbitros asignados en una columna completa -->
    <div class="mb-6">
        <div class="bg-white overflow-hidden shadow-sm rounded-lg border border-gray-200">
            <div class="px-4 py-3 border-b border-gray-200 bg-gray-50 flex justify-between items-center">
                <h2 class="text-lg font-medium text-gray-900">Árbitros Asignados</h2>
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                    {{ $submission->arbitrators->count() }} Árbitros
                </span>
            </div>
            <div class="p-4">
                @if($submission->arbitrators->isEmpty())
                    <div class="text-center py-4">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">No hay árbitros asignados</h3>
                        @if($submission->status == 'pendiente')
                            <div class="mt-3">
                                <a href="{{ route('editor.submissions.assign', $submission) }}" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-[#013243] hover:bg-[#014357] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#013243]">
                                    <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                    </svg>
                                    Asignar Árbitros
                                </a>
                            </div>
                        @endif
                    </div>
                @else
                    @if(isset($reviewHistory) && $reviewHistory->count() > 0)
                        <div class="mb-4 px-3 py-2 bg-blue-50 rounded-md border border-blue-100">
                            <p class="text-sm text-blue-800 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                                </svg>
                                Se han recibido {{ $reviewHistory->count() }} revisiones en total. Consulta el <a href="javascript:void(0);" onclick="document.getElementById('historial-revisiones').scrollIntoView({behavior: 'smooth'})" class="font-medium underline">historial completo de revisiones</a> más abajo.
                            </p>
                        </div>
                    @endif

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach($submission->arbitrators as $arbitrator)
                            <div class="border border-gray-200 rounded-lg p-4 bg-white">
                                <div class="flex items-center justify-between mb-3">
                                    <div class="flex items-center">
                                        <div class="inline-flex items-center justify-center h-10 w-10 rounded-full bg-blue-100">
                                            <span class="text-sm font-medium text-blue-600">
                                                {{ strtoupper(substr($arbitrator->name, 0, 2)) }}
                                            </span>
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm font-medium text-gray-900">{{ $arbitrator->name }}</p>
                                            <p class="text-sm text-gray-500">{{ $arbitrator->email }}</p>
                                        </div>
                                    </div>
                                    <div>
                                        @php
                                            $status = $arbitrator->pivot->status ?? 'pendiente';
                                        @endphp
                                        
                                        @if($status === 'pendiente')
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                                Pendiente de Revisión
                                            </span>
                                        @elseif($status === 'en_proceso')
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                Revisando
                                            </span>
                                        @elseif($status === 'completado')
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                Revisión Completada
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                
                                @if(isset($reviewsByArbitrator) && isset($reviewsByArbitrator[$arbitrator->id]) && $reviewsByArbitrator[$arbitrator->id]->count() > 0)
                                    <div class="bg-gray-50 p-3 rounded-lg">
                                        <div class="flex justify-between items-center mb-2">
                                            <p class="text-xs font-medium text-gray-500">Revisiones realizadas:</p>
                                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                {{ $reviewsByArbitrator[$arbitrator->id]->count() }}
                                            </span>
                                        </div>
                                        <a href="javascript:void(0);" onclick="goToArbitratorReviews({{ $arbitrator->id }})" class="text-sm text-blue-600 hover:text-blue-800 flex items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            </svg>
                                            Ver todas las revisiones
                                        </a>
                                    </div>
                                @else
                                    <div class="bg-gray-50 p-3 rounded-lg text-sm text-gray-500">
                                        No ha realizado revisiones todavía
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Tercera fila: Historial de Revisiones -->
    <div id="historial-revisiones" class="mb-6">
        <div class="bg-white overflow-hidden shadow-sm rounded-lg border border-gray-200">
            <div class="px-4 py-3 border-b border-gray-200 bg-gray-50 flex justify-between items-center">
                <h2 class="text-lg font-medium text-gray-900">Historial de Revisiones y Observaciones</h2>
                @if(isset($reviewHistory) && $reviewHistory->count() > 0)
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                        {{ $reviewHistory->count() }} Revisiones
                    </span>
                @endif
            </div>
            <div class="p-4">
                @if(isset($reviewHistory) && $reviewHistory->count() > 0)
                    <!-- Pestañas para elegir vista -->
                    <div class="mb-6 border-b border-gray-200">
                        <nav class="-mb-px flex space-x-6">
                            <a href="#" id="btn-by-arbitrator" class="border-blue-500 text-blue-600 whitespace-nowrap py-2 px-1 border-b-2 font-medium text-sm" onclick="toggleView('by-arbitrator'); return false;">
                                Por Árbitro
                            </a>
                            <a href="#" id="btn-chronological" class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-2 px-1 border-b-2 font-medium text-sm" onclick="toggleView('chronological'); return false;">
                                Vista Cronológica
                            </a>
                        </nav>
                    </div>
                    
                    <!-- Vista cronológica (oculta por defecto) -->
                    <div id="chronological-view" class="hidden">
                        <div class="flow-root">
                            <ul class="-mb-8">
                                @foreach($reviewHistory as $index => $review)
                                    <li>
                                        <div class="relative pb-8">
                                            @if($index !== $reviewHistory->count() - 1)
                                                <span class="absolute top-5 left-5 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                                            @endif
                                            <div class="relative flex items-start space-x-3">
                                                <div class="relative">
                                                    <div class="flex items-center justify-center h-10 w-10 rounded-full bg-blue-100">
                                                        <span class="text-sm font-medium text-blue-600">
                                                            {{ strtoupper(substr($review->arbitrator->name, 0, 2)) }}
                                                        </span>
                                                    </div>
                                                </div>
                                                <div class="min-w-0 flex-1 bg-gray-50 rounded-lg p-4">
                                                    <div class="flex justify-between items-center mb-1">
                                                        <div class="text-sm font-medium text-gray-900">
                                                            {{ $review->arbitrator->name }}
                                                            <span class="ml-2 text-xs text-gray-500">
                                                                {{ \Carbon\Carbon::parse($review->created_at)->format('d/m/Y H:i') }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="space-y-4">
                                                        @if($review->comments)
                                                            <div>
                                                                <h4 class="text-xs font-medium text-gray-500 uppercase tracking-wide mb-2">Comentarios:</h4>
                                                                <div class="bg-white p-3 rounded-lg border border-gray-200">
                                                                    <p class="text-sm text-gray-700 whitespace-pre-line">{{ $review->comments }}</p>
                                                                </div>
                                                            </div>
                                                        @endif
                                                        
                                                        @if($review->document_path)
                                                            <div>
                                                                <h4 class="text-xs font-medium text-gray-500 uppercase tracking-wide mb-2">Documento de Revisión:</h4>
                                                                <a href="{{ asset('storage/' . $review->document_path) }}" 
                                                                    target="_blank"
                                                                    class="flex items-center px-4 py-2 bg-white border border-gray-200 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2 text-blue-600">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                                                    </svg>
                                                                    Descargar Documento de Observaciones
                                                                </a>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    
                    <!-- Vista por árbitro (visible por defecto) -->
                    <div id="by-arbitrator-view">
                        <div class="space-y-8">
                            @foreach($reviewsByArbitrator as $arbitratorId => $reviews)
                                @php
                                    $arbitrator = $reviews->first()->arbitrator;
                                @endphp
                                <div id="arbitro-{{ $arbitratorId }}" class="border-t pt-6 border-gray-200 transition-all">
                                    <div class="flex items-center mb-4">
                                        <div class="flex-shrink-0">
                                            <div class="inline-flex items-center justify-center h-12 w-12 rounded-full bg-blue-100">
                                                <span class="text-lg font-medium text-blue-600">
                                                    {{ strtoupper(substr($arbitrator->name, 0, 2)) }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="ml-4">
                                            <h2 class="text-lg font-medium text-gray-900">{{ $arbitrator->name }}</h2>
                                            <p class="text-sm text-gray-500">{{ $arbitrator->email }}</p>
                                        </div>
                                        <div class="ml-auto">
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                {{ $reviews->count() }} Revisiones
                                            </span>
                                        </div>
                                    </div>
                                    
                                    <div class="ml-12">
                                        <div class="flow-root">
                                            <ul class="-mb-8">
                                                @foreach($reviews as $index => $review)
                                                    <li>
                                                        <div class="relative pb-8">
                                                            @if($index !== $reviews->count() - 1)
                                                                <span class="absolute top-5 left-5 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                                                            @endif
                                                            <div class="relative flex items-start space-x-3">
                                                                <div>
                                                                    <div class="relative px-1">
                                                                        <div class="h-8 w-8 bg-blue-100 rounded-full flex items-center justify-center ring-8 ring-white">
                                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-blue-600">
                                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="min-w-0 flex-1 py-1.5">
                                                                    <div class="text-sm text-gray-500">
                                                                        <span class="font-medium text-gray-900">Revisión realizada</span>
                                                                        <span class="ml-2 text-gray-500">
                                                                            {{ $review->created_at->format('d/m/Y H:i') }}
                                                                        </span>
                                                                    </div>
                                                                    
                                                                    <div class="mt-2 bg-gray-50 p-3 rounded-lg border border-gray-100 space-y-4">
                                                                        @if($review->comments)
                                                                            <div>
                                                                                <h4 class="text-xs font-medium text-gray-500 uppercase tracking-wide mb-2">Comentarios:</h4>
                                                                                <div class="bg-white p-3 rounded-lg border border-gray-200">
                                                                                    <p class="text-sm text-gray-700 whitespace-pre-line">{{ $review->comments }}</p>
                                                                                </div>
                                                                            </div>
                                                                        @endif
                                                                        
                                                                        @if($review->document_path)
                                                                            <div>
                                                                                <h4 class="text-xs font-medium text-gray-500 uppercase tracking-wide mb-2">Documento adjunto:</h4>
                                                                                <a href="{{ asset('storage/' . $review->document_path) }}" 
                                                                                    target="_blank"
                                                                                    class="flex items-center px-3 py-1.5 bg-white border border-gray-200 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 mr-1.5 text-blue-600">
                                                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                                                                    </svg>
                                                                                    Descargar documento
                                                                                </a>
                                                                            </div>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div class="text-center py-6">
                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">No hay revisiones disponibles</h3>
                        <p class="mt-1 text-sm text-gray-500">
                            Los árbitros aún no han enviado observaciones o documentos de revisión.
                        </p>
                    </div>
                @endif
            </div>
        </div>
    </div>
    
    <!-- Cuarta fila: Historial de Actividad -->
    <div class="mb-6">
        <div class="bg-white overflow-hidden shadow-sm rounded-lg border border-gray-200">
            <div class="px-4 py-3 border-b border-gray-200 bg-gray-50">
                <h2 class="text-lg font-medium text-gray-900">Historial de Actividad</h2>
            </div>
            <div class="p-4">
                <ul class="space-y-4">
                    <!-- Actividad de creación -->
                    <li class="flex items-start">
                        <div class="flex-shrink-0">
                            <div class="flex items-center justify-center h-8 w-8 rounded-full bg-blue-100 text-blue-600">
                                <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                </svg>
                            </div>
                        </div>
                        <div class="ml-3">
                            <div class="text-sm font-medium text-gray-900 flex items-center">
                                <span>Solicitud creada</span>
                                <span class="ml-2 text-xs text-gray-500">{{ $submission->created_at->format('d/m/Y H:i') }}</span>
                            </div>
                            <div class="mt-1 text-sm text-gray-700">
                                <p>{{ $submission->user->name }} creó esta solicitud de publicación.</p>
                            </div>
                        </div>
                    </li>
                    
                    <!-- Otras actividades se podrían agregar aquí dinámicamente -->
                </ul>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function toggleView(view) {
        const chronologicalView = document.getElementById('chronological-view');
        const byArbitratorView = document.getElementById('by-arbitrator-view');
        const btnChronological = document.getElementById('btn-chronological');
        const btnByArbitrator = document.getElementById('btn-by-arbitrator');
        
        if (view === 'chronological') {
            chronologicalView.classList.remove('hidden');
            byArbitratorView.classList.add('hidden');
            btnChronological.classList.add('border-blue-500', 'text-blue-600');
            btnChronological.classList.remove('border-transparent', 'text-gray-500');
            btnByArbitrator.classList.add('border-transparent', 'text-gray-500');
            btnByArbitrator.classList.remove('border-blue-500', 'text-blue-600');
        } else {
            chronologicalView.classList.add('hidden');
            byArbitratorView.classList.remove('hidden');
            btnChronological.classList.add('border-transparent', 'text-gray-500');
            btnChronological.classList.remove('border-blue-500', 'text-blue-600');
            btnByArbitrator.classList.add('border-blue-500', 'text-blue-600');
            btnByArbitrator.classList.remove('border-transparent', 'text-gray-500');
        }
    }

    function goToArbitratorReviews(arbitratorId) {
        // Make sure we're in the "Por Árbitro" view
        toggleView('by-arbitrator');
        
        // Get the arbitrator element in the reviews section
        const arbitratorElement = document.getElementById('arbitro-' + arbitratorId);
        
        if (arbitratorElement) {
            // Calcular la posición exacta en un solo paso para evitar animaciones trabadas
            const yOffset = -80; // Offset para dar un poco de espacio en la parte superior (80px)
            const elementPosition = arbitratorElement.getBoundingClientRect().top + window.pageYOffset;
            const offsetPosition = elementPosition + yOffset;
            
            // Hacer scroll a la posición en un solo movimiento suave
            window.scrollTo({
                top: offsetPosition,
                behavior: 'smooth'
            });
            
            // Añadir efecto de resaltado para mejor visibilidad
            arbitratorElement.style.transition = 'all 0.5s ease';
            arbitratorElement.style.backgroundColor = '#EFF6FF'; // Light blue background (Tailwind blue-50)
            arbitratorElement.style.boxShadow = '0 0 0 2px #BFDBFE'; // Mejor que un borde, no cambia las dimensiones
            arbitratorElement.style.borderRadius = '0.375rem'; // 6px
            
            // Quitar el resaltado después de un tiempo
            setTimeout(() => {
                arbitratorElement.style.backgroundColor = '';
                arbitratorElement.style.boxShadow = '';
                arbitratorElement.style.borderRadius = '';
            }, 2000);
        }
    }

    // Initialize with "Por Árbitro" view by default
    document.addEventListener('DOMContentLoaded', function() {
        toggleView('by-arbitrator');
        
        // Check if there's a hash in the URL that points to an arbitrator
        if (window.location.hash && window.location.hash.startsWith('#arbitro-')) {
            const arbitratorId = window.location.hash.replace('#arbitro-', '');
            // Use parseInt to convert the string to a number
            goToArbitratorReviews(parseInt(arbitratorId));
        }
    });

    document.addEventListener('DOMContentLoaded', function () {
        const reasonTextarea = document.getElementById('decision_reason');
        
        if (reasonTextarea) {
            reasonTextarea.disabled = false; // Ensure the textarea is enabled

            const forms = document.querySelectorAll('.actions-form');
            forms.forEach(form => {
                form.addEventListener('submit', function () {
                    const hiddenInput = form.querySelector('.reason_input_hidden');
                    if (hiddenInput && reasonTextarea) { 
                        hiddenInput.value = reasonTextarea.value;
                        hiddenInput.name = 'reason'; 
                    }
                });
            });
        }
    });
</script>
@endpush
@endsection
