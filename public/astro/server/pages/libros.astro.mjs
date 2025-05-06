import { e as createComponent, k as renderComponent, l as renderScript, r as renderTemplate, m as maybeRenderHead } from '../chunks/astro/server_WsU3f9JK.mjs';
import 'kleur/colors';
import { $ as $$BaseLayout } from '../chunks/BaseLayout_oYRIW86G.mjs';
import { ssrRenderAttr, ssrIncludeBooleanAttr, ssrLooseContain, ssrLooseEqual, ssrInterpolate, ssrRenderList, ssrRenderStyle } from 'vue/server-renderer';
import { useSSRContext } from 'vue';
export { renderers } from '../renderers.mjs';

const _export_sfc = (sfc, props) => {
  const target = sfc.__vccOpts || sfc;
  for (const [key, val] of props) {
    target[key] = val;
  }
  return target;
};

const _sfc_main = {
  data() {
    return {
      currentPage: 1,
      totalPages: 1,
      books: [],
      defaultCover: "/images/no-cover.jpg",
      searchQuery: "",
      searchCategory: "title",
      // Añadir una URL base para la API configurada correctamente
      apiBaseUrl: "http://localhost:8000/api/v1",
      // Colores para las portadas aleatorias
      coverColors: [
        { bg: "#E53E3E", grad: "#C53030" },
        // Rojo
        { bg: "#38A169", grad: "#2F855A" },
        // Verde
        { bg: "#3182CE", grad: "#2B6CB0" },
        // Azul
        { bg: "#805AD5", grad: "#6B46C1" },
        // Púrpura
        { bg: "#D69E2E", grad: "#B7791F" },
        // Amarillo
        { bg: "#DD6B20", grad: "#C05621" },
        // Naranja
        { bg: "#0D9488", grad: "#0F766E" },
        // Turquesa
        { bg: "#6366F1", grad: "#4F46E5" },
        // Índigo
        { bg: "#F59E0B", grad: "#D97706" },
        // Ámbar
        { bg: "#10B981", grad: "#059669" }
        // Esmeralda
      ],
      // Registro de IDs de libros cuyas imágenes fallaron al cargar
      failedImages: [],
      // Estados para el indicador de carga y errores
      isLoading: false,
      error: null,
      loadTimeout: null,
      timeoutDuration: 1e4
      // 10 segundos
    };
  },
  mounted() {
    const urlParams = new URLSearchParams(window.location.search);
    const pageParam = urlParams.get("page");
    const titleParam = urlParams.get("title");
    const partnerParam = urlParams.get("partner");
    const dateParam = urlParams.get("publication_date");
    if (titleParam) {
      this.searchQuery = titleParam;
      this.searchCategory = "title";
    } else if (partnerParam) {
      this.searchQuery = partnerParam;
      this.searchCategory = "partner";
    } else if (dateParam) {
      this.searchQuery = dateParam;
      this.searchCategory = "publication_date";
    }
    this.fetchBooks(pageParam ? parseInt(pageParam) : 1);
  },
  methods: {
    async fetchBooks(page) {
      try {
        this.error = null;
        this.isLoading = true;
        if (this.loadTimeout) {
          clearTimeout(this.loadTimeout);
        }
        this.loadTimeout = setTimeout(() => {
          if (this.isLoading) {
            this.error = "La carga está tardando más de lo esperado. Por favor, intente nuevamente.";
          }
        }, this.timeoutDuration);
        let endpoint;
        let params = new URLSearchParams();
        params.append("page", page);
        if (this.searchQuery && this.searchQuery.trim() !== "") {
          endpoint = `${this.apiBaseUrl}/books/search`;
          params.append(this.searchCategory, this.searchQuery);
          console.log(`Buscando con parámetro ${this.searchCategory}=${this.searchQuery}`);
        } else {
          endpoint = `${this.apiBaseUrl}/books`;
          console.log("Cargando todos los libros");
        }
        const apiUrl = `${endpoint}?${params.toString()}`;
        console.log(`API URL: ${apiUrl}`);
        const browserUrl = new URL(window.location);
        browserUrl.searchParams.set("page", page);
        if (this.searchQuery && this.searchQuery.trim() !== "") {
          browserUrl.searchParams.delete("title");
          browserUrl.searchParams.delete("partner");
          browserUrl.searchParams.delete("publication_date");
          browserUrl.searchParams.set(this.searchCategory, this.searchQuery);
        } else {
          browserUrl.searchParams.delete("title");
          browserUrl.searchParams.delete("partner");
          browserUrl.searchParams.delete("publication_date");
        }
        window.history.pushState({}, "", browserUrl);
        const response = await fetch(apiUrl);
        if (!response.ok) {
          throw new Error(`Error de API: ${response.status} ${response.statusText}`);
        }
        const result = await response.json();
        console.log("Respuesta de la API:", result);
        clearTimeout(this.loadTimeout);
        this.loadTimeout = null;
        this.books = result.data;
        this.totalPages = result.last_page;
        this.currentPage = result.current_page;
        window.scrollTo({
          top: 0,
          behavior: "smooth"
        });
      } catch (error) {
        console.error("Error al cargar los libros:", error);
        this.error = `Error al cargar los libros: ${error.message}`;
        this.books = [];
      } finally {
        this.isLoading = false;
        if (this.loadTimeout) {
          clearTimeout(this.loadTimeout);
          this.loadTimeout = null;
        }
      }
    },
    handleSearch() {
      console.log(`Iniciando búsqueda: ${this.searchCategory}=${this.searchQuery}`);
      this.fetchBooks(1);
    },
    goToPage(page) {
      if (page >= 1 && page <= this.totalPages) {
        this.fetchBooks(page);
      }
    },
    getRandomBookCover(bookId) {
      const colorIndex = bookId % this.coverColors.length;
      const color = this.coverColors[colorIndex];
      return {
        background: `linear-gradient(135deg, ${color.bg} 0%, ${color.grad} 100%)`,
        boxShadow: "inset 0 0 20px rgba(0, 0, 0, 0.2)"
      };
    },
    handleImageError(event, bookId) {
      event.target.style.display = "none";
      if (!this.failedImages.includes(bookId)) {
        this.failedImages.push(bookId);
      }
    },
    setCoverFallback(event) {
      event.target.style.display = "none";
    },
    retryLoading() {
      this.fetchBooks(this.currentPage);
    }
  }
};
function _sfc_ssrRender(_ctx, _push, _parent, _attrs, $props, $setup, $data, $options) {
  _push(`<!--[--><div class="max-w-3xl mx-auto mb-8"><div class="bg-white rounded-lg shadow-lg p-1"><form class="flex flex-col sm:flex-row" id="searchForm"><div class="flex-grow relative"><div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg></div><input type="text"${ssrRenderAttr("value", $data.searchQuery)} class="block w-full pl-10 pr-3 py-3 border-0 text-gray-900 placeholder-gray-500 focus:ring-0 focus:outline-none sm:text-sm" placeholder="Buscar libros, autores, temas..."></div><div class="mt-2 sm:mt-0 sm:ml-2"><select class="block w-full sm:w-auto py-3 px-4 border-0 bg-gray-50 text-gray-500 focus:ring-0 focus:outline-none sm:text-sm rounded-md"><option value="title"${ssrIncludeBooleanAttr(Array.isArray($data.searchCategory) ? ssrLooseContain($data.searchCategory, "title") : ssrLooseEqual($data.searchCategory, "title")) ? " selected" : ""}>Nombre</option><option value="partner"${ssrIncludeBooleanAttr(Array.isArray($data.searchCategory) ? ssrLooseContain($data.searchCategory, "partner") : ssrLooseEqual($data.searchCategory, "partner")) ? " selected" : ""}>Autores</option><option value="publication_date"${ssrIncludeBooleanAttr(Array.isArray($data.searchCategory) ? ssrLooseContain($data.searchCategory, "publication_date") : ssrLooseEqual($data.searchCategory, "publication_date")) ? " selected" : ""}>Año</option></select></div><div class="mt-2 sm:mt-0 sm:ml-2"><button type="submit" class="w-full sm:w-auto flex justify-center py-3 px-6 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-gray-700 hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"> Buscar </button></div></form><div class="px-3 py-2 border-t border-gray-100 text-xs text-gray-500 flex justify-between"><div><span class="font-medium">Búsqueda Avanzada</span> • <span>Operadores Booleanos</span></div></div></div></div>`);
  if ($data.error) {
    _push(`<div class="w-full max-w-3xl mx-auto mb-8 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg flex items-center"><svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg><div><p class="font-bold">Error</p><p>${ssrInterpolate($data.error)}</p></div><button class="ml-auto bg-red-200 hover:bg-red-300 text-red-800 px-4 py-2 rounded-lg"> Reintentar </button></div>`);
  } else {
    _push(`<!---->`);
  }
  if ($data.isLoading) {
    _push(`<div class="w-full flex flex-col items-center justify-center py-12"><div class="animate-spin rounded-full h-16 w-16 border-t-2 border-b-2 border-principal mb-4"></div><p class="text-gray-600">Cargando libros...</p></div>`);
  } else {
    _push(`<!---->`);
  }
  if (!$data.isLoading && !$data.error && $data.books.length > 0) {
    _push(`<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8"><!--[-->`);
    ssrRenderList($data.books, (book) => {
      _push(`<div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow flex flex-col h-full"><div class="flex-grow relative" style="${ssrRenderStyle({ "aspect-ratio": "2/3" })}">`);
      if (book.cover && book.cover.trim() !== "") {
        _push(`<img${ssrRenderAttr("src", book.cover)}${ssrRenderAttr("alt", `Portada de ${book.title}`)} class="w-full h-full object-cover">`);
      } else {
        _push(`<div style="${ssrRenderStyle($options.getRandomBookCover(book.id))}" class="w-full h-full flex items-center justify-center p-4 text-center"><span class="text-white font-bold text-lg rotate-[-30deg]">${ssrInterpolate(book.title)}</span></div>`);
      }
      _push(`<div style="${ssrRenderStyle([
        $data.failedImages.includes(book.id) ? null : { display: "none" },
        $options.getRandomBookCover(book.id)
      ])}" class="w-full h-full absolute top-0 left-0 flex items-center justify-center p-4 text-center"><span class="text-white font-bold text-lg rotate-[-30deg]">${ssrInterpolate(book.title)}</span></div></div><div class="p-4"><h3 class="font-bold text-sm mb-2 text-gray-800">${ssrInterpolate(book.title)}</h3><div class="flex justify-end"><a${ssrRenderAttr("href", `/book/${book.id}`)} class="text-sm bg-principal hover:bg-principal/80 text-white px-3 py-1 rounded"> Ver detalles </a></div></div></div>`);
    });
    _push(`<!--]--></div>`);
  } else {
    _push(`<!---->`);
  }
  if (!$data.isLoading && !$data.error && $data.books.length === 0) {
    _push(`<div class="text-center py-12"><svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg><p class="text-xl font-semibold text-gray-600">No se encontraron libros</p><p class="text-gray-500 mt-2">Prueba con otros términos de búsqueda</p></div>`);
  } else {
    _push(`<!---->`);
  }
  if (!$data.isLoading && !$data.error && $data.books.length > 0) {
    _push(`<div class="flex justify-center items-center gap-4 mt-8"><button${ssrIncludeBooleanAttr($data.currentPage <= 1) ? " disabled" : ""} class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-800 disabled:opacity-50 disabled:cursor-not-allowed"> Anterior </button><span class="text-sm text-gray-600"> Página ${ssrInterpolate($data.currentPage)} de ${ssrInterpolate($data.totalPages)}</span><button${ssrIncludeBooleanAttr($data.currentPage >= $data.totalPages) ? " disabled" : ""} class="bg-principal text-white px-4 py-2 rounded hover:bg-principal/80 disabled:opacity-50 disabled:cursor-not-allowed"> Siguiente </button></div>`);
  } else {
    _push(`<!---->`);
  }
  _push(`<!--]-->`);
}
const _sfc_setup = _sfc_main.setup;
_sfc_main.setup = (props, ctx) => {
  const ssrContext = useSSRContext();
  (ssrContext.modules || (ssrContext.modules = /* @__PURE__ */ new Set())).add("src/components/book/Pagination.vue");
  return _sfc_setup ? _sfc_setup(props, ctx) : void 0;
};
const Pagination = /* @__PURE__ */ _export_sfc(_sfc_main, [["ssrRender", _sfc_ssrRender]]);

const $$Libros = createComponent(($$result, $$props, $$slots) => {
  return renderTemplate`${renderComponent($$result, "BaseLayout", $$BaseLayout, { "title": "Libros" }, { "default": ($$result2) => renderTemplate`  ${maybeRenderHead()}<h1 id="top-of-page" class="text-3xl font-bold text-center text-gray-800 mb-4 sm:mb-6 sm:px-10 lg:mb-8 lg:px-20">
Catálogo ScAsEd
</h1>  <div class="max-w-3xl mx-auto mb-6 text-center px-10"> <p class="text-gray-700 italic">
Con nuestro catálogo contribuimos a promover el pensamiento crítico,
            la creación literaria, la cultura y el diálogo entre la Universidad
            y la sociedad.
</p> </div> <div class="max-w-5xl mx-auto px-10"> ${renderComponent($$result2, "Pagination", Pagination, { "client:load": true, "client:component-hydration": "load", "client:component-path": "/home/lara5tar/Escritorio/chavira/editorialch/astro/src/components/book/Pagination.vue", "client:component-export": "default" })} </div> <div class="h-10"></div> ` })} ${renderScript($$result, "/home/lara5tar/Escritorio/chavira/editorialch/astro/src/pages/libros.astro?astro&type=script&index=0&lang.ts")}`;
}, "/home/lara5tar/Escritorio/chavira/editorialch/astro/src/pages/libros.astro", void 0);

const $$file = "/home/lara5tar/Escritorio/chavira/editorialch/astro/src/pages/libros.astro";
const $$url = "/libros";

const _page = /*#__PURE__*/Object.freeze(/*#__PURE__*/Object.defineProperty({
  __proto__: null,
  default: $$Libros,
  file: $$file,
  url: $$url
}, Symbol.toStringTag, { value: 'Module' }));

const page = () => _page;

export { page };
