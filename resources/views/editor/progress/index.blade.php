@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <div class="mb-8 border-b border-gray-200 pb-6">
        <a href="{{ route('dashboard') }}" class="text-sm font-medium text-gray-600 hover:text-gray-900 flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Volver al Panel de Control
        </a>
        <h1 class="font-serif text-4xl font-bold text-gray-900 mt-3 mb-2">Seguimiento de Solicitudes</h1>
        <p class="text-lg text-gray-600">Estado actual y progreso de las solicitudes de publicación</p>
    </div>

    <div class="space-y-12">
        <!-- Solicitudes en Revisión -->
        <div>
            <h2 class="text-2xl font-semibold text-gray-800 mb-4 flex items-center">
                <span class="inline-flex items-center justify-center h-8 w-8 rounded-full bg-blue-100 text-blue-600 mr-3">
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </span>
                En Revisión
                <span class="ml-3 text-sm font-medium text-gray-500 bg-gray-100 rounded-full px-3 py-1">
                    {{ $inReviewSubmissions->count() }}
                </span>
            </h2>
            
            <div class="bg-white rounded-lg shadow-md border border-gray-200 overflow-hidden">
                <div class="overflow-x-auto" style="-webkit-overflow-scrolling: touch;">
                    @if($inReviewSubmissions->isEmpty())
                        <div class="p-6 text-center text-sm text-gray-500">
                            No hay solicitudes en revisión actualmente.
                        </div>
                    @else
                        <table class="min-w-[800px] w-full">
                            <thead class="bg-blue-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-blue-700 uppercase tracking-wider w-[5%]">ID</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-blue-700 uppercase tracking-wider">Título</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-blue-700 uppercase tracking-wider lg:w-1/5">Autor</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-blue-700 uppercase tracking-wider lg:w-1/4">Árbitros</th>
                                    <th scope="col" class="px-6 py-3 text-center text-xs font-semibold text-blue-700 uppercase tracking-wider w-[10%]">Estado</th>
                                    <th scope="col" class="px-6 py-3 text-right text-xs font-semibold text-blue-700 uppercase tracking-wider w-[15%] whitespace-nowrap">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($inReviewSubmissions as $submission)
                                    <tr class="hover:bg-blue-50/50">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-blue-600">#{{ $submission->id }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-700 break-words">{{ $submission->title }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $submission->user->name }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-700">
                                            @if($submission->arbitrators->isEmpty())
                                                <span class="text-xs text-gray-500 italic">No asignados</span>
                                            @else
                                                <div class="space-y-1">
                                                    @foreach($submission->arbitrators as $arbitrator)
                                                        <div class="flex items-center text-xs">
                                                            <span class="font-medium text-gray-700 mr-1.5">{{ $arbitrator->name }}:</span>
                                                            @php $status = $arbitrator->pivot->status ?? 'pendiente'; @endphp
                                                            @if($status === 'pendiente')
                                                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-semibold bg-yellow-100 text-yellow-800">
                                                                    <span class="w-1.5 h-1.5 mr-1.5 rounded-full bg-yellow-400"></span>
                                                                    Pendiente
                                                                </span>
                                                            @elseif($status === 'en_proceso')
                                                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-semibold bg-blue-100 text-blue-800">
                                                                    <span class="w-1.5 h-1.5 mr-1.5 rounded-full bg-blue-400"></span>
                                                                    En proceso
                                                                </span>
                                                            @elseif($status === 'completado')
                                                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-semibold bg-green-100 text-green-800">
                                                                    <span class="w-1.5 h-1.5 mr-1.5 rounded-full bg-green-400"></span>
                                                                    Completado
                                                                </span>
                                                            @endif
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm">
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-800">
                                                En Revisión
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                            <a href="{{ route('editor.progress.show', $submission) }}" class="inline-flex items-center px-3 py-1.5 border border-gray-300 shadow-sm text-xs font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                Ver detalles
                                                <svg class="ml-1.5 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>

        <!-- Solicitudes Pendientes -->
        <div class="mt-12">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4 flex items-center">
                <span class="inline-flex items-center justify-center h-8 w-8 rounded-full bg-yellow-100 text-yellow-600 mr-3">
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </span>
                Pendientes
                <span class="ml-3 text-sm font-medium text-gray-500 bg-gray-100 rounded-full px-3 py-1">
                    {{ $pendingSubmissions->count() }}
                </span>
            </h2>
            
            <div class="bg-white rounded-lg shadow-md border border-gray-200 overflow-hidden">
                <div class="overflow-x-auto" style="-webkit-overflow-scrolling: touch;">
                    @if($pendingSubmissions->isEmpty())
                         <div class="p-6 text-center text-sm text-gray-500">
                            No hay solicitudes pendientes actualmente.
                        </div>
                    @else
                        <table class="min-w-[800px] w-full">
                            <thead class="bg-yellow-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-yellow-700 uppercase tracking-wider w-[5%]">ID</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-yellow-700 uppercase tracking-wider">Título</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-yellow-700 uppercase tracking-wider lg:w-1/5">Autor</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-yellow-700 uppercase tracking-wider w-[15%]">Fecha de envío</th>
                                    <th scope="col" class="px-6 py-3 text-center text-xs font-semibold text-yellow-700 uppercase tracking-wider w-[10%]">Estado</th>
                                    <th scope="col" class="px-6 py-3 text-right text-xs font-semibold text-yellow-700 uppercase tracking-wider w-[20%] whitespace-nowrap">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($pendingSubmissions as $submission)
                                    <tr class="hover:bg-yellow-50/50">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-yellow-600">#{{ $submission->id }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-700 break-words">{{ $submission->title }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $submission->user->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $submission->created_at->format('d/m/Y H:i') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-center text-sm">
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-yellow-100 text-yellow-800">
                                                Pendiente
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                            <a href="{{ route('editor.submissions.assign', $submission) }}" class="inline-flex items-center px-3 py-1.5 border border-transparent shadow-sm text-xs font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                                <svg class="mr-1.5 -ml-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                                </svg>
                                                Asignar
                                            </a>
                                            <a href="{{ route('editor.progress.show', $submission) }}" class="inline-flex items-center px-3 py-1.5 border border-gray-300 shadow-sm text-xs font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                Ver detalles
                                                <svg class="ml-1.5 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>

        <!-- Solicitudes Aprobadas -->
        <div class="mt-12">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4 flex items-center">
                <span class="inline-flex items-center justify-center h-8 w-8 rounded-full bg-green-100 text-green-600 mr-3">
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                </span>
                Aprobadas
                <span class="ml-3 text-sm font-medium text-gray-500 bg-gray-100 rounded-full px-3 py-1">
                    {{ $approvedSubmissions->count() }}
                </span>
            </h2>
             <div class="bg-white rounded-lg shadow-md border border-gray-200 overflow-hidden">
                <div class="overflow-x-auto" style="-webkit-overflow-scrolling: touch;">
                    @if($approvedSubmissions->isEmpty())
                        <div class="p-6 text-center text-sm text-gray-500">
                            No hay solicitudes aprobadas actualmente.
                        </div>
                    @else
                        <table class="min-w-[700px] w-full">
                            <thead class="bg-green-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-green-700 uppercase tracking-wider w-[5%]">ID</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-green-700 uppercase tracking-wider">Título</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-green-700 uppercase tracking-wider lg:w-1/4">Autor</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-green-700 uppercase tracking-wider w-[20%]">Fecha Aprobación</th>
                                    <th scope="col" class="px-6 py-3 text-right text-xs font-semibold text-green-700 uppercase tracking-wider w-[15%] whitespace-nowrap">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($approvedSubmissions as $submission)
                                    <tr class="hover:bg-green-50/50">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-green-600">#{{ $submission->id }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-700 break-words">{{ $submission->title }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $submission->user->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $submission->updated_at->format('d/m/Y') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="{{ route('editor.progress.show', $submission) }}" class="inline-flex items-center px-3 py-1.5 border border-gray-300 shadow-sm text-xs font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                Ver detalles
                                                <svg class="ml-1.5 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
        
        <!-- Solicitudes Rechazadas -->
        <div class="mt-12">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4 flex items-center">
                <span class="inline-flex items-center justify-center h-8 w-8 rounded-full bg-red-100 text-red-600 mr-3">
                    <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </span>
                Rechazadas
                <span class="ml-3 text-sm font-medium text-gray-500 bg-gray-100 rounded-full px-3 py-1">
                    {{ $rejectedSubmissions->count() }}
                </span>
            </h2>
            <div class="bg-white rounded-lg shadow-md border border-gray-200 overflow-hidden">
                <div class="overflow-x-auto" style="-webkit-overflow-scrolling: touch;">
                    @if($rejectedSubmissions->isEmpty())
                        <div class="p-6 text-center text-sm text-gray-500">
                            No hay solicitudes rechazadas actualmente.
                        </div>
                    @else
                         <table class="min-w-[700px] w-full">
                            <thead class="bg-red-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-red-700 uppercase tracking-wider w-[5%]">ID</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-red-700 uppercase tracking-wider">Título</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-red-700 uppercase tracking-wider lg:w-1/4">Autor</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-semibold text-red-700 uppercase tracking-wider w-[20%]">Fecha Rechazo</th>
                                    <th scope="col" class="px-6 py-3 text-right text-xs font-semibold text-red-700 uppercase tracking-wider w-[15%] whitespace-nowrap">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($rejectedSubmissions as $submission)
                                    <tr class="hover:bg-red-50/50">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-red-600">#{{ $submission->id }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-700 break-words">{{ $submission->title }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $submission->user->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $submission->updated_at->format('d/m/Y') }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="{{ route('editor.progress.show', $submission) }}" class="inline-flex items-center px-3 py-1.5 border border-gray-300 shadow-sm text-xs font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                Ver detalles
                                                <svg class="ml-1.5 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
