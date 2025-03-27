@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mb-8 border-b border-gray-200 pb-6">
        <a href="{{ route('books.index') }}" class="text-sm font-medium text-gray-600 hover:text-gray-900">
            ← Volver al Catálogo
        </a>
        <h1 class="font-serif text-4xl font-bold text-gray-900 mb-2">{{ $book->title }}</h1>
        <p class="text-lg text-gray-600">Detalles de la publicación</p>
    </div>

    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
        <div class="p-6 space-y-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Información básica -->
                <div class="space-y-4">
                    <div>
                        <h3 class="text-lg font-medium text-gray-900">Información General</h3>
                        <dl class="mt-2 space-y-3">
                            <div>
                                <dt class="text-sm font-medium text-gray-500">ISBN</dt>
                                <dd class="mt-1 text-sm text-gray-900 font-mono">{{ $book->isbn }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Fecha de Publicación</dt>
                                <dd class="mt-1 text-sm text-gray-900">{{ $book->publication_date }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Edición</dt>
                                <dd class="mt-1 text-sm text-gray-900">{{ $book->edition }}</dd>
                            </div>
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Editorial</dt>
                                <dd class="mt-1 text-sm text-gray-900">{{ $book->partner }}</dd>
                            </div>
                            @if($book->volume)
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Volumen</dt>
                                <dd class="mt-1 text-sm text-gray-900">{{ $book->volume }}</dd>
                            </div>
                            @endif
                            @if($book->pages)
                            <div>
                                <dt class="text-sm font-medium text-gray-500">Número de Páginas</dt>
                                <dd class="mt-1 text-sm text-gray-900">{{ $book->pages }}</dd>
                            </div>
                            @endif
                        </dl>
                    </div>
                </div>

                <!-- Portada y PDF -->
                <div class="space-y-4">
                    @if($book->cover)
                    <div>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">Portada</h3>
                        <img src="{{ asset('storage/' . $book->cover) }}" alt="Portada de {{ $book->title }}" class="max-w-xs rounded-lg shadow">
                    </div>
                    @endif

                    @if($book->pdf_path)
                    <div>
                        <h3 class="text-lg font-medium text-gray-900 mb-2">PDF del Libro</h3>
                        <a href="{{ asset('storage/' . $book->pdf_path) }}" 
                           target="_blank"
                           class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-[#013243] hover:bg-[#014357] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#013243]">
                            <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                            Descargar PDF
                        </a>
                    </div>
                    @endif
                </div>
            </div>

            @if($book->description)
            <div class="border-t border-gray-200 pt-6">
                <h3 class="text-lg font-medium text-gray-900 mb-2">Descripción</h3>
                <div class="prose max-w-none text-gray-700">
                    {{ $book->description }}
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection