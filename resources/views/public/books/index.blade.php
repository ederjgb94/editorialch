@extends('layouts.public')

@section('title', 'Catálogo de Libros')
@section('meta_description', 'Explora el catálogo completo de publicaciones académicas de acceso abierto de Sagedi.')

@section('content')

<div class="bg-gray-50 min-h-screen">

    {{-- Page Header --}}
    <div class="bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-6 py-10">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-2">Catálogo de Libros</h1>
            <p class="text-gray-500">Publicaciones académicas de acceso abierto</p>
        </div>
    </div>

    {{-- Search Bar --}}
    <div class="max-w-7xl mx-auto px-6 pt-8">
        <form id="searchForm" class="relative max-w-xl" onsubmit="return false;">
            <input
                type="text"
                id="searchBooks"
                placeholder="Buscar por título, autor..."
                value="{{ request('q') }}"
                class="w-full pl-12 pr-4 py-3 rounded-xl border border-gray-200 bg-white shadow-sm focus:outline-none focus:ring-2 focus:ring-slate-400 focus:border-transparent text-gray-700 placeholder-gray-400 transition"
            >
            <svg class="absolute left-4 top-1/2 -translate-y-1/2 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
            </svg>
        </form>
    </div>

    {{-- Books Container --}}
    <div id="booksContainer" class="max-w-7xl mx-auto px-6 py-8">

        {{-- Estado vacío inicial (sin búsqueda y sin libros) --}}
        @if($books->isEmpty())
        <div id="emptyBooks" class="text-center py-20">
            <svg class="mx-auto h-16 w-16 text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
            </svg>
            <p class="text-gray-500 text-lg">No se encontraron libros disponibles.</p>
        </div>
        @else

        {{-- Grid (primer render SSR — sin spinner) --}}
        <div id="booksGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach($books as $book)
            @php
                $rawCover = $book->cover ?? $book->image ?? null;
                $coverUrl = $rawCover
                    ? (str_starts_with($rawCover, 'http') ? $rawCover : asset('storage/' . $rawCover))
                    : asset('book-placeholder.webp');
                $author = $book->partner ?? $book->authors ?? 'Autor desconocido';
            @endphp
            <a href="{{ route('books.public.show', $book) }}"
               class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow flex flex-col h-full group cursor-pointer">
                <div class="relative pt-[120%] overflow-hidden bg-gray-200">
                    <img src="{{ $coverUrl }}"
                         alt="Portada de {{ $book->title }}"
                         class="absolute top-0 left-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                         onerror="this.onerror=null;this.src='{{ asset('book-placeholder.webp') }}'">
                </div>
                <div class="p-4 flex-grow flex flex-col">
                    <h3 class="font-bold text-lg mb-2 text-gray-800 line-clamp-2">{{ $book->title }}</h3>
                    <p class="text-sm text-gray-600 mb-2">Autor: {{ $author }}</p>
                    <div class="flex justify-end mt-auto pt-2 overflow-hidden">
                        <span class="text-sm text-gray-500 font-medium flex items-center gap-1 opacity-0 group-hover:opacity-100 transform translate-x-4 group-hover:translate-x-0 transition-all duration-300">
                            Ver detalle
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                        </span>
                    </div>
                </div>
            </a>
            @endforeach
        </div>

        {{-- Infinite Scroll: solo activo si hay más páginas --}}
        @if($books->hasMorePages())
        <div id="infiniteScrollSentinel" class="flex flex-col items-center justify-center mt-10 mb-10">
            <div id="loadingMoreBooks" class="hidden flex-col items-center">
                <div class="w-10 h-10 border-t-4 border-b-4 border-gray-700 rounded-full animate-spin mb-2"></div>
                <p class="text-gray-600 text-sm">Cargando más libros...</p>
            </div>
        </div>
        @else
        <p class="text-center text-gray-400 text-sm mt-10 mb-6">
            — {{ $books->total() }} {{ $books->total() === 1 ? 'publicación' : 'publicaciones' }} en total —
        </p>
        @endif

        @endif

        {{-- Estado vacío cuando la búsqueda no da resultados --}}
        <div id="emptySearchResult" class="text-center py-16 hidden">
            <p class="text-gray-500 text-lg">No se encontraron libros para tu búsqueda.</p>
        </div>

    </div>
</div>

@endsection

@push('scripts')
<script>
    const BASE_URL    = '{{ url('/') }}';
    const BOOKS_API   = BASE_URL + '/libros';
    const PLACEHOLDER = BASE_URL + '/book-placeholder.webp';

    let currentPage  = {{ $books->currentPage() }};
    let lastPage     = {{ $books->lastPage() }};
    let isLoading    = false;
    let observer     = null;
    let searchTimer  = null;

    const grid          = document.getElementById('booksGrid');
    const sentinel      = document.getElementById('infiniteScrollSentinel');
    const loadingMore   = document.getElementById('loadingMoreBooks');
    const emptySearch   = document.getElementById('emptySearchResult');
    const searchInput   = document.getElementById('searchBooks');

    // ── Infinite scroll (solo si hay más páginas) ───────────────────────────
    if (sentinel) {
        observer = new IntersectionObserver((entries) => {
            if (entries[0].isIntersecting && !isLoading && currentPage < lastPage) {
                loadNextPage();
            }
        }, { rootMargin: '300px' });
        observer.observe(sentinel);
    }

    async function loadNextPage() {
        if (isLoading || currentPage >= lastPage) return;
        isLoading = true;
        loadingMore && loadingMore.classList.replace('hidden', 'flex');

        try {
            const params = new URLSearchParams({ page: currentPage + 1 });
            const q = new URLSearchParams(window.location.search).get('q');
            if (q) params.set('q', q);

            const res  = await fetch(`${BOOKS_API}?${params}`, {
                headers: { 'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest' }
            });
            if (!res.ok) throw new Error('HTTP ' + res.status);

            const data = await res.json();
            currentPage = data.current_page;
            lastPage    = data.last_page;

            appendBooks(data.data);

            if (currentPage >= lastPage && sentinel) {
                observer && observer.disconnect();
                sentinel.innerHTML = `<p class="text-gray-400 text-sm">— ${data.total} publicaciones en total —</p>`;
            }
        } catch (e) {
            console.error('Error cargando más libros:', e);
        } finally {
            isLoading = false;
            loadingMore && loadingMore.classList.replace('flex', 'hidden');
        }
    }

    function appendBooks(books) {
        if (!grid) return;
        books.forEach(book => {
            let coverUrl = PLACEHOLDER;
            const raw = book.cover || book.image || null;
            if (raw) coverUrl = raw.startsWith('http') ? raw : BASE_URL + '/storage/' + raw;

            const author = book.partner || book.authors || 'Autor desconocido';
            const el = document.createElement('a');
            el.href      = `${BASE_URL}/libros/${book.id}`;
            el.className = 'bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow flex flex-col h-full group cursor-pointer';
            el.innerHTML = `
                <div class="relative pt-[120%] overflow-hidden bg-gray-200">
                    <img src="${coverUrl}" alt="Portada de ${book.title}"
                         class="absolute top-0 left-0 w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
                         onerror="this.onerror=null;this.src='${PLACEHOLDER}'">
                </div>
                <div class="p-4 flex-grow flex flex-col">
                    <h3 class="font-bold text-lg mb-2 text-gray-800 line-clamp-2">${book.title}</h3>
                    <p class="text-sm text-gray-600 mb-2">Autor: ${author}</p>
                    <div class="flex justify-end mt-auto pt-2 overflow-hidden">
                        <span class="text-sm text-gray-500 font-medium flex items-center gap-1 opacity-0 group-hover:opacity-100 transform translate-x-4 group-hover:translate-x-0 transition-all duration-300">
                            Ver detalle
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14"/><path d="m12 5 7 7-7 7"/></svg>
                        </span>
                    </div>
                </div>`;
            grid.appendChild(el);
        });
    }

    // ── Búsqueda con debounce (recarga la página con query param) ──────────
    searchInput && searchInput.addEventListener('input', (e) => {
        clearTimeout(searchTimer);
        searchTimer = setTimeout(() => {
            const q   = e.target.value.trim();
            const url = new URL(window.location.href);
            q ? url.searchParams.set('q', q) : url.searchParams.delete('q');
            url.searchParams.delete('page');
            window.location.href = url.toString();
        }, 500);
    });
</script>
@endpush
