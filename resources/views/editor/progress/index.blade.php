@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mb-8 border-b border-gray-200 pb-6">
        <a href="{{ route('dashboard') }}" class="text-sm font-medium text-gray-600 hover:text-gray-900">
            ← Volver al Panel de Control
        </a>
        <h1 class="font-serif text-4xl font-bold text-gray-900 mb-2">Seguimiento de Solicitudes</h1>
        <p class="text-lg text-gray-600">Estado actual y progreso de las solicitudes de publicación</p>
    </div>

    <div class="space-y-8">
        <!-- Solicitudes en Revisión -->
        <div>
            <h2 class="text-2xl font-bold text-gray-900 mb-4 flex items-center">
                <span class="inline-flex items-center justify-center h-8 w-8 rounded-full bg-blue-100 text-blue-500 mr-3">
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </span>
                En Revisión
                <span class="ml-2 text-sm font-medium text-gray-600 bg-gray-100 rounded-full px-3 py-1">
                    {{ $inReviewSubmissions->count() }}
                </span>
            </h2>
            
            @if($inReviewSubmissions->isEmpty())
                <div class="bg-white overflow-hidden shadow-sm rounded-lg border border-gray-200">
                    <div class="p-6 flex flex-col items-center justify-center text-center">
                        <svg class="h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">No hay solicitudes</h3>
                        <p class="mt-1 text-sm text-gray-500">
                            No hay solicitudes en revisión actualmente.
                        </p>
                    </div>
                </div>
            @else
                <div class="grid gap-5 sm:grid-cols-1 md:grid-cols-2">
                    @foreach($inReviewSubmissions as $submission)
                        <div class="bg-white shadow-sm rounded-lg border border-blue-100 overflow-hidden">
                            <div class="border-b border-blue-100 bg-blue-50 px-4 py-3 flex justify-between items-center">
                                <div class="flex items-center">
                                    <span class="inline-flex items-center justify-center h-8 w-8 rounded-full bg-blue-100 text-blue-600">
                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                        </svg>
                                    </span>
                                    <h3 class="ml-2 text-lg font-medium text-blue-900 truncate">
                                        Solicitud #{{ $submission->id }}
                                    </h3>
                                </div>
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                    En Revisión
                                </span>
                            </div>
                            <div class="p-4">
                                <h4 class="text-base font-medium text-gray-900">{{ $submission->title }}</h4>
                                <p class="text-sm text-gray-500 mt-1">Por: {{ $submission->user->name }}</p>
                                <div class="mt-3">
                                    <h5 class="text-sm font-medium text-gray-700">Árbitros asignados:</h5>
                                    @if($submission->arbitrators->isEmpty())
                                        <p class="text-sm text-gray-500">No hay árbitros asignados</p>
                                    @else
                                        <ul class="mt-1 space-y-1">
                                            @foreach($submission->arbitrators as $arbitrator)
                                                <li class="flex items-center text-sm">
                                                    <span class="inline-block h-2 w-2 flex-shrink-0 rounded-full bg-blue-400 mr-2"></span>
                                                    <span>{{ $arbitrator->name }}</span>
                                                    @php
                                                        $status = $arbitrator->pivot->status ?? 'pendiente';
                                                    @endphp
                                                    @if($status === 'completado')
                                                        <span class="ml-2 inline-flex items-center text-xs text-green-700">
                                                            <svg class="h-3 w-3 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                                            </svg>
                                                            Completado
                                                        </span>
                                                    @else
                                                        <span class="ml-2 inline-flex items-center text-xs text-yellow-700">
                                                            <svg class="h-3 w-3 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                                            </svg>
                                                            {{ ucfirst($status) }}
                                                        </span>
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>
                                <div class="mt-4 flex justify-end">
                                    <a href="{{ route('editor.progress.show', $submission) }}" class="inline-flex items-center px-3 py-1 border border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50">
                                        Ver detalles
                                        <svg class="ml-1.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <!-- Solicitudes Pendientes -->
        <div>
            <h2 class="text-2xl font-bold text-gray-900 mb-4 flex items-center">
                <span class="inline-flex items-center justify-center h-8 w-8 rounded-full bg-yellow-100 text-yellow-500 mr-3">
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </span>
                Pendientes
                <span class="ml-2 text-sm font-medium text-gray-600 bg-gray-100 rounded-full px-3 py-1">
                    {{ $pendingSubmissions->count() }}
                </span>
            </h2>
            
            @if($pendingSubmissions->isEmpty())
                <div class="bg-white overflow-hidden shadow-sm rounded-lg border border-gray-200">
                    <div class="p-6 flex flex-col items-center justify-center text-center">
                        <svg class="h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                        </svg>
                        <h3 class="mt-2 text-sm font-medium text-gray-900">No hay solicitudes</h3>
                        <p class="mt-1 text-sm text-gray-500">
                            No hay solicitudes pendientes actualmente.
                        </p>
                    </div>
                </div>
            @else
                <div class="grid gap-5 sm:grid-cols-1 md:grid-cols-2">
                    @foreach($pendingSubmissions as $submission)
                        <div class="bg-white shadow-sm rounded-lg border border-yellow-100 overflow-hidden">
                            <div class="border-b border-yellow-100 bg-yellow-50 px-4 py-3 flex justify-between items-center">
                                <div class="flex items-center">
                                    <span class="inline-flex items-center justify-center h-8 w-8 rounded-full bg-yellow-100 text-yellow-600">
                                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                                        </svg>
                                    </span>
                                    <h3 class="ml-2 text-lg font-medium text-yellow-900 truncate">
                                        Solicitud #{{ $submission->id }}
                                    </h3>
                                </div>
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                    Pendiente
                                </span>
                            </div>
                            <div class="p-4">
                                <h4 class="text-base font-medium text-gray-900">{{ $submission->title }}</h4>
                                <p class="text-sm text-gray-500 mt-1">Por: {{ $submission->user->name }}</p>
                                <div class="mt-4">
                                    <p class="text-xs text-gray-500">Enviada el {{ $submission->created_at->format('d/m/Y \a \l\a\s H:i') }}</p>
                                </div>
                                <div class="mt-4 flex justify-between">
                                    <a href="{{ route('editor.submissions.assign', $submission) }}" class="inline-flex items-center px-3 py-1 border border-blue-300 shadow-sm text-xs font-medium rounded text-blue-700 bg-white hover:bg-blue-50">
                                        <svg class="mr-1.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                        </svg>
                                        Asignar Árbitros
                                    </a>
                                    <a href="{{ route('editor.progress.show', $submission) }}" class="inline-flex items-center px-3 py-1 border border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50">
                                        Ver detalles
                                        <svg class="ml-1.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <!-- Solicitudes Aprobadas y Rechazadas en dos columnas -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Solicitudes Aprobadas -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-4 flex items-center">
                    <span class="inline-flex items-center justify-center h-8 w-8 rounded-full bg-green-100 text-green-500 mr-3">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                    </span>
                    Aprobadas
                    <span class="ml-2 text-sm font-medium text-gray-600 bg-gray-100 rounded-full px-3 py-1">
                        {{ $approvedSubmissions->count() }}
                    </span>
                </h2>
                
                @if($approvedSubmissions->isEmpty())
                    <div class="bg-white overflow-hidden shadow-sm rounded-lg border border-gray-200">
                        <div class="p-6 flex flex-col items-center justify-center text-center">
                            <svg class="h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">No hay solicitudes</h3>
                            <p class="mt-1 text-sm text-gray-500">
                                No hay solicitudes aprobadas actualmente.
                            </p>
                        </div>
                    </div>
                @else
                    <div class="space-y-3">
                        @foreach($approvedSubmissions as $submission)
                            <a href="{{ route('editor.progress.show', $submission) }}" class="block bg-white shadow-sm rounded-lg border border-green-100 overflow-hidden hover:bg-green-50">
                                <div class="px-4 py-3 flex justify-between items-center">
                                    <div class="flex items-center">
                                        <span class="inline-flex items-center justify-center h-8 w-8 rounded-full bg-green-100 text-green-600">
                                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </span>
                                        <div class="ml-3">
                                            <h3 class="text-sm font-medium text-gray-900">{{ $submission->title }}</h3>
                                            <p class="text-sm text-gray-500">Por: {{ $submission->user->name }}</p>
                                        </div>
                                    </div>
                                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>
            
            <!-- Solicitudes Rechazadas -->
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-4 flex items-center">
                    <span class="inline-flex items-center justify-center h-8 w-8 rounded-full bg-red-100 text-red-500 mr-3">
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </span>
                    Rechazadas
                    <span class="ml-2 text-sm font-medium text-gray-600 bg-gray-100 rounded-full px-3 py-1">
                        {{ $rejectedSubmissions->count() }}
                    </span>
                </h2>
                
                @if($rejectedSubmissions->isEmpty())
                    <div class="bg-white overflow-hidden shadow-sm rounded-lg border border-gray-200">
                        <div class="p-6 flex flex-col items-center justify-center text-center">
                            <svg class="h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">No hay solicitudes</h3>
                            <p class="mt-1 text-sm text-gray-500">
                                No hay solicitudes rechazadas actualmente.
                            </p>
                        </div>
                    </div>
                @else
                    <div class="space-y-3">
                        @foreach($rejectedSubmissions as $submission)
                            <a href="{{ route('editor.progress.show', $submission) }}" class="block bg-white shadow-sm rounded-lg border border-red-100 overflow-hidden hover:bg-red-50">
                                <div class="px-4 py-3 flex justify-between items-center">
                                    <div class="flex items-center">
                                        <span class="inline-flex items-center justify-center h-8 w-8 rounded-full bg-red-100 text-red-600">
                                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </span>
                                        <div class="ml-3">
                                            <h3 class="text-sm font-medium text-gray-900">{{ $submission->title }}</h3>
                                            <p class="text-sm text-gray-500">Por: {{ $submission->user->name }}</p>
                                        </div>
                                    </div>
                                    <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                    </svg>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
