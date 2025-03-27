@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Sección de Libros -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">
                            Gestión de Libros
                        </h3>
                        <div class="space-y-4">
                            <a href="{{ route('admin.books.index') }}" class="block p-4 border rounded-lg hover:bg-gray-50">
                                <div class="flex items-center">
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-gray-900">
                                            Administrar Catálogo
                                        </p>
                                        <p class="text-sm text-gray-500">
                                            Ver, crear, editar y eliminar libros
                                        </p>
                                    </div>
                                </div>
                            </a>
                            <a href="{{ route('admin.books.create') }}" class="block p-4 border rounded-lg hover:bg-gray-50">
                                <div class="flex items-center">
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-gray-900">
                                            Nuevo Libro
                                        </p>
                                        <p class="text-sm text-gray-500">
                                            Agregar una nueva publicación al catálogo
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Sección de Enlaces Rápidos -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-lg font-medium text-gray-900 mb-4">
                            Enlaces Rápidos
                        </h3>
                        <div class="space-y-4">
                            <a href="{{ route('profile.edit') }}" class="block p-4 border rounded-lg hover:bg-gray-50">
                                <div class="flex items-center">
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-gray-900">
                                            Mi Perfil
                                        </p>
                                        <p class="text-sm text-gray-500">
                                            Gestionar información de la cuenta
                                        </p>
                                    </div>
                                </div>
                            </a>
                            <a href="{{ route('books.index') }}" class="block p-4 border rounded-lg hover:bg-gray-50">
                                <div class="flex items-center">
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-gray-900">
                                            Ver Catálogo Público
                                        </p>
                                        <p class="text-sm text-gray-500">
                                            Visualizar el catálogo como lo ven los usuarios
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
