@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mb-8 border-b border-gray-200 pb-6">
        <h1 class="font-serif text-4xl font-bold text-gray-900 mb-2">Nueva Publicación</h1>
        <p class="text-lg text-gray-600">Registro de nueva publicación académica</p>
    </div>

    <div class="bg-white rounded-lg shadow-sm border border-gray-200">
        <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 p-6">
            @csrf
            
            <div class="space-y-4">
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700">Título de la Publicación</label>
                    <input type="text" name="title" id="title" required
                           class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-[#013243] focus:border-[#013243] sm:text-sm">
                </div>

                <div>
                    <label for="authors" class="block text-sm font-medium text-gray-700">Autores</label>
                    <input type="text" name="authors" id="authors" 
                           class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-[#013243] focus:border-[#013243] sm:text-sm"
                           placeholder="Ej: Juan Pérez, Ana Gómez">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="isbn" class="block text-sm font-medium text-gray-700">ISBN</label>
                        <input type="text" name="isbn" id="isbn" required maxlength="20"
                               class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 font-mono focus:outline-none focus:ring-[#013243] focus:border-[#013243] sm:text-sm">
                    </div>
                    <div>
                        <label for="publication_date" class="block text-sm font-medium text-gray-700">Fecha de Publicación</label>
                        <input type="date" name="publication_date" id="publication_date" required
                               class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-[#013243] focus:border-[#013243] sm:text-sm">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="edition" class="block text-sm font-medium text-gray-700">Edición</label>
                        <input type="text" name="edition" id="edition" required maxlength="50"
                               class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-[#013243] focus:border-[#013243] sm:text-sm">
                    </div>
                    <div>
                        <label for="partner" class="block text-sm font-medium text-gray-700">Editorial Asociada</label>
                        <input type="text" name="partner" id="partner" required
                               class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-[#013243] focus:border-[#013243] sm:text-sm">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="volume" class="block text-sm font-medium text-gray-700">Volumen</label>
                        <input type="number" name="volume" id="volume" min="1"
                               class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-[#013243] focus:border-[#013243] sm:text-sm">
                    </div>
                    <div>
                        <label for="pages" class="block text-sm font-medium text-gray-700">Número de Páginas</label>
                        <input type="number" name="pages" id="pages" min="1"
                               class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-[#013243] focus:border-[#013243] sm:text-sm">
                    </div>
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Descripción</label>
                    <textarea name="description" id="description" rows="4"
                              class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-[#013243] focus:border-[#013243] sm:text-sm"></textarea>
                </div>

                <div>
                    <label for="cover" class="block text-sm font-medium text-gray-700">URL de la Portada</label>
                    <input type="url" name="cover" id="cover"
                           class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-[#013243] focus:border-[#013243] sm:text-sm">
                </div>

                <div>
                    <label for="pdf_file" class="block text-sm font-medium text-gray-700">PDF del Libro</label>
                    <input type="file" name="pdf_file" id="pdf_file" accept="application/pdf"
                           class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-[#013243] focus:border-[#013243] sm:text-sm">
                    <p class="mt-1 text-sm text-gray-500">El archivo PDF se nombrará automáticamente con el ISBN del libro</p>
                </div>
            </div>

            <div class="flex items-center justify-between pt-4 border-t border-gray-200">
                <a href="{{ route('books.index') }}" 
                   class="text-sm font-medium text-gray-600 hover:text-gray-900">
                    ← Volver al Catálogo
                </a>
                <button type="submit" 
                        class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-[#013243] hover:bg-[#014357] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#013243]">
                    Publicar
                </button>
            </div>
        </form>
    </div>
</div>
@endsection