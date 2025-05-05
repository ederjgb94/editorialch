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
                
                <!-- Estado de mi revisión -->
                @php
                    $arbitrator = $submission->arbitrators->where('id', auth()->id())->first();
                    $status = $arbitrator ? $arbitrator->pivot->status : 'pendiente';
                @endphp
                <div class="bg-white overflow-hidden shadow-sm rounded-lg border border-gray-200">
                    <div class="px-4 py-3 border-b border-gray-200 bg-gray-50">
                        <h2 class="text-lg font-medium text-gray-900">Mi Estado</h2>
                    </div>
                    <div class="p-4">
                        <form action="{{ route('arbitro.submissions.update-status', $submission) }}" method="POST" class="space-y-4">
                            @csrf
                            @method('PUT')
                            <div>
                                <label for="status" class="block text-sm font-medium text-gray-700">Estado de mi Revisión</label>
                                <select id="status" name="status" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                    <option value="pendiente" {{ $status == 'pendiente' ? 'selected' : '' }}>Pendiente de Revisión</option>
                                    <option value="en_proceso" {{ $status == 'en_proceso' ? 'selected' : '' }}>En Revisión</option>
                                    <option value="completado" {{ $status == 'completado' ? 'selected' : '' }}>Revisión Completada</option>
                                </select>
                            </div>
                            
                            <div class="flex justify-end">
                                <button type="submit" class="rounded-md bg-gray-600 px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-700 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-gray-600">
                                    Actualizar Estado
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
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

            <!-- Formulario para agregar una nueva revisión -->
            <div class="bg-white overflow-hidden shadow-sm rounded-lg border border-gray-200">
                <div class="px-4 py-3 border-b border-gray-200 bg-gray-50 flex justify-between items-center">
                    <h2 class="text-lg font-medium text-gray-900">Agregar Revisión</h2>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                        Nueva
                    </span>
                </div>
                <div class="p-4">
                    <form action="{{ route('arbitro.submissions.evaluate', $submission) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="space-y-6">
                            <div>
                                <label for="comments" class="block text-sm font-medium text-gray-700">Comentarios de Revisión</label>
                                <div class="mt-1">
                                    <textarea id="comments" name="comments" rows="5" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"></textarea>
                                </div>
                                <p class="mt-2 text-sm text-gray-500">
                                    Ingresa tus observaciones, comentarios o sugerencias respecto al manuscrito. Este campo es opcional si adjuntas un documento con tus observaciones.
                                </p>
                            </div>
                            
                            <div>
                                <label for="review_document" class="block text-sm font-medium text-gray-700">Documento de Revisión (Word)</label>
                                <div class="mt-1">
                                    <input id="review_document" name="review_document" type="file" accept=".doc,.docx" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-md cursor-pointer bg-white focus:outline-none">
                                    <p class="mt-1 text-xs text-gray-500">Solo se permiten archivos Word (.doc, .docx)</p>
                                </div>
                                <p class="mt-2 text-sm text-gray-500">
                                    Puedes adjuntar un documento Word con tus observaciones detalladas o correcciones sobre el manuscrito.
                                </p>
                            </div>
                            
                            <div class="flex justify-end">
                                <button type="submit" class="rounded-md bg-[#013243] px-4 py-2 text-sm font-semibold text-white shadow-sm hover:bg-[#014357] focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-[#013243] flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                    Agregar Revisión
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            
            <!-- Historial de revisiones -->
            <div class="bg-white overflow-hidden shadow-sm rounded-lg border border-gray-200">
                <div class="px-4 py-3 border-b border-gray-200 bg-gray-50 flex justify-between items-center">
                    <h2 class="text-lg font-medium text-gray-900">Mis Revisiones Anteriores</h2>
                    @if(isset($previousReviews) && $previousReviews->count() > 0)
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                            {{ $previousReviews->count() }} Revisiones
                        </span>
                    @endif
                </div>
                <div class="p-4">
                    @if(isset($previousReviews) && $previousReviews->count() > 0)
                        <div class="flow-root">
                            <ul class="-mb-8">
                                @foreach($previousReviews as $index => $review)
                                    <li>
                                        <div class="relative pb-8">
                                            @if($index !== $previousReviews->count() - 1)
                                                <span class="absolute top-5 left-5 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                                            @endif
                                            <div class="relative flex items-start space-x-3">
                                                <div>
                                                    <div class="relative px-1">
                                                        <div class="h-10 w-10 bg-blue-100 rounded-full flex items-center justify-center ring-8 ring-white">
                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-blue-600">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                            </svg>
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
                                                    
                                                    <div class="mt-4 bg-gray-50 p-4 rounded-lg border border-gray-100 space-y-4">
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
                                                                    class="flex items-center px-4 py-2 bg-white border border-gray-200 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-2 text-blue-600">
                                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                                                    </svg>
                                                                    Descargar Documento
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
                    @else
                        <div class="text-center py-6">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">Aún no has realizado revisiones</h3>
                            <p class="mt-1 text-sm text-gray-500">
                                Comienza agregando una nueva revisión con tus observaciones o un documento.
                            </p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
