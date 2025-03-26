@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mb-8 border-b border-gray-200 pb-6">
        <a href="{{ route('dashboard') }}" class="text-sm font-medium text-gray-600 hover:text-gray-900">
            ← Volver al Panel de Control
        </a>
        <h1 class="font-serif text-4xl font-bold text-gray-900 mb-2">Catálogo de Publicaciones</h1>
        <p class="text-lg text-gray-600">Publicaciones académicas y de investigación</p>
    </div>

    @if (session('success'))
        <div class="mb-4 rounded-md bg-green-50 p-4">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium text-green-800">{{ session('success') }}</p>
                </div>
            </div>
        </div>
    @endif

    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
        <div class="p-6 flex justify-between items-center border-b border-gray-200">
            <h2 class="text-xl font-serif font-bold text-gray-900">Publicaciones Disponibles</h2>
            <a href="{{ route('books.create') }}" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-[#013243] hover:bg-[#014357] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#013243]">
                Agregar Nueva Publicación
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Título</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ISBN</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fecha de Publicación</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Edición</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($books as $book)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">
                                <div class="text-sm font-medium text-gray-900">{{ $book->title }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm font-mono text-gray-600">{{ $book->isbn }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-600">{{ $book->publication_date }}</div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-600">{{ $book->edition }}</div>
                            </td>
                            <td class="px-6 py-4 text-sm font-medium space-x-2">
                                <a href="{{ route('books.show', $book) }}" class="inline-flex items-center px-2.5 py-1.5 border border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#013243]">
                                    Ver
                                </a>
                                <a href="{{ route('books.edit', $book) }}" class="inline-flex items-center px-2.5 py-1.5 border border-gray-300 shadow-sm text-xs font-medium rounded text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#013243]">
                                    Editar
                                </a>
                                <form action="{{ route('books.destroy', $book) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('¿Está seguro de eliminar esta publicación?')" class="inline-flex items-center px-2.5 py-1.5 border border-red-300 shadow-sm text-xs font-medium rounded text-red-700 bg-white hover:bg-red-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="px-6 py-4 border-t border-gray-200">
            {{ $books->links() }}
        </div>
    </div>
</div>
@endsection