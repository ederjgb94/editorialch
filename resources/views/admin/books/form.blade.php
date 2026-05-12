@csrf

<div class="space-y-8">
    {{-- Información del Libro --}}
    <div>
        <h3 class="text-lg font-medium text-gray-900 mb-1">Información del Libro</h3>
        <p class="text-sm text-gray-500 mb-4">Los campos marcados con <span class="text-red-500">*</span> son
            obligatorios.</p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="md:col-span-2">
                <label for="title" class="block text-sm font-medium text-gray-700">Título <span
                        class="text-red-500">*</span></label>
                <input type="text" name="title" id="title" value="{{ old('title', $book->title ?? '') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#013243] focus:ring-[#013243]"
                    required>
                @error('title')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="md:col-span-2">
                <label for="authors" class="block text-sm font-medium text-gray-700">Autores</label>
                <input type="text" name="authors" id="authors" value="{{ old('authors', $book->authors ?? '') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#013243] focus:ring-[#013243]"
                    placeholder="Ej: Juan Pérez, Ana Gómez">
                <p class="mt-1 text-xs text-gray-400">Separa los nombres con comas si hay más de un autor.</p>
                @error('authors')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="isbn" class="block text-sm font-medium text-gray-700">ISBN <span
                        class="text-red-500">*</span></label>
                <input type="text" name="isbn" id="isbn" value="{{ old('isbn', $book->isbn ?? '') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#013243] focus:ring-[#013243]"
                    placeholder="978-3-16-148410-0" required>
                @error('isbn')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="publication_date" class="block text-sm font-medium text-gray-700">Fecha de Publicación <span
                        class="text-red-500">*</span></label>
                <input type="date" name="publication_date" id="publication_date"
                    value="{{ old('publication_date', $book->publication_date ?? '') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#013243] focus:ring-[#013243]"
                    required>
                @error('publication_date')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="edition" class="block text-sm font-medium text-gray-700">Edición <span
                        class="text-red-500">*</span></label>
                <input type="text" name="edition" id="edition" value="{{ old('edition', $book->edition ?? '') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#013243] focus:ring-[#013243]"
                    placeholder="Primera edición" required>
                @error('edition')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="partner" class="block text-sm font-medium text-gray-700">Editorial <span
                        class="text-red-500">*</span></label>
                <input type="text" name="partner" id="partner" value="{{ old('partner', $book->partner ?? '') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#013243] focus:ring-[#013243]"
                    required>
                @error('partner')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>

    {{-- Detalles Adicionales --}}
    <div class="border-t border-gray-200 pt-8">
        <h3 class="text-lg font-medium text-gray-900 mb-1">Detalles Adicionales</h3>
        <p class="text-sm text-gray-500 mb-4">Información complementaria de la publicación.</p>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="volume" class="block text-sm font-medium text-gray-700">Volumen</label>
                <input type="number" name="volume" id="volume" value="{{ old('volume', $book->volume ?? '') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#013243] focus:ring-[#013243]"
                    min="1">
                @error('volume')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="pages" class="block text-sm font-medium text-gray-700">Número de Páginas</label>
                <input type="number" name="pages" id="pages" value="{{ old('pages', $book->pages ?? '') }}"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#013243] focus:ring-[#013243]"
                    min="1">
                @error('pages')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="md:col-span-2">
                <label for="description" class="block text-sm font-medium text-gray-700">Descripción</label>
                <textarea name="description" id="description" rows="4"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#013243] focus:ring-[#013243]"
                    placeholder="Breve descripción del contenido del libro...">{{ old('description', $book->description ?? '') }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>

    {{-- Archivos --}}
    <div class="border-t border-gray-200 pt-8">
        <h3 class="text-lg font-medium text-gray-900 mb-1">Archivos</h3>
        <p class="text-sm text-gray-500 mb-5">Adjunta los documentos e imágenes del libro.</p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            {{-- Portada PDF --}}
            <div class="rounded-lg border border-gray-200 p-4 bg-gray-50/50">
                <div class="flex items-center gap-2 mb-3">
                    <span class="inline-flex items-center justify-center h-8 w-8 rounded-md bg-red-100">
                        <svg class="h-4 w-4 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                        </svg>
                    </span>
                    <div>
                        <p class="text-sm font-medium text-gray-900">Portada</p>
                        <p class="text-xs text-gray-500">PDF de presentación</p>
                    </div>
                </div>
                @if(isset($book) && $book->cover)
                    <a href="{{ asset('storage/' . $book->cover) }}" target="_blank"
                        class="inline-flex items-center text-xs text-[#013243] hover:underline font-medium mb-2">
                        <svg class="h-3.5 w-3.5 mr-1 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Archivo cargado — ver ↗
                    </a>
                @endif
                <input type="file" name="cover" id="cover" accept="application/pdf"
                    class="block w-full text-xs text-gray-600 file:mr-3 file:py-1.5 file:px-3 file:rounded-md file:border file:border-gray-300 file:text-xs file:font-medium file:bg-white file:text-gray-700 hover:file:bg-gray-100 file:cursor-pointer cursor-pointer">
                <p class="mt-1.5 text-xs text-gray-400">PDF, máx. 10MB</p>
                @error('cover')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- Imagen Web --}}
            <div class="rounded-lg border border-gray-200 p-4 bg-gray-50/50">
                <div class="flex items-center gap-2 mb-3">
                    <span class="inline-flex items-center justify-center h-8 w-8 rounded-md bg-blue-100">
                        <svg class="h-4 w-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </span>
                    <div>
                        <p class="text-sm font-medium text-gray-900">Imagen Web</p>
                        <p class="text-xs text-gray-500">Se mostrará en el sitio</p>
                    </div>
                </div>
                @if(isset($book) && $book->image)
                    <a href="{{ asset('storage/' . $book->image) }}" target="_blank" title="Ver imagen completa">
                        <img src="{{ asset('storage/' . $book->image) }}" alt="Imagen actual"
                            class="h-16 w-auto rounded border border-gray-200 mb-2 hover:opacity-75 transition-opacity cursor-pointer">
                    </a>
                @endif
                <input type="file" name="image" id="image" accept="image/*"
                    class="block w-full text-xs text-gray-600 file:mr-3 file:py-1.5 file:px-3 file:rounded-md file:border file:border-gray-300 file:text-xs file:font-medium file:bg-white file:text-gray-700 hover:file:bg-gray-100 file:cursor-pointer cursor-pointer">
                <p class="mt-1.5 text-xs text-gray-400">PNG o JPG, máx. 2MB</p>
                @error('image')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            {{-- PDF Libro --}}
            <div class="rounded-lg border border-gray-200 p-4 bg-gray-50/50">
                <div class="flex items-center gap-2 mb-3">
                    <span class="inline-flex items-center justify-center h-8 w-8 rounded-md bg-emerald-100">
                        <svg class="h-4 w-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                        </svg>
                    </span>
                    <div>
                        <p class="text-sm font-medium text-gray-900">PDF del Libro</p>
                        <p class="text-xs text-gray-500">Contenido completo</p>
                    </div>
                </div>
                @if(isset($book) && $book->pdf_path)
                    <a href="{{ asset('storage/' . $book->pdf_path) }}" target="_blank"
                        class="inline-flex items-center text-xs text-[#013243] hover:underline font-medium mb-2">
                        <svg class="h-3.5 w-3.5 mr-1 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        Archivo cargado — ver ↗
                    </a>
                @endif
                <input type="file" name="pdf_file" id="pdf_file" accept="application/pdf"
                    class="block w-full text-xs text-gray-600 file:mr-3 file:py-1.5 file:px-3 file:rounded-md file:border file:border-gray-300 file:text-xs file:font-medium file:bg-white file:text-gray-700 hover:file:bg-gray-100 file:cursor-pointer cursor-pointer">
                <p class="mt-1.5 text-xs text-gray-400">PDF, máx. 10MB</p>
                @error('pdf_file')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>
    </div>

    {{-- Acciones --}}
    <div class="border-t border-gray-200 pt-6 flex justify-end space-x-3">
        <a href="{{ route('admin.books.index') }}"
            class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#013243]">
            Cancelar
        </a>
        <button type="submit"
            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-[#013243] hover:bg-[#013243]/90 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#013243]">
            {{ isset($book) ? 'Actualizar Libro' : 'Crear Libro' }}
        </button>
    </div>
</div>