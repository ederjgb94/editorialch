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

    <div class="space-y-16">
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
                <div class="bg-white shadow-sm rounded-lg border border-blue-100 overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-blue-200">
                            <thead class="bg-blue-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-blue-900 uppercase tracking-wider">ID</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-blue-900 uppercase tracking-wider">Título</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-blue-900 uppercase tracking-wider">Autor</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-blue-900 uppercase tracking-wider">Árbitros</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-blue-900 uppercase tracking-wider">Estado</th>
                                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-blue-900 uppercase tracking-wider">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                <tr>
                                    <td colspan="6" class="px-6 py-8 text-center">
                                        <p class="text-sm font-medium text-gray-500">No hay solicitudes en revisión actualmente.</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
                <div class="bg-white shadow-sm rounded-lg border border-blue-100 overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-blue-200">
                            <thead class="bg-blue-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-blue-900 uppercase tracking-wider">ID</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-blue-900 uppercase tracking-wider">Título</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-blue-900 uppercase tracking-wider">Autor</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-blue-900 uppercase tracking-wider">Árbitros</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-blue-900 uppercase tracking-wider">Estado</th>
                                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-blue-900 uppercase tracking-wider">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-blue-100">
                                @foreach($inReviewSubmissions as $submission)
                                    <tr class="hover:bg-blue-50">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-blue-900">
                                            #{{ $submission->id }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-900">
                                            {{ $submission->title }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-500">
                                            {{ $submission->user->name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            @if($submission->arbitrators->isEmpty())
                                                <span class="text-sm text-gray-500">No hay árbitros asignados</span>
                                            @else
                                                <div class="space-y-1">
                                                    @foreach($submission->arbitrators as $arbitrator)
                                                        <div class="flex items-center text-sm">
                                                            <span class="inline-block h-2 w-2 flex-shrink-0 rounded-full bg-blue-400 mr-2"></span>
                                                            <span class="text-gray-900">{{ $arbitrator->name }}</span>
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
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                                En Revisión
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="{{ route('editor.progress.show', $submission) }}" class="inline-flex items-center px-3 py-1 border border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50">
                                                Ver detalles
                                                <svg class="ml-1.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                                </svg>
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

        <!-- Solicitudes Pendientes -->
        <div class="mt-8">
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
                <div class="bg-white shadow-sm rounded-lg border border-yellow-100 overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-yellow-200">
                            <thead class="bg-yellow-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-yellow-900 uppercase tracking-wider">ID</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-yellow-900 uppercase tracking-wider">Título</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-yellow-900 uppercase tracking-wider">Autor</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-yellow-900 uppercase tracking-wider">Fecha de envío</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-yellow-900 uppercase tracking-wider">Estado</th>
                                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-yellow-900 uppercase tracking-wider">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white">
                                <tr>
                                    <td colspan="6" class="px-6 py-8 text-center">
                                        <p class="text-sm font-medium text-gray-500">No hay solicitudes pendientes actualmente.</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
                <div class="bg-white shadow-sm rounded-lg border border-yellow-100 overflow-hidden">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-yellow-200">
                            <thead class="bg-yellow-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-yellow-900 uppercase tracking-wider">ID</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-yellow-900 uppercase tracking-wider">Título</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-yellow-900 uppercase tracking-wider">Autor</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-yellow-900 uppercase tracking-wider">Fecha de envío</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-yellow-900 uppercase tracking-wider">Estado</th>
                                    <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-yellow-900 uppercase tracking-wider">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-yellow-100">
                                @foreach($pendingSubmissions as $submission)
                                    <tr class="hover:bg-yellow-50">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-yellow-900">
                                            #{{ $submission->id }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-900">
                                            {{ $submission->title }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-500">
                                            {{ $submission->user->name }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-500">
                                            {{ $submission->created_at->format('d/m/Y \a \l\a\s H:i') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                Pendiente
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
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
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>

        <!-- Solicitudes Aprobadas -->
        <div class="mt-8">
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
                    <div class="bg-white shadow-sm rounded-lg border border-gray-200 overflow-hidden">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">ID</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Título</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Autor</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Fecha</th>
                                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-700 uppercase tracking-wider">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white">
                                    <tr>
                                        <td colspan="5" class="px-6 py-8 text-center">
                                            <p class="text-sm font-medium text-gray-500">No hay solicitudes aprobadas actualmente.</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                @else
                    <div class="bg-white shadow-sm rounded-lg border border-gray-200 overflow-hidden">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">ID</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Título</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Autor</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Fecha</th>
                                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-700 uppercase tracking-wider">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-100">
                                    @foreach($approvedSubmissions as $submission)
                                        <tr class="hover:bg-gray-50">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                #{{ $submission->id }}
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-900">
                                                {{ $submission->title }}
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-500">
                                                {{ $submission->user->name }}
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-500">
                                                {{ $submission->updated_at->format('d/m/Y') }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a href="{{ route('editor.progress.show', $submission) }}" class="inline-flex items-center px-3 py-1 border border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50">
                                                    Ver detalles
                                                    <svg class="ml-1.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                                    </svg>
                                                </a>
                                            </td>
                                        </tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                #{{ $submission->id }}
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-900">
                                                {{ $submission->title }}
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-500">
                                                {{ $submission->user->name }}
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-500">
                                                {{ $submission->updated_at->format('d/m/Y') }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a href="{{ route('editor.progress.show', $submission) }}" class="inline-flex items-center px-3 py-1 border border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50">
                                                    Ver detalles
                                                    <svg class="ml-1.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                                    </svg>
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
        
        <!-- Solicitudes Rechazadas -->
        <div class="mt-8">
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
                    <div class="bg-white shadow-sm rounded-lg border border-red-100 overflow-hidden">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-red-200">
                                <thead class="bg-red-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-red-900 uppercase tracking-wider">ID</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-red-900 uppercase tracking-wider">Título</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-red-900 uppercase tracking-wider">Autor</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-red-900 uppercase tracking-wider">Fecha</th>
                                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-red-900 uppercase tracking-wider">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white">
                                    <tr>
                                        <td colspan="5" class="px-6 py-8 text-center">
                                            <p class="text-sm font-medium text-gray-500">No hay solicitudes rechazadas actualmente.</p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                @else
                    <div class="bg-white shadow-sm rounded-lg border border-red-100">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-red-200">
                                <thead class="bg-red-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-red-900 uppercase tracking-wider">ID</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-red-900 uppercase tracking-wider">Título</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-red-900 uppercase tracking-wider">Autor</th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-red-900 uppercase tracking-wider">Fecha</th>
                                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-red-900 uppercase tracking-wider">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-red-100">
                                    @foreach($rejectedSubmissions as $submission)
                                        <tr class="hover:bg-red-50">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-red-900">
                                                #{{ $submission->id }}
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-900">
                                                {{ $submission->title }}
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-500">
                                                {{ $submission->user->name }}
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-500">
                                                {{ $submission->updated_at->format('d/m/Y') }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a href="{{ route('editor.progress.show', $submission) }}" 
                                                   class="inline-flex items-center px-3 py-1 border border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50">
                                                    Ver detalles
                                                    <svg class="ml-1.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                                    </svg>
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
    </div>
</div>
@endsection
