@extends('layouts.public')

@section('title', 'Joulaar — Journal of Latin American Academic Research')
@section('meta_description', 'Editorial de acceso abierto totalmente en línea. Journal of Latin American Academic Research (ISSN 2572-0619).')

@section('content')

{{-- Hero Section --}}
<section class="relative min-h-[70vh] flex items-center justify-center overflow-hidden bg-slate-900">
    {{-- Background Image --}}
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('hero-banner.jpg') }}"
             alt="Joulaar Hero"
             class="w-full h-full object-cover opacity-50">
        <div class="absolute inset-0 bg-gradient-to-b from-slate-900/60 via-transparent to-slate-900"></div>
    </div>

    <div class="container mx-auto px-6 relative z-10 text-center">
        <div class="max-w-4xl mx-auto space-y-8 animate-fade-in">
            <div class="space-y-4">
                <h1 class="text-5xl md:text-7xl font-normal text-white" style="font-family:'DM Serif Display','Georgia',serif;">
                    Joulaar
                </h1>
                <p class="text-lg md:text-2xl text-blue-100 font-normal tracking-wide" style="font-family:'Source Sans 3',ui-sans-serif,sans-serif;">
                    Journal of Latin American Academic Research
                    <span class="block text-xs md:text-sm font-light mt-2 text-blue-300/80 tracking-[0.3em] uppercase">(ISSN 2572-0619)</span>
                </p>
                <div class="h-px w-24 bg-blue-500/40 mx-auto"></div>
            </div>

            <p class="text-base md:text-xl text-gray-200 leading-relaxed font-light max-w-3xl mx-auto">
                Es una editorial de acceso abierto totalmente en línea. Nuestra labor se
                desarrolla acorde a la <span class="text-white font-medium">Iniciativa Budapest sobre Acceso Abierto</span>,
                comprometidos con la divulgación de investigación académica global de alta calidad.
            </p>

            <div class="flex flex-wrap gap-6 justify-center pt-4">
                <a href="{{ route('books.public.index') }}"
                   class="inline-block bg-white text-slate-900 px-10 py-4 text-lg font-bold hover:bg-blue-50 transition-all duration-300 rounded-lg shadow-lg hover:-translate-y-0.5">
                    Explorar Catálogo
                </a>
                <a href="{{ route('contact') }}"
                   class="inline-block border border-white/40 text-white px-10 py-4 text-lg font-bold hover:bg-white/5 transition-all duration-300 rounded-lg backdrop-blur-sm hover:-translate-y-0.5">
                    Publicar con nosotros
                </a>
            </div>
        </div>
    </div>
</section>

{{-- Content Sections --}}
<div class="bg-white">

    {{-- Misión Section --}}
    <section class="py-16 md:py-24 bg-gradient-to-b from-gray-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-semibold mb-4" style="font-family:'Source Serif 4','Georgia',serif;">Nuestra Misión</h2>
                <div class="w-16 h-1 bg-blue-600/40 mx-auto"></div>
            </div>
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="space-y-6">
                    <p class="text-gray-700 text-base md:text-lg leading-relaxed">
                        En Joulaar nos dedicamos a facilitar la difusión del conocimiento académico y científico,
                        operando bajo los principios de la Iniciativa Budapest sobre Acceso Abierto.
                    </p>
                    <p class="text-gray-700 text-base md:text-lg leading-relaxed">
                        Nuestro compromiso es brindar una plataforma de publicación que conecte a investigadores,
                        académicos y universidades con lectores de todo el mundo, garantizando la calidad y el
                        rigor científico en cada publicación.
                    </p>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div class="bg-gray-50 p-6 rounded-lg">
                        <h3 class="text-xl font-semibold mb-2">Acceso Abierto</h3>
                        <p class="text-gray-600">Compromiso con la democratización del conocimiento</p>
                    </div>
                    <div class="bg-gray-50 p-6 rounded-lg">
                        <h3 class="text-xl font-semibold mb-2">Calidad Editorial</h3>
                        <p class="text-gray-600">Proceso riguroso de revisión y edición</p>
                    </div>
                    <div class="bg-gray-50 p-6 rounded-lg">
                        <h3 class="text-xl font-semibold mb-2">Alcance Global</h3>
                        <p class="text-gray-600">Difusión internacional de publicaciones</p>
                    </div>
                    <div class="bg-gray-50 p-6 rounded-lg">
                        <h3 class="text-xl font-semibold mb-2">Innovación</h3>
                        <p class="text-gray-600">Tecnología al servicio del conocimiento</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Services Section --}}
    <section class="py-16 md:py-24 bg-gray-50 border-t border-gray-100">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-semibold mb-4" style="font-family:'Source Serif 4','Georgia',serif;">Nuestros Servicios</h2>
                <div class="w-16 h-1 bg-blue-600/40 mx-auto"></div>
            </div>
            <div class="grid md:grid-cols-3 gap-8">

                {{-- Publicación Académica --}}
                <div class="bg-white p-8 rounded-xl shadow-sm hover:shadow-md transition-all duration-300 border border-gray-100 group">
                    <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-lg flex items-center justify-center mb-6 group-hover:bg-blue-600 group-hover:text-white transition-colors duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-800 tracking-tight">Publicación Académica</h3>
                    <p class="text-gray-600 text-sm md:text-base leading-relaxed">
                        Publicación de libros, artículos y trabajos de investigación con los más altos estándares de calidad.
                    </p>
                </div>

                {{-- Revisión Editorial --}}
                <div class="bg-white p-8 rounded-xl shadow-sm hover:shadow-md transition-all duration-300 border border-gray-100 group">
                    <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-lg flex items-center justify-center mb-6 group-hover:bg-blue-600 group-hover:text-white transition-colors duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-800 tracking-tight">Revisión Editorial</h3>
                    <p class="text-gray-600 text-sm md:text-base leading-relaxed">
                        Proceso de revisión por pares y edición profesional para garantizar la excelencia académica.
                    </p>
                </div>

                {{-- Difusión Global --}}
                <div class="bg-white p-8 rounded-xl shadow-sm hover:shadow-md transition-all duration-300 border border-gray-100 group">
                    <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-lg flex items-center justify-center mb-6 group-hover:bg-blue-600 group-hover:text-white transition-colors duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-gray-800 tracking-tight">Difusión Global</h3>
                    <p class="text-gray-600 text-sm md:text-base leading-relaxed">
                        Distribución internacional y promoción de contenido académico en plataformas digitales.
                    </p>
                </div>

            </div>
        </div>
    </section>

    {{-- Featured Books Section --}}
    @if($featuredBooks->count() > 0)
    <section class="py-16 md:py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-semibold mb-4" style="font-family:'Source Serif 4','Georgia',serif;">Publicaciones Recientes</h2>
                <div class="w-16 h-1 bg-blue-600/40 mx-auto mb-6"></div>
                <p class="text-gray-500 max-w-xl mx-auto">Explora nuestras últimas publicaciones académicas de acceso abierto.</p>
            </div>
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                @foreach($featuredBooks as $book)
                <a href="{{ route('books.public.show', $book) }}"
                   class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow flex flex-col h-full group cursor-pointer">
                    <div class="relative pt-[120%] overflow-hidden bg-gray-200">
                        @php
                        // Prioridad: cover (campo principal) > image > placeholder
                        $rawCover = $book->cover ?? $book->image ?? null;
                        if ($rawCover) {
                            $coverUrl = str_starts_with($rawCover, 'http')
                                ? $rawCover
                                : asset('storage/' . $rawCover);
                        } else {
                            $coverUrl = asset('book-placeholder.webp');
                        }
                    @endphp
                        <img src="{{ $coverUrl }}"
                             alt="Portada de {{ $book->title }}"
                             class="absolute top-0 left-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                             onerror="this.onerror=null;this.src='{{ asset('book-placeholder.webp') }}'">
                    </div>
                    <div class="p-4 flex-grow flex flex-col">
                        <h3 class="font-bold text-sm mb-1 text-gray-800 line-clamp-2">{{ $book->title }}</h3>
                        <p class="text-xs text-gray-500">{{ $book->partner ?? $book->authors ?? 'Autor desconocido' }}</p>
                    </div>
                </a>
                @endforeach
            </div>
            <div class="text-center mt-12">
                <a href="{{ route('books.public.index') }}"
                   class="inline-block bg-slate-900 text-white px-10 py-4 text-base font-bold hover:bg-slate-800 transition-all duration-300 rounded-lg shadow-lg hover:-translate-y-0.5">
                    Ver catálogo completo
                </a>
            </div>
        </div>
    </section>
    @endif

    {{-- CTA Section --}}
    <section class="py-16 md:py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="relative py-20 md:py-28 overflow-hidden rounded-3xl shadow-2xl">
                {{-- Background Image with Overlay --}}
                <div class="absolute inset-0 z-0">
                    <img src="{{ asset('pexels-cottonbro-6334870.jpg') }}"
                         alt="CTA Background"
                         class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-slate-900/60 backdrop-blur-[1px]"></div>
                </div>

                <div class="max-w-4xl mx-auto text-center px-6 relative z-10 text-white">
                    <h2 class="text-3xl md:text-5xl font-normal mb-6 leading-tight" style="font-family:'DM Serif Display','Georgia',serif;">
                        ¿Listo para publicar tu trabajo?
                    </h2>
                    <p class="text-lg md:text-xl mb-10 text-blue-50/90 font-light leading-relaxed">
                        Únete a nuestra comunidad académica y comparte tu conocimiento con el mundo.
                    </p>
                    <div class="flex flex-wrap justify-center gap-4">
                        <a href="{{ route('contact') }}"
                           class="inline-block bg-white text-slate-900 px-10 py-4 text-lg font-bold rounded-xl hover:bg-blue-50 transition-all duration-300 shadow-xl hover:-translate-y-1 hover:scale-105">
                            Contactar Editor
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection
