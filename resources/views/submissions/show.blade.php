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
                            <dd class="mt-1">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    {{ $submission->status === 'pendiente' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                    {{ $submission->status === 'aprobado' ? 'bg-green-100 text-green-800' : '' }}
                                    {{ $submission->status === 'rechazado' ? 'bg-red-100 text-red-800' : '' }}">
                                    {{ ucfirst($submission->status) }}
                                </span>
                            </dd>
                        </div>

                        <div class="sm:col-span-2">
                            <dt class="text-sm font-medium text-gray-500">Descripción</dt>
                            <dd class="mt-1 text-sm text-gray-900">{{ $submission->description }}</dd>
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
