<footer class="bg-slate-50 border-t border-slate-200 pt-16 pb-12 mt-12">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">

            {{-- Brand & Description --}}
            <div class="lg:col-span-2">
                <aside class="flex items-center gap-3 mb-6">
                    <img src="{{ asset('images/sagedi-logo.png') }}" alt="Sagedi Logo" class="h-10 w-auto object-contain">
                    <strong class="text-2xl font-bold text-slate-900 tracking-tight">Sagedi</strong>
                </aside>
                <p class="text-slate-500 max-w-md leading-relaxed text-sm md:text-base">
                    Plataforma dedicada a la excelencia académica, facilitando el acceso a investigaciones de alto impacto y proporcionando herramientas robustas para la comunidad científica y editorial.
                </p>
            </div>

            {{-- Navigation --}}
            <div>
                <h3 class="text-xs font-bold text-slate-900 uppercase tracking-[0.2em] mb-6">Navegación</h3>
                <nav class="flex flex-col gap-4 text-slate-600 text-sm font-medium">
                    <a href="{{ route('home') }}"               class="hover:text-blue-600 transition-colors duration-200">Inicio</a>
                    <a href="{{ route('books.public.index') }}" class="hover:text-blue-600 transition-colors duration-200">Catálogo de Libros</a>
                    <a href="{{ route('contact') }}"            class="hover:text-blue-600 transition-colors duration-200">Contacto Directo</a>
                </nav>
            </div>

            {{-- Info --}}
            <div>
                <h3 class="text-xs font-bold text-slate-900 uppercase tracking-[0.2em] mb-6">Editorial</h3>
                <p class="text-slate-500 leading-relaxed text-sm">
                    Editorial de acceso abierto totalmente en línea.
                </p>
            </div>
        </div>

        <div class="mt-16 pt-8 border-t border-slate-200 flex flex-col md:flex-row justify-between items-center gap-4 text-xs font-semibold text-slate-400 uppercase tracking-widest text-center md:text-left">
            <p>© {{ date('Y') }} Sagedi. Todos los derechos reservados.</p>
        </div>
    </div>
</footer>
