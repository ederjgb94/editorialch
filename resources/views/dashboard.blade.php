@extends('layouts.app')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(auth()->user()->roles->isEmpty())
                <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4 mb-6">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-yellow-700">
                                Necesitas tener un rol asignado para acceder al panel de control completo.
                                Por favor, contacta con un administrador.
                            </p>
                        </div>
                    </div>
                </div>
            @endif

            @if(!auth()->user()->roles->isEmpty())
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @if(auth()->user()->hasRole('admin'))
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
                    @endif

                    <!-- Sección de Solicitudes de Publicación -->
                    @if(auth()->user()->hasRole('asociado-autor'))
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">
                                Solicitudes de Publicación
                            </h3>
                            <div class="space-y-4">
                                <a href="{{ route('submissions.index') }}" class="block p-4 border rounded-lg hover:bg-gray-50">
                                    <div class="flex items-center">
                                        <div class="ml-3">
                                            <p class="text-sm font-medium text-gray-900">
                                                Mis Solicitudes
                                            </p>
                                            <p class="text-sm text-gray-500">
                                                Ver el estado de tus solicitudes de publicación
                                            </p>
                                        </div>
                                    </div>
                                </a>
                                <a href="{{ route('submissions.create') }}" class="block p-4 border rounded-lg hover:bg-gray-50">
                                    <div class="flex items-center">
                                        <div class="ml-3">
                                            <p class="text-sm font-medium text-gray-900">
                                                Nueva Solicitud
                                            </p>
                                            <p class="text-sm text-gray-500">
                                                Enviar una nueva solicitud de publicación
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Sección de Seguimiento a Solicitudes para Editor -->
                    @if(auth()->user()->hasRole('asociado-editor'))
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">
                                Seguimiento a Solicitudes
                            </h3>
                            <div class="space-y-4">
                                <a href="{{ route('editor.submissions.index') }}" class="block p-4 border rounded-lg hover:bg-gray-50">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <svg class="h-6 w-6 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                            </svg>
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm font-medium text-gray-900">
                                                Asignar Árbitros
                                            </p>
                                            <p class="text-sm text-gray-500">
                                                Gestionar asignación de árbitros a solicitudes pendientes
                                            </p>
                                        </div>
                                    </div>
                                </a>
                                <a href="{{ route('editor.progress.index') }}" class="block p-4 border rounded-lg hover:bg-gray-50">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <svg class="h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm font-medium text-gray-900">
                                                Observar Actualizaciones
                                            </p>
                                            <p class="text-sm text-gray-500">
                                                Revisar actualizaciones y avances de solicitudes en proceso
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endif

                    <!-- Sección de Evaluación para Árbitros -->
                    @if(auth()->user()->hasRole('asociado-arbitro'))
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6">
                            <h3 class="text-lg font-medium text-gray-900 mb-4">
                                Evaluación
                            </h3>
                            <div class="space-y-4">
                                <a href="{{ route('arbitro.submissions') }}" class="block p-4 border rounded-lg hover:bg-gray-50">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0">
                                            <svg class="h-6 w-6 text-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                                            </svg>
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm font-medium text-gray-900">
                                                Mis Solicitudes Asignadas
                                            </p>
                                            <p class="text-sm text-gray-500">
                                                Ver y evaluar las solicitudes asignadas para revisión
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endif

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
            @endif
        </div>
    </div>
@endsection
