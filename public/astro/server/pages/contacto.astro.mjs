import { e as createComponent, f as createAstro, k as renderComponent, r as renderTemplate, m as maybeRenderHead, h as addAttribute, l as renderScript } from '../chunks/astro/server_WsU3f9JK.mjs';
import 'kleur/colors';
import { $ as $$BaseLayout } from '../chunks/BaseLayout_oYRIW86G.mjs';
export { renderers } from '../renderers.mjs';

const $$Astro = createAstro();
const $$Contacto = createComponent(($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro, $$props, $$slots);
  Astro2.self = $$Contacto;
  const tipo = Astro2.url.searchParams.get("tipo");
  return renderTemplate`${renderComponent($$result, "BaseLayout", $$BaseLayout, { "title": "Contacto" }, { "default": ($$result2) => renderTemplate` ${maybeRenderHead()}<div class="container mx-auto px-4"> <h1 class="text-4xl font-bold text-center mb-8">Contáctanos</h1> <div class="grid md:grid-cols-2 gap-12 mb-16"> <div class="bg-white rounded-lg shadow-md p-6"> <h2 class="text-2xl font-semibold mb-6">
Formulario de Contacto
</h2> <form class="space-y-4"> <div> <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nombre completo</label> <input type="text" id="name" name="name" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-500"> </div> <div> <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Correo electrónico</label> <input type="email" id="email" name="email" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-500"> </div> <div> <label for="subject" class="block text-sm font-medium text-gray-700 mb-1">Asunto</label> <select id="subject" name="subject" class="w-full px-3 pr-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-500"> <option value="manuscrito"${addAttribute(tipo === "manuscrito", "selected")}>Envío de manuscrito</option> <option value="consulta"${addAttribute(tipo === "consulta" || !tipo && true, "selected")}>Consulta general</option> <!-- <option value="propuesta"
                                >Propuesta editorial</option
                            >

                            <option value="distribución">Distribución</option>
                            <option value="prensa">Prensa</option>
                            <option value="otro">Otro</option> --> </select> </div> <div id="manuscriptUploadField" class="hidden"> <label for="manuscriptFile" class="block text-sm font-medium text-gray-700 mb-1">Adjuntar manuscrito (PDF, máx. 10MB)</label> <input type="file" id="manuscriptFile" name="manuscriptFile" accept=".pdf" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-500"> <p class="mt-1 text-sm text-gray-500">
Por favor adjunte una muestra o resumen de su
                            manuscrito en formato PDF.
</p> </div> <div> <label for="message" class="block text-sm font-medium text-gray-700 mb-1">Mensaje</label> <textarea id="message" name="message" rows="5" required class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-gray-500"></textarea> </div> <button type="submit" class="w-full bg-gray-600 hover:bg-gray-700 text-white font-medium py-2 px-4 rounded-md transition duration-300">
Enviar mensaje
</button> </form> </div> <div> <div class="bg-gray-50 rounded-lg p-6 mb-8"> <h2 class="text-2xl font-semibold mb-4">
Información de Contacto
</h2> <div class="space-y-3"> <p class="flex items-start"> <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path> </svg> <span>Av. de los Libros 123, Col. Centro<br>Ciudad
                                de México, CP 06700</span> </p> <p class="flex items-center"> <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path> </svg> <span>contacto@editorial.com</span> </p> <p class="flex items-center"> <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path> </svg> <span>+52 (55) 1234-5678</span> </p> </div> </div> <div class="bg-gray-50 rounded-lg p-6"> <h2 class="text-xl font-semibold mb-4">
Horario de Atención
</h2> <ul class="space-y-2"> <li class="flex justify-between"> <span>Lunes - Viernes:</span> <span>9:00 - 18:00</span> </li> <li class="flex justify-between"> <span>Sábados:</span> <span>10:00 - 14:00</span> </li> <li class="flex justify-between"> <span>Domingos:</span> <span>Cerrado</span> </li> </ul> </div> </div> </div> <div class="mb-12"> <h2 class="text-2xl font-semibold mb-6 text-center">
Nuestra Ubicación
</h2> <div class="w-full h-96 bg-gray-200 rounded-lg overflow-hidden"> <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3762.661450621844!2d-99.17843732393786!3d19.427882586889465!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d1ff35f5bd1563%3A0x6c366f0e2de1dfea!2sZocalo%2C%20Centro%20Histórico%2C%20Centro%2C%20Mexico%20City%2C%20CDMX!5e0!3m2!1sen!2smx!4v1699020500766!5m2!1sen!2smx" width="100%" height="100%" style="border:0; display: block;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="w-full h-full" title="Ubicación Editorial"></iframe> </div> </div> </div> ${renderScript($$result2, "/home/lara5tar/Escritorio/chavira/editorialch/astro/src/pages/contacto.astro?astro&type=script&index=0&lang.ts")} ` })}`;
}, "/home/lara5tar/Escritorio/chavira/editorialch/astro/src/pages/contacto.astro", void 0);

const $$file = "/home/lara5tar/Escritorio/chavira/editorialch/astro/src/pages/contacto.astro";
const $$url = "/contacto";

const _page = /*#__PURE__*/Object.freeze(/*#__PURE__*/Object.defineProperty({
    __proto__: null,
    default: $$Contacto,
    file: $$file,
    url: $$url
}, Symbol.toStringTag, { value: 'Module' }));

const page = () => _page;

export { page };
