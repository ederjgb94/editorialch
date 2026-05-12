@extends('layouts.public')

@section('title', $book->title)
@section('meta_description', Str::limit($book->description ?? 'Publicación académica de acceso abierto — Sagedi.', 160))

@section('content')

<div class="bg-gray-50 min-h-screen py-12">
    <div class="container mx-auto px-4 max-w-5xl">

        {{-- Breadcrumb --}}
        <nav class="flex mb-8 text-sm text-gray-500" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('home') }}" class="inline-flex items-center hover:text-gray-900 transition-colors">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                        </svg>
                        Inicio
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                        </svg>
                        <a href="{{ route('books.public.index') }}" class="ml-1 hover:text-gray-900 md:ml-2 transition-colors">Libros</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                        </svg>
                        <span class="ml-1 text-gray-700 md:ml-2 font-medium line-clamp-1">{{ $book->title }}</span>
                    </div>
                </li>
            </ol>
        </nav>

        {{-- Book Detail Card --}}
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100">
            <div class="md:flex">

                {{-- Portada --}}
                <div class="md:w-5/12 p-8 lg:p-12 bg-slate-50 border-r border-gray-100 flex items-center justify-center">
                    @php
                        // Prioridad: cover (campo principal) > image > placeholder
                        $rawCover = $book->cover ?? $book->image ?? null;
                        $coverUrl = $rawCover
                            ? (str_starts_with($rawCover, 'http') ? $rawCover : asset('storage/' . $rawCover))
                            : asset('book-placeholder.webp');
                    @endphp

                    <div class="w-full max-w-[280px] rounded-lg overflow-hidden shadow-2xl transition-transform hover:scale-105 duration-300 ring-1 ring-black/10">
                        <img src="{{ $coverUrl }}"
                             alt="Portada de {{ $book->title }}"
                             class="w-full h-auto object-cover aspect-[2/3]"
                             onerror="this.src='{{ asset('book-placeholder.webp') }}'">
                    </div>
                </div>

                {{-- Información --}}
                <div class="md:w-7/12 p-8 lg:p-12 flex flex-col justify-between">
                    <div>
                        <div class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold tracking-wide uppercase bg-slate-100 text-slate-800 mb-4">
                            Libro Completo
                        </div>
                        <h1 class="text-3xl lg:text-4xl font-extrabold text-gray-900 tracking-tight mb-4 leading-tight">
                            {{ $book->title }}
                        </h1>
                        <div class="flex items-center text-gray-600 mb-8 font-medium text-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            <span class="text-slate-700">{{ $book->partner ?? $book->authors ?? 'Autor desconocido' }}</span>
                        </div>

                        {{-- Sinopsis --}}
                        <div class="mb-10">
                            <h2 class="text-lg font-bold text-gray-900 mb-4 border-b pb-2">Sinopsis</h2>
                            <p class="text-gray-700 leading-relaxed text-left opacity-90">
                                {{ $book->description ?? 'No hay una descripción disponible para este libro.' }}
                            </p>
                        </div>

                        {{-- Metadata Grid --}}
                        <div class="grid grid-cols-2 gap-y-6 gap-x-8 py-6 mb-8 bg-slate-50 rounded-xl p-6 border border-slate-100">
                            <div>
                                <p class="text-xs uppercase tracking-wider text-slate-500 font-bold mb-1">Fecha de Publicación</p>
                                <p class="text-slate-900 font-medium">
                                    @if($book->publication_date)
                                        {{ \Carbon\Carbon::parse($book->publication_date)->translatedFormat('j F Y') }}
                                    @else
                                        —
                                    @endif
                                </p>
                            </div>
                            <div>
                                <p class="text-xs uppercase tracking-wider text-slate-500 font-bold mb-1">Edición</p>
                                <p class="text-slate-900 font-medium">
                                    {{ implode(' / ', array_filter([
                                        $book->volume ? 'Vol. '.$book->volume : null,
                                        $book->edition
                                    ])) ?: '—' }}
                                </p>
                            </div>
                            <div>
                                <p class="text-xs uppercase tracking-wider text-slate-500 font-bold mb-1">ISBN</p>
                                <p class="text-slate-900 font-medium font-mono">{{ $book->isbn ?? '—' }}</p>
                            </div>
                            <div>
                                <p class="text-xs uppercase tracking-wider text-slate-500 font-bold mb-1">Páginas</p>
                                <p class="text-slate-900 font-medium">{{ $book->pages ?? '—' }}</p>
                            </div>
                        </div>
                    </div>

                    {{-- Action Buttons --}}
                    <div class="flex flex-col sm:flex-row gap-4 mt-auto">
                        @if($book->pdf_path)
                        <a href="{{ asset('storage/' . $book->pdf_path) }}"
                           target="_blank"
                           rel="noopener noreferrer"
                           class="inline-flex justify-center items-center px-8 py-3.5 border border-transparent text-base font-bold rounded-xl shadow-md shadow-slate-200 text-white bg-slate-900 hover:bg-slate-800 hover:shadow-lg hover:-translate-y-0.5 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-slate-500 transition-all duration-200 w-full sm:w-auto overflow-hidden group relative">
                            <div class="absolute inset-0 w-full h-full bg-slate-700/50 transform scale-x-0 origin-left transition-transform duration-300 group-hover:scale-x-100"></div>
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 relative z-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            <span class="relative z-10">Leer Documento</span>
                        </a>
                        @else
                        <button disabled class="inline-flex justify-center items-center px-8 py-3.5 border border-transparent text-base font-bold rounded-xl shadow-sm text-gray-400 bg-gray-100 cursor-not-allowed w-full sm:w-auto">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                            No disponible
                        </button>
                        @endif

                        <a href="{{ route('books.public.index') }}"
                           class="inline-flex justify-center items-center px-6 py-3.5 border border-gray-200 text-base font-medium rounded-xl text-gray-700 bg-white hover:bg-gray-50 transition-all duration-200 w-full sm:w-auto">
                            ← Volver al catálogo
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
