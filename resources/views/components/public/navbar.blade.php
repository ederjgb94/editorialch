<nav class="sticky top-0 z-50 bg-white border-b border-gray-100 shadow-sm" x-data="{ open: false }">
    <div class="container mx-auto px-6 h-20 flex items-center justify-between">

        {{-- Logo --}}
        <div class="flex-shrink-0">
            <a href="{{ route('home') }}" class="flex items-center">
                <img src="{{ asset('images/joulaar-logo.png') }}"
                     alt="Joulaar Logo"
                     class="h-12 w-auto object-contain transition-transform hover:scale-105">
            </a>
        </div>

        {{-- Desktop Menu --}}
        <div class="hidden md:flex items-center gap-10">
            <ul class="flex items-center gap-8">
                <li>
                    <a href="{{ route('home') }}"
                       class="text-sm font-medium {{ request()->routeIs('home') ? 'text-slate-900 font-bold' : 'text-gray-600 hover:text-gray-900' }} transition-colors">
                        Inicio
                    </a>
                </li>
                <li>
                    <a href="{{ route('books.public.index') }}"
                       class="text-sm font-medium {{ request()->routeIs('books.public.*') ? 'text-slate-900 font-bold' : 'text-gray-600 hover:text-gray-900' }} transition-colors">
                        Catálogo
                    </a>
                </li>
                <li>
                    <a href="{{ route('contact') }}"
                       class="text-sm font-medium {{ request()->routeIs('contact') ? 'text-slate-900 font-bold' : 'text-gray-600 hover:text-gray-900' }} transition-colors">
                        Contacto
                    </a>
                </li>
            </ul>
            <a href="{{ route('contact') }}"
               class="bg-slate-900 text-white px-5 py-2 rounded-lg text-sm font-bold hover:bg-slate-800 transition-colors shadow-sm">
                Publicar
            </a>
        </div>

        {{-- Mobile Menu Button --}}
        <div class="md:hidden">
            <button @click="open = !open"
                    class="p-2 text-gray-600 hover:bg-gray-100 rounded-lg transition-colors"
                    aria-label="Abrir menú">
                <svg x-show="!open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
                <svg x-show="open" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>

    {{-- Mobile Menu Dropdown --}}
    <div x-show="open"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 -translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 -translate-y-2"
         class="md:hidden absolute top-20 left-0 w-full bg-white border-b border-gray-100 shadow-xl z-40">
        <ul class="flex flex-col p-6 gap-4">
            <li><a href="{{ route('home') }}"   class="text-lg font-medium text-gray-600 hover:text-black block py-2">Inicio</a></li>
            <li><a href="{{ route('books.public.index') }}" class="text-lg font-medium text-gray-600 hover:text-black block py-2">Catálogo</a></li>
            <li><a href="{{ route('contact') }}" class="text-lg font-medium text-gray-600 hover:text-black block py-2">Contacto</a></li>
            <li class="pt-2 border-t border-gray-100">
                <a href="{{ route('contact') }}" class="block bg-slate-900 text-white text-center py-3 rounded-lg font-bold">Publicar</a>
            </li>
        </ul>
    </div>
</nav>
