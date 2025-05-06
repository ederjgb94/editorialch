import 'kleur/colors';
import { p as decodeKey } from './chunks/astro/server_WsU3f9JK.mjs';
import 'clsx';
import 'cookie';
import { N as NOOP_MIDDLEWARE_FN } from './chunks/astro-designed-error-pages_p8LIfrRB.mjs';
import 'es-module-lexer';

function sanitizeParams(params) {
  return Object.fromEntries(
    Object.entries(params).map(([key, value]) => {
      if (typeof value === "string") {
        return [key, value.normalize().replace(/#/g, "%23").replace(/\?/g, "%3F")];
      }
      return [key, value];
    })
  );
}
function getParameter(part, params) {
  if (part.spread) {
    return params[part.content.slice(3)] || "";
  }
  if (part.dynamic) {
    if (!params[part.content]) {
      throw new TypeError(`Missing parameter: ${part.content}`);
    }
    return params[part.content];
  }
  return part.content.normalize().replace(/\?/g, "%3F").replace(/#/g, "%23").replace(/%5B/g, "[").replace(/%5D/g, "]");
}
function getSegment(segment, params) {
  const segmentPath = segment.map((part) => getParameter(part, params)).join("");
  return segmentPath ? "/" + segmentPath : "";
}
function getRouteGenerator(segments, addTrailingSlash) {
  return (params) => {
    const sanitizedParams = sanitizeParams(params);
    let trailing = "";
    if (addTrailingSlash === "always" && segments.length) {
      trailing = "/";
    }
    const path = segments.map((segment) => getSegment(segment, sanitizedParams)).join("") + trailing;
    return path || "/";
  };
}

function deserializeRouteData(rawRouteData) {
  return {
    route: rawRouteData.route,
    type: rawRouteData.type,
    pattern: new RegExp(rawRouteData.pattern),
    params: rawRouteData.params,
    component: rawRouteData.component,
    generate: getRouteGenerator(rawRouteData.segments, rawRouteData._meta.trailingSlash),
    pathname: rawRouteData.pathname || void 0,
    segments: rawRouteData.segments,
    prerender: rawRouteData.prerender,
    redirect: rawRouteData.redirect,
    redirectRoute: rawRouteData.redirectRoute ? deserializeRouteData(rawRouteData.redirectRoute) : void 0,
    fallbackRoutes: rawRouteData.fallbackRoutes.map((fallback) => {
      return deserializeRouteData(fallback);
    }),
    isIndex: rawRouteData.isIndex,
    origin: rawRouteData.origin
  };
}

function deserializeManifest(serializedManifest) {
  const routes = [];
  for (const serializedRoute of serializedManifest.routes) {
    routes.push({
      ...serializedRoute,
      routeData: deserializeRouteData(serializedRoute.routeData)
    });
    const route = serializedRoute;
    route.routeData = deserializeRouteData(serializedRoute.routeData);
  }
  const assets = new Set(serializedManifest.assets);
  const componentMetadata = new Map(serializedManifest.componentMetadata);
  const inlinedScripts = new Map(serializedManifest.inlinedScripts);
  const clientDirectives = new Map(serializedManifest.clientDirectives);
  const serverIslandNameMap = new Map(serializedManifest.serverIslandNameMap);
  const key = decodeKey(serializedManifest.key);
  return {
    // in case user middleware exists, this no-op middleware will be reassigned (see plugin-ssr.ts)
    middleware() {
      return { onRequest: NOOP_MIDDLEWARE_FN };
    },
    ...serializedManifest,
    assets,
    componentMetadata,
    inlinedScripts,
    clientDirectives,
    routes,
    serverIslandNameMap,
    key
  };
}

const manifest = deserializeManifest({"hrefRoot":"file:///home/lara5tar/Escritorio/chavira/editorialch/astro/","cacheDir":"file:///home/lara5tar/Escritorio/chavira/editorialch/astro/node_modules/.astro/","outDir":"file:///home/lara5tar/Escritorio/chavira/editorialch/public/astro/","srcDir":"file:///home/lara5tar/Escritorio/chavira/editorialch/astro/src/","publicDir":"file:///home/lara5tar/Escritorio/chavira/editorialch/astro/public/","buildClientDir":"file:///home/lara5tar/Escritorio/chavira/editorialch/public/astro/client/","buildServerDir":"file:///home/lara5tar/Escritorio/chavira/editorialch/public/astro/server/","adapterName":"@astrojs/node","routes":[{"file":"","links":[],"scripts":[],"styles":[],"routeData":{"type":"page","component":"_server-islands.astro","params":["name"],"segments":[[{"content":"_server-islands","dynamic":false,"spread":false}],[{"content":"name","dynamic":true,"spread":false}]],"pattern":"^\\/_server-islands\\/([^/]+?)\\/?$","prerender":false,"isIndex":false,"fallbackRoutes":[],"route":"/_server-islands/[name]","origin":"internal","_meta":{"trailingSlash":"ignore"}}},{"file":"","links":[],"scripts":[],"styles":[],"routeData":{"type":"endpoint","isIndex":false,"route":"/_image","pattern":"^\\/_image\\/?$","segments":[[{"content":"_image","dynamic":false,"spread":false}]],"params":[],"component":"node_modules/astro/dist/assets/endpoint/node.js","pathname":"/_image","prerender":false,"fallbackRoutes":[],"origin":"internal","_meta":{"trailingSlash":"ignore"}}},{"file":"","links":[],"scripts":[],"styles":[{"type":"external","src":"/assets/_id_.wSiQOhya.css"},{"type":"inline","content":".sd-container[data-astro-cid-25e4o6db]{max-width:1400px;margin:0 auto}.cover-error[data-astro-cid-25e4o6db]{background:linear-gradient(135deg,#3182ce,#2b6cb0);aspect-ratio:2/3;display:flex;align-items:center;justify-content:center;border-radius:.25rem}.cover-error[data-astro-cid-25e4o6db]:after{content:attr(data-title);color:#fff;font-weight:700;transform:rotate(-30deg);text-align:center;padding:1rem}@media (max-width: 768px){.sd-two-column-wrapper[data-astro-cid-25e4o6db]{flex-direction:column}.sd-toc-sidebar[data-astro-cid-25e4o6db],.sd-content-wrapper[data-astro-cid-25e4o6db]{width:100%}}\n"}],"routeData":{"route":"/book/[id]","isIndex":false,"type":"page","pattern":"^\\/book\\/([^/]+?)\\/?$","segments":[[{"content":"book","dynamic":false,"spread":false}],[{"content":"id","dynamic":true,"spread":false}]],"params":["id"],"component":"src/pages/book/[id].astro","prerender":false,"fallbackRoutes":[],"distURL":[],"origin":"project","_meta":{"trailingSlash":"ignore"}}},{"file":"","links":[],"scripts":[],"styles":[{"type":"external","src":"/assets/_id_.wSiQOhya.css"}],"routeData":{"route":"/contacto","isIndex":false,"type":"page","pattern":"^\\/contacto\\/?$","segments":[[{"content":"contacto","dynamic":false,"spread":false}]],"params":[],"component":"src/pages/contacto.astro","pathname":"/contacto","prerender":false,"fallbackRoutes":[],"distURL":[],"origin":"project","_meta":{"trailingSlash":"ignore"}}},{"file":"","links":[],"scripts":[],"styles":[{"type":"external","src":"/assets/_id_.wSiQOhya.css"}],"routeData":{"route":"/libros","isIndex":false,"type":"page","pattern":"^\\/libros\\/?$","segments":[[{"content":"libros","dynamic":false,"spread":false}]],"params":[],"component":"src/pages/libros.astro","pathname":"/libros","prerender":false,"fallbackRoutes":[],"distURL":[],"origin":"project","_meta":{"trailingSlash":"ignore"}}},{"file":"","links":[],"scripts":[],"styles":[{"type":"external","src":"/assets/_id_.wSiQOhya.css"}],"routeData":{"route":"/","isIndex":true,"type":"page","pattern":"^\\/$","segments":[],"params":[],"component":"src/pages/index.astro","pathname":"/","prerender":false,"fallbackRoutes":[],"distURL":[],"origin":"project","_meta":{"trailingSlash":"ignore"}}}],"base":"/","trailingSlash":"ignore","compressHTML":true,"componentMetadata":[["/home/lara5tar/Escritorio/chavira/editorialch/astro/src/pages/book/[id].astro",{"propagation":"none","containsHead":true}],["/home/lara5tar/Escritorio/chavira/editorialch/astro/src/pages/contacto.astro",{"propagation":"none","containsHead":true}],["/home/lara5tar/Escritorio/chavira/editorialch/astro/src/pages/index.astro",{"propagation":"none","containsHead":true}],["/home/lara5tar/Escritorio/chavira/editorialch/astro/src/pages/libros.astro",{"propagation":"none","containsHead":true}]],"renderers":[],"clientDirectives":[["idle","(()=>{var l=(n,t)=>{let i=async()=>{await(await n())()},e=typeof t.value==\"object\"?t.value:void 0,s={timeout:e==null?void 0:e.timeout};\"requestIdleCallback\"in window?window.requestIdleCallback(i,s):setTimeout(i,s.timeout||200)};(self.Astro||(self.Astro={})).idle=l;window.dispatchEvent(new Event(\"astro:idle\"));})();"],["load","(()=>{var e=async t=>{await(await t())()};(self.Astro||(self.Astro={})).load=e;window.dispatchEvent(new Event(\"astro:load\"));})();"],["media","(()=>{var n=(a,t)=>{let i=async()=>{await(await a())()};if(t.value){let e=matchMedia(t.value);e.matches?i():e.addEventListener(\"change\",i,{once:!0})}};(self.Astro||(self.Astro={})).media=n;window.dispatchEvent(new Event(\"astro:media\"));})();"],["only","(()=>{var e=async t=>{await(await t())()};(self.Astro||(self.Astro={})).only=e;window.dispatchEvent(new Event(\"astro:only\"));})();"],["visible","(()=>{var a=(s,i,o)=>{let r=async()=>{await(await s())()},t=typeof i.value==\"object\"?i.value:void 0,c={rootMargin:t==null?void 0:t.rootMargin},n=new IntersectionObserver(e=>{for(let l of e)if(l.isIntersecting){n.disconnect(),r();break}},c);for(let e of o.children)n.observe(e)};(self.Astro||(self.Astro={})).visible=a;window.dispatchEvent(new Event(\"astro:visible\"));})();"]],"entryModules":{"\u0000noop-middleware":"_noop-middleware.mjs","\u0000noop-actions":"_noop-actions.mjs","\u0000@astro-page:src/pages/book/[id]@_@astro":"pages/book/_id_.astro.mjs","\u0000@astro-page:src/pages/contacto@_@astro":"pages/contacto.astro.mjs","\u0000@astro-page:src/pages/libros@_@astro":"pages/libros.astro.mjs","\u0000@astro-page:src/pages/index@_@astro":"pages/index.astro.mjs","\u0000@astrojs-ssr-virtual-entry":"entry.mjs","\u0000@astro-renderers":"renderers.mjs","\u0000@astro-page:node_modules/astro/dist/assets/endpoint/node@_@js":"pages/_image.astro.mjs","\u0000@astrojs-ssr-adapter":"_@astrojs-ssr-adapter.mjs","\u0000@astrojs-manifest":"manifest_DCqyMbUn.mjs","/home/lara5tar/Escritorio/chavira/editorialch/astro/node_modules/unstorage/drivers/fs-lite.mjs":"chunks/fs-lite_COtHaKzy.mjs","/home/lara5tar/Escritorio/chavira/editorialch/astro/node_modules/astro/dist/assets/services/sharp.js":"chunks/sharp_CVgc4TTg.mjs","/home/lara5tar/Escritorio/chavira/editorialch/astro/src/components/book/Pagination.vue":"assets/Pagination.BYKIbcdo.js","@astrojs/vue/client.js":"assets/client.CoOBTPkq.js","/home/lara5tar/Escritorio/chavira/editorialch/astro/src/pages/index.astro?astro&type=script&index=0&lang.ts":"assets/index.astro_astro_type_script_index_0_lang.D2UI6GR-.js","/home/lara5tar/Escritorio/chavira/editorialch/astro/src/pages/book/[id].astro?astro&type=script&index=0&lang.ts":"assets/_id_.astro_astro_type_script_index_0_lang.RsmHwbqv.js","/home/lara5tar/Escritorio/chavira/editorialch/astro/src/pages/contacto.astro?astro&type=script&index=0&lang.ts":"assets/contacto.astro_astro_type_script_index_0_lang.Br3KKuRb.js","/home/lara5tar/Escritorio/chavira/editorialch/astro/src/pages/libros.astro?astro&type=script&index=0&lang.ts":"assets/libros.astro_astro_type_script_index_0_lang.CNkZBfAx.js","/home/lara5tar/Escritorio/chavira/editorialch/astro/src/components/navbar/index.astro?astro&type=script&index=0&lang.ts":"assets/index.astro_astro_type_script_index_0_lang.B5O6m2Gm.js","astro:scripts/before-hydration.js":""},"inlinedScripts":[["/home/lara5tar/Escritorio/chavira/editorialch/astro/src/pages/index.astro?astro&type=script&index=0&lang.ts","document.addEventListener(\"DOMContentLoaded\",function(){document.querySelectorAll('a[href^=\"#\"]').forEach(n=>{n.addEventListener(\"click\",t=>{t.preventDefault();const o=t.currentTarget.getAttribute(\"href\")||\"\",e=document.querySelector(o);if(e){const r=e.getBoundingClientRect().top+window.pageYOffset+-80;window.scrollTo({top:r,behavior:\"smooth\"})}})})});"],["/home/lara5tar/Escritorio/chavira/editorialch/astro/src/pages/book/[id].astro?astro&type=script&index=0&lang.ts","document.addEventListener(\"DOMContentLoaded\",()=>{const n=document.querySelector(\".sd-cover-image img\");n&&n.addEventListener(\"error\",a=>{const e=a.target,o=e.parentElement;if(o){const r=e.alt.replace(\"Portada de \",\"\"),t=document.createElement(\"div\");t.className=\"aspect-[2/3] bg-gradient-to-br from-blue-500 to-blue-700 rounded flex items-center justify-center p-4\",t.innerHTML=`<span class=\"text-white font-bold text-lg rotate-[-30deg]\">${r}</span>`,e.style.display=\"none\",o.prepend(t)}})});"],["/home/lara5tar/Escritorio/chavira/editorialch/astro/src/pages/contacto.astro?astro&type=script&index=0&lang.ts","document.addEventListener(\"DOMContentLoaded\",function(){const e=document.getElementById(\"subject\"),t=document.getElementById(\"manuscriptUploadField\");function n(){e&&t&&(e.value===\"manuscrito\"?t.classList.remove(\"hidden\"):t.classList.add(\"hidden\"))}const a=new URLSearchParams(window.location.search).get(\"tipo\");a===\"manuscrito\"&&e?e.value=\"manuscrito\":a===\"consulta\"&&e&&(e.value=\"consulta\"),n(),e&&e.addEventListener(\"change\",n)});"],["/home/lara5tar/Escritorio/chavira/editorialch/astro/src/pages/libros.astro?astro&type=script&index=0&lang.ts","document.addEventListener(\"DOMContentLoaded\",function(){new URLSearchParams(window.location.search).has(\"page\")&&window.scrollTo({top:0,behavior:\"smooth\"});let o=location.href;new MutationObserver(()=>{const e=location.href;e!==o&&(o=e,new URLSearchParams(location.search).has(\"page\")&&window.scrollTo({top:0,behavior:\"smooth\"}))}).observe(document,{subtree:!0,childList:!0})});"],["/home/lara5tar/Escritorio/chavira/editorialch/astro/src/components/navbar/index.astro?astro&type=script&index=0&lang.ts","document.addEventListener(\"DOMContentLoaded\",()=>{const e=document.getElementById(\"mobile-menu-button\"),t=document.getElementById(\"mobile-menu\");e&&t&&e.addEventListener(\"click\",()=>{t.classList.toggle(\"hidden\")})});"]],"assets":["/assets/site-logo-scased.Ci8HCEyg.svg","/assets/_id_.wSiQOhya.css","/favicon.svg","/assets/Pagination.BYKIbcdo.js","/assets/client.CoOBTPkq.js","/assets/runtime-dom.esm-bundler.KFVU-9QT.js","/images/no-cover.jpg","/images/site-logo-scased.svg"],"buildFormat":"directory","checkOrigin":true,"serverIslandNameMap":[],"key":"2YTRFgGzRQoJs/ymo6GvlcKoklvrq+iYMHcDrLerTTc=","sessionConfig":{"driver":"fs-lite","options":{"base":"/home/lara5tar/Escritorio/chavira/editorialch/astro/node_modules/.astro/sessions"}}});
if (manifest.sessionConfig) manifest.sessionConfig.driverModule = () => import('./chunks/fs-lite_COtHaKzy.mjs');

export { manifest };
