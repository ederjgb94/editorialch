@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mb-8 border-b border-gray-200 pb-6">
            <a href="{{ route('admin.books.index') }}" class="text-sm font-medium text-gray-600 hover:text-gray-900">
                ← Volver al Catálogo
            </a>
            <h1 class="font-serif text-4xl font-bold text-gray-900 mb-2">Crear Nuevo Libro</h1>
            <p class="text-lg text-gray-600">Agrega una nueva publicación al catálogo</p>
        </div>

        <div class="bg-white rounded-lg shadow-sm border border-gray-200">
            <form action="{{ route('admin.books.store') }}" method="POST" enctype="multipart/form-data" class="p-6">
                @include('admin.books.form')
            </form>
        </div>
    </div>
@endsection