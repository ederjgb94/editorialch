<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administrativo - Editorial</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <nav class="bg-gray-800 w-64 min-h-screen px-4 py-6">
            <div class="flex items-center justify-center mb-8">
                <h1 class="text-white text-2xl font-bold">Editorial CMS</h1>
            </div>
            <ul class="space-y-2">
                <li>
                    <a href="{{ route('dashboard') }}" class="flex items-center text-gray-300 hover:text-white py-2 px-4 rounded hover:bg-gray-700">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9.707 14.707a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 1.414L7.414 9H15a1 1 0 110 2H7.414l2.293 2.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                        </svg>
                        Volver al Panel Principal
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="text-gray-300 hover:text-white block py-2 px-4 rounded {{ request()->routeIs('admin.dashboard') ? 'bg-gray-900' : '' }}">
                        <div class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                            Resumen
                        </div>
                    </a>
                </li>
                <!-- Sección de Libros -->
                <li class="mt-4">
                    <span class="text-gray-400 text-sm font-medium px-4">LIBROS</span>
                    <ul class="mt-2 space-y-1">
                        <li>
                            <a href="{{ route('admin.books.index') }}" class="text-gray-300 hover:text-white block py-2 px-4 rounded {{ request()->routeIs('admin.books.index') ? 'bg-gray-900' : '' }}">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16" />
                                    </svg>
                                    Ver Catálogo
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.books.create') }}" class="text-gray-300 hover:text-white block py-2 px-4 rounded {{ request()->routeIs('admin.books.create') ? 'bg-gray-900' : '' }}">
                                <div class="flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                    </svg>
                                    Nuevo Libro
                                </div>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>

        <!-- Content -->
        <div class="flex-1">
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                        @yield('header')
                    </h2>
                </div>
            </header>

            <main class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
                @if(session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>