@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mb-8 border-b border-gray-200 pb-6">
        <a href="{{ route('arbitro.submissions') }}" class="text-sm font-medium text-gray-600 hover:text-gray-900">
            ← Volver a mis solicitudes asignadas
        </a>
        <h1 class="font-serif text-4xl font-bold text-gray-900 mb-2">Evaluar Solicitud</h1>
        <p class="text-lg text-gray-600">Solicitud: {{ $submission->title }}</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Panel de información y detalles -->
        <div class="md:col-span-1">
            <div class="space-y-6">
                <!-- Información de la solicitud -->
                <div class="bg-white overflow-hidden shadow-sm rounded-lg border border-gray-200">
                    <div class="px-4 py-3 border-b border-gray-200 bg-gray-50">
                        <h2 class="text-lg font-medium text-gray-900">Información</h2>
                    </div>
                    <div class="p-4">
                        <dl class="space-y-4">
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Autor</dt>
                                <dd class="mt-1 text-sm text-gray-900">{{ $submission->author->name }}</dd>
                            </div>
                            
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Correo Electrónico</dt>
                                <dd class="mt-1 text-sm text-gray-900">{{ $submission->author->email }}</dd>
                            </div>
                            
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Fecha de Envío</dt>
                                <dd class="mt-1 text-sm text-gray-900">{{ $submission->created_at->format('d/m/Y H:i') }}</dd>
                            </div>
                            
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Estado</dt>
                                <dd class="mt-1">
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
                                </dd>
                            </div>
                        </dl>
                    </div>
                </div>

                <!-- Documento adjunto si existe -->
                @if($submission->manuscript_path)
                    <div class="bg-white overflow-hidden shadow-sm rounded-lg border border-gray-200">
                        <div class="px-4 py-3 border-b border-gray-200 bg-gray-50">
                            <h2 class="text-lg font-medium text-gray-900">Documento</h2>
                        </div>
                        <div class="p-4">
                            <a href="{{ asset('storage/' . $submission->manuscript_path) }}" 
                                target="_blank"
                                class="rounded-md bg-[#013243] px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-[#014357] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#013243] flex items-center w-full justify-center">
                                    <svg class="w-4 h-4 mr-1.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                    Ver Documento (Word)
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <!-- Panel principal con descripción y formulario de evaluación -->
        <div class="md:col-span-2 space-y-6">
            <!-- Descripción de la solicitud -->
            <div class="bg-white overflow-hidden shadow-sm rounded-lg border border-gray-200">
                <div class="px-4 py-3 border-b border-gray-200 bg-gray-50">
                    <h2 class="text-lg font-medium text-gray-900">Descripción</h2>
                </div>
                <div class="p-4">
                    <div class="prose max-w-none">
                        {{ $submission->description ?? 'No hay descripción disponible.' }}
                    </div>
                </div>
            </div>

            <!-- Formulario de evaluación -->
            <div class="bg-white overflow-hidden shadow-sm rounded-lg border border-gray-200">
                <div class="px-4 py-3 border-b border-gray-200 bg-gray-50">
                    <h2 class="text-lg font-medium text-gray-900">Evaluación</h2>
                </div>
                <div class="p-4">
                    @php
                        $arbitrator = $submission->arbitrators->where('id', auth()->id())->first();
                        $status = $arbitrator ? $arbitrator->pivot->status : 'pendiente';
                        $comments = $arbitrator ? $arbitrator->pivot->comments : '';
                    @endphp
                    
                    <form action="{{ route('arbitro.submissions.evaluate', $submission) }}" method="POST">
                        @csrf
                        <div class="space-y-6">
                            <div>
                                <label for="status" class="block text-sm font-medium text-gray-700">Estado de la Revisión</label>
                                <select id="status" name="status" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                    <option value="pendiente" {{ $status == 'pendiente' ? 'selected' : '' }}>Pendiente de Revisión</option>
                                    <option value="en_proceso" {{ $status == 'en_proceso' ? 'selected' : '' }}>En Revisión</option>
                                    <option value="completado" {{ $status == 'completado' ? 'selected' : '' }}>Revisión Completada</option>
                                </select>
                            </div>
                            
                            <div>
                                <label for="comments" class="block text-sm font-medium text-gray-700">Comentarios</label>
                                <div class="mt-1">
                                    <textarea id="comments" name="comments" rows="5" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">{{ $comments }}</textarea>
                                </div>
                                <p class="mt-2 text-sm text-gray-500">
                                    Ingresa tus observaciones, comentarios o sugerencias respecto al manuscrito. Esta información será utilizada por el editor para tomar una decisión.
                                </p>
                            </div>
                            
                            <div class="flex justify-end">
                                <button type="submit" class="rounded-md bg-[#013243] px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-[#014357] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#013243] flex items-center">
                                    Guardar Evaluación
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
