import { e as createComponent, f as createAstro, k as renderComponent, l as renderScript, r as renderTemplate, m as maybeRenderHead, h as addAttribute } from '../../chunks/astro/server_WsU3f9JK.mjs';
import 'kleur/colors';
import { $ as $$BaseLayout } from '../../chunks/BaseLayout_oYRIW86G.mjs';
/* empty css                                   */
export { renderers } from '../../renderers.mjs';

const $$Astro = createAstro();
async function getStaticPaths() {
  return [{ params: { id: void 0 } }];
}
const $$id = createComponent(async ($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro, $$props, $$slots);
  Astro2.self = $$id;
  const API_URL = "http://localhost:8000/api/v1";
  const { id } = Astro2.params;
  let book;
  try {
    if (id) {
      const response = await fetch(`${API_URL}/books/${id}`);
      if (!response.ok) {
        throw new Error(`Error fetching book: ${response.status}`);
      }
      book = await response.json();
    }
  } catch (error) {
    console.error("Error fetching book data:", error);
  }
  return renderTemplate`${renderComponent($$result, "BaseLayout", $$BaseLayout, { "title": book ? book.title : "Detalle del libro", "data-astro-cid-25e4o6db": true }, { "default": async ($$result2) => renderTemplate` ${maybeRenderHead()}<main class="sciencedirect-layout pb-20" data-astro-cid-25e4o6db> <div class="sd-container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 b-8" data-astro-cid-25e4o6db> <!-- Breadcrumb navigation --> <!-- <nav class="sd-breadcrumb mb-6">
                <ol class="flex items-center space-x-2 text-sm text-gray-600">
                    <li><a href="/" class="hover:text-gray-900">Inicio</a></li>
                    <li class="flex items-center">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4 mx-1"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M9 5l7 7-7 7"></path>
                        </svg>
                    </li>
                    <li>
                        <a href="/libros" class="hover:text-gray-900"
                            >Colección de libros</a
                        >
                    </li>
                    <li class="flex items-center">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-4 w-4 mx-1"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M9 5l7 7-7 7"></path>
                        </svg>
                    </li>
                    <li class="text-gray-900 font-medium">{book?.title}</li>
                </ol>
            </nav> --> <!-- Two-column layout: TOC left, Content+Sidebar right --> <div class="sd-two-column-wrapper flex flex-col lg:flex-row space-y-8 lg:space-y-0 lg:space-x-8" data-astro-cid-25e4o6db> <!-- Left sidebar with TOC --> <aside class="sd-toc-sidebar lg:w-1/4" data-astro-cid-25e4o6db> <div class="sd-outline bg-white p-6 rounded-lg shadow-md sticky top-8" data-astro-cid-25e4o6db> <h3 class="text-lg font-bold mb-4 pb-2 border-b border-gray-200" data-astro-cid-25e4o6db>
Índice
</h3> <ul class="space-y-2" data-astro-cid-25e4o6db> <li data-astro-cid-25e4o6db> <a href="#section-info" class="text-gray-700 hover:text-gray-900 flex items-center" data-astro-cid-25e4o6db> <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" data-astro-cid-25e4o6db> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" data-astro-cid-25e4o6db></path> </svg>
Información general
</a> </li> <li data-astro-cid-25e4o6db> <a href="#section-description" class="text-gray-700 hover:text-gray-900 flex items-center" data-astro-cid-25e4o6db> <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" data-astro-cid-25e4o6db> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" data-astro-cid-25e4o6db></path> </svg>
Descripción
</a> </li> <li data-astro-cid-25e4o6db> <a href="#section-pdf" class="text-gray-700 hover:text-gray-900 flex items-center" data-astro-cid-25e4o6db> <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" data-astro-cid-25e4o6db> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3M3 17V7a2 2 0 012-2h6l2 2h6a2 2 0 012 2v8a2 2 0 01-2 2H5a2 2 0 01-2-2z" data-astro-cid-25e4o6db></path> </svg>
Vista previa
</a> </li> </ul> </div> </aside> <!-- Right column with article and sidebar --> <div class="sd-content-wrapper lg:w-3/4 flex flex-col md:flex-row md:space-x-6" data-astro-cid-25e4o6db> <!-- Main content area --> <article class="sd-main-content bg-white rounded-lg shadow-md overflow-hidden md:w-2/3" data-astro-cid-25e4o6db> <header class="sd-article-header p-6 border-b border-gray-200" data-astro-cid-25e4o6db> <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-4" data-astro-cid-25e4o6db> ${book?.title} </h1> <div class="sd-authors text-sm text-gray-600 mb-2" data-astro-cid-25e4o6db>
Autor: ${book?.partner || "No disponible"} </div> <div class="sd-publication-info text-sm grid grid-cols-1 sm:grid-cols-2 gap-2" data-astro-cid-25e4o6db> ${book?.publication_date && renderTemplate`<span class="flex items-center" data-astro-cid-25e4o6db> <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" data-astro-cid-25e4o6db> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" data-astro-cid-25e4o6db></path> </svg>
Publicación:${" "} ${new Date(
    book.publication_date
  ).toLocaleDateString()} </span>`} ${book?.isbn && renderTemplate`<span class="flex items-center" data-astro-cid-25e4o6db> <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" data-astro-cid-25e4o6db> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" data-astro-cid-25e4o6db></path> </svg>
ISBN: ${book.isbn} </span>`} ${book?.edition && renderTemplate`<span class="flex items-center" data-astro-cid-25e4o6db> <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" data-astro-cid-25e4o6db> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" data-astro-cid-25e4o6db></path> </svg>
Edición: ${book.edition} </span>`} ${book?.pages && renderTemplate`<span class="flex items-center" data-astro-cid-25e4o6db> <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" data-astro-cid-25e4o6db> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" data-astro-cid-25e4o6db></path> </svg>
Páginas: ${book.pages} </span>`} </div> </header> ${book?.description && renderTemplate`<section id="section-description" class="sd-abstract p-6 border-b border-gray-200" data-astro-cid-25e4o6db> <h2 class="text-xl font-bold mb-4 text-gray-800" data-astro-cid-25e4o6db>
Descripción
</h2> <div class="prose max-w-none" data-astro-cid-25e4o6db> <p data-astro-cid-25e4o6db>${book.description}</p> </div> </section>`} <section id="section-pdf" class="sd-article-body p-6" data-astro-cid-25e4o6db> <h2 class="text-xl font-bold mb-4 text-gray-800" data-astro-cid-25e4o6db>
Vista previa
</h2> ${book?.pdf_path ? renderTemplate`<div class="border rounded-lg overflow-hidden h-[600px] bg-gray-100" data-astro-cid-25e4o6db> <iframe${addAttribute(`${API_URL}/books/${id}/pdf?embed=true`, "src")} width="100%" height="100%" style="border: none;"${addAttribute(`Vista previa de ${book.title}`, "title")} data-astro-cid-25e4o6db></iframe> </div>` : renderTemplate`<div class="flex items-center justify-center h-[300px] bg-gray-100 rounded-lg border" data-astro-cid-25e4o6db> <p class="text-gray-500 italic" data-astro-cid-25e4o6db>
No hay vista previa disponible para
                                            este libro
</p> </div>`} </section> </article> <!-- Sidebar with metadata and tools --> <aside class="sd-sidebar mt-6 md:mt-0 md:w-1/3" data-astro-cid-25e4o6db> <!-- Contenedor de la portada del libro --> <div class="sd-cover-image bg-white p-6 rounded-lg shadow-md" data-astro-cid-25e4o6db> <div class="cover-container mb-6" data-astro-cid-25e4o6db> ${book?.cover ? renderTemplate`<img${addAttribute(book.cover, "src")}${addAttribute(`Portada de ${book.title}`, "alt")} class="w-full shadow-md border border-gray-200 rounded" onerror="this.onerror=null; this.parentElement.classList.add('cover-error'); this.style.display='none';" data-astro-cid-25e4o6db>` : renderTemplate`<div class="aspect-[2/3] bg-gradient-to-br from-blue-500 to-blue-700 rounded flex items-center justify-center p-4" data-astro-cid-25e4o6db> <span class="text-white font-bold text-lg rotate-[-30deg]" data-astro-cid-25e4o6db> ${book?.title} </span> </div>`} </div> <!-- Sección de información general separada claramente de la portada --> <div id="section-info" class="space-y-4" data-astro-cid-25e4o6db> <h3 class="font-bold text-lg border-t border-gray-200 pt-6" data-astro-cid-25e4o6db>
Información general
</h3> <ul class="space-y-2 text-sm" data-astro-cid-25e4o6db> ${book?.partner && renderTemplate`<li class="flex items-start" data-astro-cid-25e4o6db> <span class="font-medium w-24" data-astro-cid-25e4o6db>
Autor:
</span> <span data-astro-cid-25e4o6db>${book.partner}</span> </li>`} ${book?.publication_date && renderTemplate`<li class="flex items-start" data-astro-cid-25e4o6db> <span class="font-medium w-24" data-astro-cid-25e4o6db>
Publicado:
</span> <span data-astro-cid-25e4o6db> ${new Date(
    book.publication_date
  ).toLocaleDateString()} </span> </li>`} ${book?.isbn && renderTemplate`<li class="flex items-start" data-astro-cid-25e4o6db> <span class="font-medium w-24" data-astro-cid-25e4o6db>
ISBN:
</span> <span data-astro-cid-25e4o6db>${book.isbn}</span> </li>`} ${book?.edition && renderTemplate`<li class="flex items-start" data-astro-cid-25e4o6db> <span class="font-medium w-24" data-astro-cid-25e4o6db>
Edición:
</span> <span data-astro-cid-25e4o6db>${book.edition}</span> </li>`} ${book?.volume && renderTemplate`<li class="flex items-start" data-astro-cid-25e4o6db> <span class="font-medium w-24" data-astro-cid-25e4o6db>
Volumen:
</span> <span data-astro-cid-25e4o6db>${book.volume}</span> </li>`} ${book?.pages && renderTemplate`<li class="flex items-start" data-astro-cid-25e4o6db> <span class="font-medium w-24" data-astro-cid-25e4o6db>
Páginas:
</span> <span data-astro-cid-25e4o6db>${book.pages}</span> </li>`} </ul> </div> </div> <div class="sd-actions mt-6 bg-white p-6 rounded-lg shadow-md" data-astro-cid-25e4o6db> ${book?.pdf_path && renderTemplate`<a${addAttribute(`${API_URL}/books/${id}/pdf`, "href")} target="_blank" class="sd-btn sd-btn-primary w-full flex items-center justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none" data-astro-cid-25e4o6db> <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" data-astro-cid-25e4o6db> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" data-astro-cid-25e4o6db></path> </svg>
Descargar PDF
</a>`} <button class="sd-btn w-full flex items-center justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none" onclick="navigator.clipboard.writeText(window.location.href); alert('Enlace copiado al portapapeles');" data-astro-cid-25e4o6db> <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" data-astro-cid-25e4o6db> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" data-astro-cid-25e4o6db></path> </svg>
Copiar enlace
</button> <a${addAttribute(`https://twitter.com/intent/tweet?text=${encodeURIComponent(`Descubre "${book?.title}" en el catálogo de Editorial ScAsEd`)}&url=${encodeURIComponent(Astro2.url.toString())}`, "href")} target="_blank" class="sd-btn w-full flex items-center justify-center py-2 px-4 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none" data-astro-cid-25e4o6db> <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 24 24" data-astro-cid-25e4o6db> <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z" data-astro-cid-25e4o6db></path> </svg>
Compartir
</a> </div> </aside> </div> </div> </div> </main> ` })}  ${renderScript($$result, "/home/lara5tar/Escritorio/chavira/editorialch/astro/src/pages/book/[id].astro?astro&type=script&index=0&lang.ts")}`;
}, "/home/lara5tar/Escritorio/chavira/editorialch/astro/src/pages/book/[id].astro", void 0);
const $$file = "/home/lara5tar/Escritorio/chavira/editorialch/astro/src/pages/book/[id].astro";
const $$url = "/book/[id]";

const _page = /*#__PURE__*/Object.freeze(/*#__PURE__*/Object.defineProperty({
    __proto__: null,
    default: $$id,
    file: $$file,
    getStaticPaths,
    url: $$url
}, Symbol.toStringTag, { value: 'Module' }));

const page = () => _page;

export { page };
