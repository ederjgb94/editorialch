<template>
    <!-- Búsqueda de libros -->
    <div class="max-w-3xl mx-auto mb-8">
        <div class="bg-white rounded-lg shadow-lg p-1">
            <form class="flex flex-col sm:flex-row" @submit.prevent="handleSearch" id="searchForm">
                <div class="flex-grow relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <input type="text" v-model="searchQuery"
                        class="block w-full pl-10 pr-3 py-3 border-0 text-gray-900 placeholder-gray-500 focus:ring-0 focus:outline-none sm:text-sm"
                        placeholder="Buscar libros, autores, temas..." />
                </div>
                <div class="mt-2 sm:mt-0 sm:ml-2">
                    <select v-model="searchCategory"
                        class="block w-full sm:w-auto py-3 px-4 border-0 bg-gray-50 text-gray-500 focus:ring-0 focus:outline-none sm:text-sm rounded-md">
                        <option value="title">Nombre</option>
                        <option value="partner">Autores</option>
                        <option value="publication_date">Año</option>
                    </select>
                </div>
                <div class="mt-2 sm:mt-0 sm:ml-2">
                    <button type="submit"
                        class="w-full sm:w-auto flex justify-center py-3 px-6 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-700 hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Buscar
                    </button>
                </div>
            </form>
            <div class="px-3 py-2 border-t border-gray-100 text-xs text-gray-500 flex justify-between">
                <div>
                    <span class="font-medium">Búsqueda Avanzada</span> • <span>Operadores Booleanos</span>
                </div>
                <!-- <div>
                    <a href="#" class="text-blue-600 hover:underline">Consejos de Búsqueda</a>
                </div> -->
            </div>
        </div>
    </div>

    <!-- Mensaje de error -->
    <div v-if="error" class="w-full max-w-3xl mx-auto mb-8 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg flex items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <div>
            <p class="font-bold">Error</p>
            <p>{{ error }}</p>
        </div>
        <button @click="retryLoading" class="ml-auto bg-red-200 hover:bg-red-300 text-red-800 px-4 py-2 rounded-lg">
            Reintentar
        </button>
    </div>

    <!-- Indicador de carga -->
    <div v-if="isLoading" class="w-full flex flex-col items-center justify-center py-12">
        <div class="animate-spin rounded-full h-16 w-16 border-t-2 border-b-2 border-principal mb-4"></div>
        <p class="text-gray-600">Cargando libros...</p>
    </div>

    <!-- Listado de libros (solo se mostrará si no está cargando y no hay errores) -->
    <div v-if="!isLoading && !error && books.length > 0" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        <div v-for="book in books" :key="book.id"
            class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow flex flex-col h-full">
            <div class="flex-grow relative" style="aspect-ratio: 2/3;">
                <img v-if="book.cover && book.cover.trim() !== ''" :src="book.cover" :alt="`Portada de ${book.title}`"
                    class="w-full h-full object-cover" @error="handleImageError($event, book.id)" />
                <div v-else :style="getRandomBookCover(book.id)"
                    class="w-full h-full flex items-center justify-center p-4 text-center">
                    <span class="text-white font-bold text-lg rotate-[-30deg]">{{ book.title }}</span>
                </div>
                <!-- Contenedor de color que se muestra cuando la imagen falla -->
                <div v-show="failedImages.includes(book.id)" :style="getRandomBookCover(book.id)"
                    class="w-full h-full absolute top-0 left-0 flex items-center justify-center p-4 text-center">
                    <span class="text-white font-bold text-lg rotate-[-30deg]">{{ book.title }}</span>
                </div>
            </div>
            <div class="p-4">
                <h3 class="font-bold text-sm mb-2 text-gray-800">
                    {{ book.title }}
                </h3>
                <!-- <p class="text-sm text-gray-600 mb-2">
                    {{ book.author || 'Autor desconocido' }}
                </p> -->
                <div class="flex justify-end">
                    <a :href="`/book/${book.id}`"
                        class="text-sm bg-principal hover:bg-principal/80 text-white px-3 py-1 rounded">
                        Ver detalles
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Mensaje cuando no hay libros -->
    <div v-if="!isLoading && !error && books.length === 0" class="text-center py-12">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
        </svg>
        <p class="text-xl font-semibold text-gray-600">No se encontraron libros</p>
        <p class="text-gray-500 mt-2">Prueba con otros términos de búsqueda</p>
    </div>

    <!-- Paginación (solo visible si no hay error, no está cargando y hay libros) -->
    <div v-if="!isLoading && !error && books.length > 0" class="flex justify-center items-center gap-4 mt-8">
        <button @click="goToPage(currentPage - 1)" :disabled="currentPage <= 1"
            class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-800 disabled:opacity-50 disabled:cursor-not-allowed">
            Anterior
        </button>

        <span class="text-sm text-gray-600">
            Página {{ currentPage }} de {{ totalPages }}
        </span>

        <button @click="goToPage(currentPage + 1)" :disabled="currentPage >= totalPages"
            class="bg-principal text-white px-4 py-2 rounded hover:bg-principal/80 disabled:opacity-50 disabled:cursor-not-allowed">
            Siguiente
        </button>
    </div>
</template>

<script>
export default {
    data() {
        return {
            currentPage: 1,
            totalPages: 1,
            books: [],
            defaultCover: '/images/no-cover.jpg',
            searchQuery: '',
            searchCategory: 'title',
            // Añadir una URL base para la API configurada correctamente
            apiBaseUrl: import.meta.env.PUBLIC_API_URL || 'http://localhost:8000/api/v1',
            // Colores para las portadas aleatorias
            coverColors: [
                { bg: '#E53E3E', grad: '#C53030' }, // Rojo
                { bg: '#38A169', grad: '#2F855A' }, // Verde
                { bg: '#3182CE', grad: '#2B6CB0' }, // Azul
                { bg: '#805AD5', grad: '#6B46C1' }, // Púrpura
                { bg: '#D69E2E', grad: '#B7791F' }, // Amarillo
                { bg: '#DD6B20', grad: '#C05621' }, // Naranja
                { bg: '#0D9488', grad: '#0F766E' }, // Turquesa
                { bg: '#6366F1', grad: '#4F46E5' }, // Índigo
                { bg: '#F59E0B', grad: '#D97706' }, // Ámbar
                { bg: '#10B981', grad: '#059669' }  // Esmeralda
            ],
            // Registro de IDs de libros cuyas imágenes fallaron al cargar
            failedImages: [],
            // Estados para el indicador de carga y errores
            isLoading: false,
            error: null,
            loadTimeout: null,
            timeoutDuration: 10000 // 10 segundos
        };
    },
    mounted() {
        // Capturar parámetros de búsqueda y paginación de la URL
        const urlParams = new URLSearchParams(window.location.search);
        const pageParam = urlParams.get('page');

        // Capturar parámetros de búsqueda si existen
        const titleParam = urlParams.get('title');
        const partnerParam = urlParams.get('partner');
        const dateParam = urlParams.get('publication_date');

        // Configurar los valores de búsqueda basados en los parámetros URL
        if (titleParam) {
            this.searchQuery = titleParam;
            this.searchCategory = 'title';
        } else if (partnerParam) {
            this.searchQuery = partnerParam;
            this.searchCategory = 'partner';
        } else if (dateParam) {
            this.searchQuery = dateParam;
            this.searchCategory = 'publication_date';
        }

        // Realizar la búsqueda inicial
        this.fetchBooks(pageParam ? parseInt(pageParam) : 1);
    },
    methods: {
        async fetchBooks(page) {
            try {
                // Reiniciar estados de error y establecer loading
                this.error = null;
                this.isLoading = true;
                
                // Configurar un timeout para detectar demoras prolongadas
                if (this.loadTimeout) {
                    clearTimeout(this.loadTimeout);
                }
                
                this.loadTimeout = setTimeout(() => {
                    if (this.isLoading) {
                        this.error = "La carga está tardando más de lo esperado. Por favor, intente nuevamente.";
                    }
                }, this.timeoutDuration);
                
                // Construir la URL base
                let endpoint;
                let params = new URLSearchParams();

                // Añadir parámetro de página
                params.append('page', page);

                // Si hay una consulta de búsqueda, usar el endpoint de búsqueda
                if (this.searchQuery && this.searchQuery.trim() !== '') {
                    endpoint = `${this.apiBaseUrl}/books/search`;
                    params.append(this.searchCategory, this.searchQuery);
                    console.log(`Buscando con parámetro ${this.searchCategory}=${this.searchQuery}`);
                } else {
                    // Si no hay búsqueda, usar el endpoint normal
                    endpoint = `${this.apiBaseUrl}/books`;
                    console.log('Cargando todos los libros');
                }

                // Construir la URL final
                const apiUrl = `${endpoint}?${params.toString()}`;
                console.log(`API URL: ${apiUrl}`);

                // Actualizar la URL del navegador
                const browserUrl = new URL(window.location);
                browserUrl.searchParams.set('page', page);

                // Actualizar parámetros de búsqueda en la URL del navegador
                if (this.searchQuery && this.searchQuery.trim() !== '') {
                    // Limpiar parámetros de búsqueda anteriores
                    browserUrl.searchParams.delete('title');
                    browserUrl.searchParams.delete('partner');
                    browserUrl.searchParams.delete('publication_date');

                    // Añadir el parámetro de búsqueda actual
                    browserUrl.searchParams.set(this.searchCategory, this.searchQuery);
                } else {
                    // Limpiar parámetros de búsqueda si no hay búsqueda
                    browserUrl.searchParams.delete('title');
                    browserUrl.searchParams.delete('partner');
                    browserUrl.searchParams.delete('publication_date');
                }

                window.history.pushState({}, '', browserUrl);

                // Hacer la petición a la API
                const response = await fetch(apiUrl);

                if (!response.ok) {
                    throw new Error(`Error de API: ${response.status} ${response.statusText}`);
                }

                const result = await response.json();
                console.log('Respuesta de la API:', result);

                // Limpiar el timeout ya que la carga fue exitosa
                clearTimeout(this.loadTimeout);
                this.loadTimeout = null;
                
                // Actualizar el estado con los resultados
                this.books = result.data;
                this.totalPages = result.last_page;
                this.currentPage = result.current_page;
                
                // Desplazarse al inicio de la página
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            } catch (error) {
                console.error('Error al cargar los libros:', error);
                this.error = `Error al cargar los libros: ${error.message}`;
                this.books = []; // Limpiar los libros en caso de error
            } finally {
                // Asegurarse de que loading se establezca en false al finalizar
                this.isLoading = false;
                
                // Limpiar el timeout si existe
                if (this.loadTimeout) {
                    clearTimeout(this.loadTimeout);
                    this.loadTimeout = null;
                }
            }
        },
        handleSearch() {
            console.log(`Iniciando búsqueda: ${this.searchCategory}=${this.searchQuery}`);
            // Reiniciar a la primera página al realizar una nueva búsqueda
            this.fetchBooks(1);
        },
        goToPage(page) {
            if (page >= 1 && page <= this.totalPages) {
                this.fetchBooks(page);
            }
        },
        getRandomBookCover(bookId) {
            // Usar el ID del libro para tener un color consistente para el mismo libro
            const colorIndex = bookId % this.coverColors.length;
            const color = this.coverColors[colorIndex];

            return {
                background: `linear-gradient(135deg, ${color.bg} 0%, ${color.grad} 100%)`,
                boxShadow: 'inset 0 0 20px rgba(0, 0, 0, 0.2)'
            };
        },

        handleImageError(event, bookId) {
            // Ocultar la imagen
            event.target.style.display = 'none';

            // Registrar el ID del libro para mostrar el contenedor de color
            if (!this.failedImages.includes(bookId)) {
                this.failedImages.push(bookId);
            }
        },

        setCoverFallback(event) {
            // Ya no necesitamos esta función, pero la mantenemos por compatibilidad
            // No hacemos nada, ya que el v-if/v-else se encargará de mostrar el contenedor colorido
            event.target.style.display = 'none';
        },

        retryLoading() {
            this.fetchBooks(this.currentPage);
        }
    },
};
</script>