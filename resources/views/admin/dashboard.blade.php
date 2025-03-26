@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="mb-8">
        <h1 class="font-serif text-4xl font-bold text-gray-900 mb-2">Panel de Administración</h1>
        <p class="text-lg text-gray-600">Gestiona todos los aspectos del sistema</p>
    </div>

    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 mb-8">
        <!-- Estadísticas -->
        <div class="bg-white overflow-hidden shadow-sm rounded-lg">
            <div class="p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-2">Usuarios</h3>
                <p class="text-3xl font-bold text-[#013243]">{{ $stats['users'] }}</p>
                <p class="text-sm text-gray-500 mt-1">Usuarios registrados</p>
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow-sm rounded-lg">
            <div class="p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-2">Publicaciones</h3>
                <p class="text-3xl font-bold text-[#013243]">{{ $stats['books'] }}</p>
                <p class="text-sm text-gray-500 mt-1">Libros publicados</p>
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow-sm rounded-lg">
            <div class="p-6">
                <h3 class="text-lg font-medium text-gray-900 mb-2">Roles</h3>
                <p class="text-3xl font-bold text-[#013243]">{{ $stats['roles'] }}</p>
                <p class="text-sm text-gray-500 mt-1">Tipos de usuarios</p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
        <!-- Gestión de Usuarios -->
        <a href="{{ route('admin.users.index') }}" class="bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition-shadow duration-200">
            <div class="flex items-center">
                <div class="flex-shrink-0 bg-[#013243] rounded-md p-3">
                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-medium text-gray-900">Gestión de Usuarios</h3>
                    <p class="text-sm text-gray-500">Administra usuarios y roles</p>
                </div>
            </div>
        </a>

        <!-- Gestión de Publicaciones -->
        <a href="{{ route('admin.books.index') }}" class="bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition-shadow duration-200">
            <div class="flex items-center">
                <div class="flex-shrink-0 bg-[#013243] rounded-md p-3">
                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-medium text-gray-900">Gestión de Publicaciones</h3>
                    <p class="text-sm text-gray-500">Administra el catálogo de libros</p>
                </div>
            </div>
        </a>

        <!-- Configuración -->
        <a href="{{ route('profile.edit') }}" class="bg-white p-6 rounded-lg shadow-sm hover:shadow-md transition-shadow duration-200">
            <div class="flex items-center">
                <div class="flex-shrink-0 bg-[#013243] rounded-md p-3">
                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <h3 class="text-lg font-medium text-gray-900">Configuración</h3>
                    <p class="text-sm text-gray-500">Gestiona tu perfil y preferencias</p>
                </div>
            </div>
        </a>
    </div>
</div>
@endsection