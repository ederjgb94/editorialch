<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Joulaar') | Journal of Latin American Academic Research</title>
    <meta name="description" content="@yield('meta_description', 'Joulaar — Editorial de acceso abierto totalmente en línea. Journal of Latin American Academic Research (ISSN 2572-0619).')">

    <!-- Scripts y Estilos -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('head')
</head>
<body class="flex flex-col min-h-screen font-sans antialiased bg-white text-gray-900">

    {{-- Navbar --}}
    @include('components.public.navbar')

    {{-- Contenido Principal --}}
    <main class="flex-1">
        @yield('content')
    </main>

    {{-- Footer --}}
    @include('components.public.footer')

    @stack('scripts')
</body>
</html>
