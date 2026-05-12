@extends('layouts.app')

@section('content')
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-8 text-center">
            {{-- Ícono de éxito --}}
            <div class="mx-auto flex items-center justify-center h-16 w-16 rounded-full bg-green-100 mb-6">
                <svg class="h-8 w-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                </svg>
            </div>

            {{-- Mensaje --}}
            <h1 class="font-serif text-3xl font-bold text-gray-900 mb-2">
                {{ session('action') === 'updated' ? '¡Libro actualizado con éxito!' : '¡Libro añadido con éxito!' }}
            </h1>
            <p class="text-gray-500 mb-8">
                <span class="font-medium text-gray-700">{{ $book->title }}</span> se ha
                {{ session('action') === 'updated' ? 'actualizado' : 'registrado' }} correctamente en el catálogo.
            </p>

            {{-- Preview del libro --}}
            <div class="bg-gray-50 rounded-lg border border-gray-100 p-5 mb-8 text-left">
                <div class="flex items-start gap-4">
                    @if($book->image)
                        <img src="{{ Storage::url($book->image) }}" alt="{{ $book->title }}"
                            class="h-32 w-24 object-cover rounded-md border border-gray-200 shadow-sm flex-shrink-0">
                    @else
                        <div class="h-28 w-20 rounded-md bg-gray-200 flex items-center justify-center flex-shrink-0">
                            <svg class="h-8 w-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                    @endif
                    <div class="min-w-0">
                        <p class="text-sm font-semibold text-gray-900">{{ $book->title }}</p>
                        @if($book->authors)
                            <p class="text-sm text-gray-500 mt-0.5">{{ $book->authors }}</p>
                        @endif
                        <div class="mt-2 flex flex-wrap gap-x-4 gap-y-1 text-xs text-gray-400">
                            <span>ISBN: {{ $book->isbn }}</span>
                            <span>{{ $book->partner }}</span>
                            <span>{{ $book->edition }}</span>
                        </div>
                        <div class="mt-2 flex gap-3">
                            @if($book->cover)
                                <a href="{{ Storage::url($book->cover) }}" target="_blank"
                                    class="inline-flex items-center text-xs text-[#013243] hover:underline font-medium">
                                    <svg class="h-3.5 w-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                                    </svg>
                                    Portada
                                </a>
                            @endif
                            @if($book->pdf_path)
                                <a href="{{ Storage::url($book->pdf_path) }}" target="_blank"
                                    class="inline-flex items-center text-xs text-[#013243] hover:underline font-medium">
                                    <svg class="h-3.5 w-3.5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                    </svg>
                                    PDF del Libro
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            {{-- Acciones --}}
            <div class="flex flex-col items-center justify-center gap-3">
                <a href="{{ route('books.public.show', $book) }}" target="_blank"
                    class="w-full inline-flex items-center justify-center px-6 py-3.5 border border-transparent text-base font-medium rounded-lg shadow-sm text-white bg-[#013243] hover:bg-[#013243]/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#013243] transition-colors">
                    <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                    Ver libro en web
                </a>
                <a href="{{ route('admin.books.index') }}"
                    class="w-full inline-flex items-center justify-center px-6 py-3.5 border border-gray-300 text-base font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#013243] transition-colors">
                    <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Regresar a sección de libros
                </a>
            </div>
        </div>
    </div>
@endsection