@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mb-8 border-b border-gray-200 pb-6">
        <a href="{{ route('editor.submissions.index') }}" class="text-sm font-medium text-gray-600 hover:text-gray-900">
            ← Volver al listado de solicitudes
        </a>
        <h1 class="font-serif text-4xl font-bold text-gray-900 mb-2">Asignar Árbitros</h1>
        <p class="text-lg text-gray-600">Solicitud: {{ $submission->title }}</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Detalles de la solicitud -->
        <div class="md:col-span-1">
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <h2 class="text-xl font-medium text-gray-900 mb-4">Detalles de la Solicitud</h2>
                
                <dl class="space-y-4">
                    <div>
                        <dt class="text-sm font-medium text-gray-500">ID de Solicitud</dt>
                        <dd class="mt-1 text-sm text-gray-900">#{{ $submission->id }}</dd>
                    </div>
                    
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Título</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $submission->title }}</dd>
                    </div>
                    
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Autor</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $submission->user->name }}</dd>
                    </div>
                    
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Correo Electrónico</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $submission->user->email }}</dd>
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
                    
                    <div>
                        <dt class="text-sm font-medium text-gray-500">Fecha de Envío</dt>
                        <dd class="mt-1 text-sm text-gray-900">{{ $submission->created_at->format('d/m/Y h:i A') }}</dd>
                    </div>
                </dl>
                
                @if($submission->manuscript_path)
                    <div class="mt-6 pt-6 border-t border-gray-200">
                        <h3 class="text-sm font-medium text-gray-900 mb-2">Manuscrito Adjunto</h3>
                        <a href="{{ asset('storage/' . $submission->manuscript_path) }}" target="_blank" 
                           class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-[#013243] hover:bg-[#014357] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#013243]">
                            <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            Ver Manuscrito (Word)
                        </a>
                    </div>
                @endif
            </div>
        </div>

        <!-- Formulario de asignación -->
        <div class="md:col-span-2">
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <h2 class="text-xl font-medium text-gray-900 mb-4">Selección de Árbitros</h2>
                
                @if($arbitrators->isEmpty())
                    <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-yellow-700">
                                    No hay árbitros disponibles para asignar. Por favor, contacte al administrador para dar de alta nuevos árbitros en el sistema.
                                </p>
                            </div>
                        </div>
                    </div>
                @else
                    <form action="{{ route('editor.submissions.store-assignment', $submission) }}" method="POST">
                        @csrf
                        <div class="space-y-4">
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <p class="text-sm text-gray-700">
                                    Seleccione al menos un árbitro para revisar esta solicitud. Se notificará a los árbitros seleccionados.
                                </p>
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                @foreach($arbitrators as $arbitrator)
                                    <div class="border rounded-lg p-4 flex items-start space-x-4 hover:bg-gray-50">
                                        <div class="flex-shrink-0">
                                            <input type="checkbox" name="arbitrator_ids[]" value="{{ $arbitrator->id }}" id="arbitrator-{{ $arbitrator->id }}" class="h-4 w-4 text-[#013243] focus:ring-[#013243] border-gray-300 rounded">
                                        </div>
                                        <label for="arbitrator-{{ $arbitrator->id }}" class="flex-1 cursor-pointer">
                                            <div class="text-sm font-medium text-gray-900">{{ $arbitrator->name }}</div>
                                            <div class="text-sm text-gray-500">{{ $arbitrator->email }}</div>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            
                            @error('arbitrator_ids')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="mt-6 pt-6 border-t border-gray-200 flex justify-end">
                            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-[#013243] hover:bg-[#014357] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#013243]">
                                <svg class="-ml-1 mr-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                Asignar Árbitros Seleccionados
                            </button>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
