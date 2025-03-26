@csrf

<div class="space-y-4">
    <div>
        <label for="title" class="block text-sm font-medium text-gray-700">Título</label>
        <input type="text" name="title" id="title" value="{{ old('title', $book->title ?? '') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
    </div>

    <div>
        <label for="isbn" class="block text-sm font-medium text-gray-700">ISBN</label>
        <input type="text" name="isbn" id="isbn" value="{{ old('isbn', $book->isbn ?? '') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
    </div>

    <div>
        <label for="publication_date" class="block text-sm font-medium text-gray-700">Fecha de Publicación</label>
        <input type="date" name="publication_date" id="publication_date" value="{{ old('publication_date', $book->publication_date ?? '') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
    </div>

    <div>
        <label for="edition" class="block text-sm font-medium text-gray-700">Edición</label>
        <input type="text" name="edition" id="edition" value="{{ old('edition', $book->edition ?? '') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
    </div>

    <div>
        <label for="partner" class="block text-sm font-medium text-gray-700">Editorial</label>
        <input type="text" name="partner" id="partner" value="{{ old('partner', $book->partner ?? '') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500" required>
    </div>

    <div>
        <label for="volume" class="block text-sm font-medium text-gray-700">Volumen</label>
        <input type="number" name="volume" id="volume" value="{{ old('volume', $book->volume ?? '') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
    </div>

    <div>
        <label for="pages" class="block text-sm font-medium text-gray-700">Número de Páginas</label>
        <input type="number" name="pages" id="pages" value="{{ old('pages', $book->pages ?? '') }}" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
    </div>

    <div>
        <label for="description" class="block text-sm font-medium text-gray-700">Descripción</label>
        <textarea name="description" id="description" rows="4" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('description', $book->description ?? '') }}</textarea>
    </div>

    <div>
        <label for="cover" class="block text-sm font-medium text-gray-700">Portada</label>
        <input type="file" name="cover" id="cover" accept="image/*" class="mt-1 block w-full">
        @if(isset($book) && $book->cover)
            <div class="mt-2">
                <img src="{{ asset('storage/' . $book->cover) }}" alt="Portada actual" class="h-32 w-auto">
            </div>
        @endif
    </div>

    <div class="flex justify-end space-x-3">
        <a href="{{ route('admin.books.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50">
            Cancelar
        </a>
        <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700">
            {{ isset($book) ? 'Actualizar' : 'Crear' }}
        </button>
    </div>
</div>