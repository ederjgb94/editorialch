@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="mb-6">
                    <h2 class="text-2xl font-semibold text-gray-800">Nueva Solicitud de Publicación</h2>
                    <p class="mt-1 text-sm text-gray-600">
                        Por favor, completa todos los campos requeridos para enviar tu solicitud de publicación.
                    </p>
                </div>

                <form action="{{ route('submissions.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700">
                            Título del Libro
                        </label>
                        <input type="text" 
                               name="title" 
                               id="title" 
                               value="{{ old('title') }}"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                               required>
                        @error('title')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700">
                            Descripción
                        </label>
                        <textarea name="description" 
                                  id="description" 
                                  rows="4"
                                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                  required>{{ old('description') }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="manuscript" class="block text-sm font-medium text-gray-700">
                            Manuscrito (PDF, DOC, DOCX - Máx. 10MB)
                        </label>
                        <input type="file" 
                               name="manuscript" 
                               id="manuscript"
                               accept=".pdf,.doc,.docx"
                               class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100"
                               required>
                        @error('manuscript')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center justify-end space-x-3">
                        <a href="{{ route('submissions.index') }}" 
                           class="inline-flex justify-center rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            Cancelar
                        </a>
                        <button type="submit"
                                class="inline-flex justify-center rounded-md border border-gray-300 bg-[#013243] py-2 px-4 text-sm font-medium text-gray-300 shadow-sm bg-gray focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                            Enviar Solicitud
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
