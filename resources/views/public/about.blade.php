@extends('layouts.public')

@section('title', 'Sobre Sagedi')
@section('meta_description', 'Conoce la misión, historia y equipo editorial de Sagedi, revista de acceso abierto para la investigación latinoamericana.')

@section('content')
<div class="container mx-auto px-4 py-12">
    <h1 class="text-4xl font-bold text-center mb-8">Sobre Editorial</h1>

    <div class="grid md:grid-cols-2 gap-12 mb-16">
        <div>
            <h2 class="text-2xl font-semibold mb-4">Nuestra Historia</h2>
            <p class="mb-4 text-gray-700 leading-relaxed">
                Fundada con la visión de publicar obras académicas que inspiran, educan y transforman vidas,
                Sagedi nació como un proyecto comprometido con la divulgación científica de calidad en América Latina.
            </p>
            <p class="text-gray-700 leading-relaxed">
                A lo largo de los años, hemos crecido hasta convertirnos en una editorial reconocida por la calidad
                de nuestras publicaciones y nuestro compromiso con autores emergentes y consagrados de la región.
            </p>
        </div>
        <div class="bg-gray-100 rounded-lg p-6">
            <h2 class="text-2xl font-semibold mb-4">Misión y Visión</h2>
            <p class="mb-4 text-gray-700">
                <strong>Misión:</strong> Difundir el conocimiento y la cultura a través de publicaciones de calidad
                que enriquezcan la vida de nuestros lectores y contribuyan al avance científico.
            </p>
            <p class="text-gray-700">
                <strong>Visión:</strong> Ser referentes en el mundo editorial latinoamericano por nuestra excelencia,
                innovación y compromiso con la promoción del acceso abierto al conocimiento.
            </p>
        </div>
    </div>

    <div class="mb-16">
        <h2 class="text-2xl font-semibold mb-6 text-center">Nuestro Equipo</h2>
        <div class="grid md:grid-cols-3 gap-8">
            @foreach([
                ['nombre' => 'Ana Martínez', 'cargo' => 'Directora Editorial'],
                ['nombre' => 'Carlos Ruiz',   'cargo' => 'Editor en Jefe'],
                ['nombre' => 'Elena Gómez',   'cargo' => 'Directora de Arte'],
            ] as $member)
            <div class="text-center">
                <div class="w-32 h-32 bg-gradient-to-br from-slate-200 to-slate-300 rounded-full mx-auto mb-4 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-14 w-14 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </div>
                <h3 class="font-semibold text-gray-900">{{ $member['nombre'] }}</h3>
                <p class="text-gray-600 text-sm">{{ $member['cargo'] }}</p>
            </div>
            @endforeach
        </div>
    </div>

    <div>
        <h2 class="text-2xl font-semibold mb-6 text-center">Nuestros Valores</h2>
        <div class="grid md:grid-cols-4 gap-6">
            @foreach([
                ['titulo' => 'Calidad',         'desc' => 'Nos comprometemos con la excelencia en cada publicación.'],
                ['titulo' => 'Innovación',       'desc' => 'Exploramos nuevos formatos y narrativas.'],
                ['titulo' => 'Diversidad',       'desc' => 'Promovemos voces diversas en la academia.'],
                ['titulo' => 'Sostenibilidad',   'desc' => 'Comprometidos con prácticas editoriales sostenibles.'],
            ] as $valor)
            <div class="p-4 border border-gray-200 rounded-lg text-center hover:border-blue-300 hover:shadow-sm transition-all duration-200">
                <h3 class="font-semibold mb-2 text-gray-900">{{ $valor['titulo'] }}</h3>
                <p class="text-sm text-gray-600">{{ $valor['desc'] }}</p>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
