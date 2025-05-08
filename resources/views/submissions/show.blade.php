@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="mb-6 flex justify-between items-center">
                    <h2 class="text-2xl font-semibold text-gray-800">Detalles de la Solicitud</h2>
                    <a href="{{ route('submissions.index') }}" 
                       class="text-indigo-600 hover:text-indigo-900">
                        &larr; Volver a la lista
                    </a>
                </div>

                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                <div class="bg-gray-50 rounded-lg p-6 mb-6">
                    <dl class="grid grid-cols-1 gap-x-4 gap-y-6 sm:grid-cols-2">
                        <div>
                            <dt class="text-sm font-medium text-gray-500">Título</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $submission->title }}</dd>
                        </div>

                        <div>
                            <dt class="text-sm font-medium text-gray-500">Estado</dt>
                            <dd class="mt-1" x-data="{ openStatusReasonModal: false }">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                    {{ $submission->status === 'pendiente' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                    {{ $submission->status === 'aprobado' ? 'bg-green-100 text-green-800' : '' }}
                                    {{ $submission->status === 'rechazado' ? 'bg-red-100 text-red-800' : '' }}">
                                    {{ ucfirst($submission->status) }}
                                </span>
                                @if (($submission->status === 'aprobado' || $submission->status === 'rechazado') && $submission->reason)
                                    <button @click="openStatusReasonModal = true" class="ml-2 text-indigo-600 hover:text-indigo-900 text-sm font-medium">
                                        Ver descripción del estado
                                    </button>

                                    <!-- Status Reason Modal -->
                                    <div x-show="openStatusReasonModal"
                                         x-transition:enter="ease-out duration-300"
                                         x-transition:enter-start="opacity-0"
                                         x-transition:enter-end="opacity-100"
                                         x-transition:leave="ease-in duration-200"
                                         x-transition:leave-start="opacity-100"
                                         x-transition:leave-end="opacity-0"
                                         class="fixed inset-0 z-50 overflow-y-auto flex items-center justify-center"
                                         style="display: none;" {{-- Initially hidden, Alpine controls visibility --}}>
                                        <div @click.away="openStatusReasonModal = false" class="fixed inset-0 bg-black bg-opacity-50 transition-opacity"></div>
                                        
                                        <div class="bg-white rounded-lg shadow-xl p-6 m-4 max-w-2xl w-full relative z-10 max-h-[80vh] overflow-y-auto">
                                            <div class="flex justify-between items-center pb-3 border-b">
                                                <h3 class="text-lg font-medium text-gray-900">Descripción del Estado</h3>
                                                <button @click="openStatusReasonModal = false" class="text-gray-400 hover:text-gray-600">
                                                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="mt-4">
                                                <p class="text-sm text-gray-700 whitespace-pre-line">{{ $submission->reason }}</p>
                                            </div>
                                            <div class="mt-6 flex justify-end">
                                                <button @click="openStatusReasonModal = false" type="button" class="px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                    Cerrar
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </dd>
                        </div>

                        <div x-data="{ openDescriptionModal: false }" class="sm:col-span-2">
                            <dt class="text-sm font-medium text-gray-500">Descripción</dt>
                            <dd class="mt-1 text-sm text-gray-900">
                                <p class="truncate">{{ $submission->description }}</p>
                                @if(strlen($submission->description) > 100) {{-- Adjust 100 to your preferred truncate length --}}
                                    <button @click="openDescriptionModal = true" class="text-indigo-600 hover:text-indigo-900 text-sm font-medium">
                                        Ver descripción completa
                                    </button>
                                @endif
                            </dd>

                            <!-- Description Modal -->
                            <div x-show="openDescriptionModal" 
                                 x-transition:enter="ease-out duration-300"
                                 x-transition:enter-start="opacity-0"
                                 x-transition:enter-end="opacity-100"
                                 x-transition:leave="ease-in duration-200"
                                 x-transition:leave-start="opacity-100"
                                 x-transition:leave-end="opacity-0"
                                 class="fixed inset-0 z-50 overflow-y-auto flex items-center justify-center"
                                 style="display: none;" {{-- Initially hidden, Alpine controls visibility --}}>
                                <div @click.away="openDescriptionModal = false" class="fixed inset-0 bg-black bg-opacity-50 transition-opacity"></div>
                                
                                <div class="bg-white rounded-lg shadow-xl p-6 m-4 max-w-2xl w-full relative z-10 max-h-[80vh] overflow-y-auto">
                                    <div class="flex justify-between items-center pb-3 border-b">
                                        <h3 class="text-lg font-medium text-gray-900">Descripción Completa</h3>
                                        <button @click="openDescriptionModal = false" class="text-gray-400 hover:text-gray-600">
                                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </div>
                                    <div class="mt-4">
                                        <p class="text-sm text-gray-700 whitespace-pre-line">{{ $submission->description }}</p>
                                    </div>
                                    <div class="mt-6 flex justify-end">
                                        <button @click="openDescriptionModal = false" type="button" class="px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            Cerrar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <dt class="text-sm font-medium text-gray-500">Fecha de envío</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $submission->created_at->format('d/m/Y H:i') }}</dd>
                        </div>

                        <div>
                            <dt class="text-sm font-medium text-gray-500">Manuscrito</dt>
                            <dd class="mt-1">
                                <a href="{{ Storage::url($submission->manuscript_path) }}" 
                                   target="_blank"
                                   class="text-indigo-600 hover:text-indigo-900 text-sm">
                                    Descargar manuscrito (Word)
                                </a>
                            </dd>
                        </div>

                        @if($submission->notes)
                            <div class="sm:col-span-2">
                                <dt class="text-sm font-medium text-gray-500">Notas</dt>
                                <dd class="mt-1 text-sm text-gray-900">{{ $submission->notes }}</dd>
                            </div>
                        @endif
                    </dl>
                </div>

                {{-- Historial de Revisiones --}}
                @if ($reviews && $reviews->count() > 0)
                    <div class="mt-8">
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Historial de Revisiones</h3>
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Revisado por
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Fecha
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Comentarios
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Documento de Revisión
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($reviews as $review)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                                {{ $review->arbitrator->name }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                {{ $review->created_at->format('d/m/Y H:i') }}
                                            </td>
                                            <td class="px-6 py-4 text-sm text-gray-500 whitespace-pre-line">
                                                {{ $review->comments ?? 'N/A' }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                @if ($review->document_path)
                                                    <a href="{{ Storage::url($review->document_path) }}"
                                                       target="_blank"
                                                       class="text-indigo-600 hover:text-indigo-900 flex items-center">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                                                        </svg>
                                                        Descargar
                                                    </a>
                                                @else
                                                    N/A
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4">
                            {{ $reviews->links() }}
                        </div>
                    </div>
                @else
                    <div class="mt-8">
                        <p class="text-gray-600">No hay revisiones para esta solicitud aún.</p>
                    </div>
                @endif

                @if($submission->status === 'pendiente')
                    <div class="flex justify-end">
                        <form action="{{ route('submissions.destroy', $submission) }}" 
                              method="POST" 
                              class="inline"
                              onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta solicitud?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                Eliminar Solicitud
                            </button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
