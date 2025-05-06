import { e as createComponent, f as createAstro, m as maybeRenderHead, h as addAttribute, r as renderTemplate, s as spreadAttributes, u as unescapeHTML, l as renderScript, k as renderComponent, n as renderSlot, o as renderHead } from './astro/server_WsU3f9JK.mjs';
import 'kleur/colors';
/* empty css                        */
import 'clsx';

const SITE = {
  title: "SCASED",
  description: "lorem ipsum dolor sit amet consectetur adipisicing elit"};
const NAVBAR_LINKS = [
  {
    href: "/",
    text: "Home"
  },
  {
    href: "/libros",
    text: "Libros"
  },
  {
    href: "/contacto",
    text: "Contacto"
  }
];

const $$Astro$2 = createAstro();
const $$NavBarItem = createComponent(($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$2, $$props, $$slots);
  Astro2.self = $$NavBarItem;
  const currentPath = Astro2.url.pathname;
  const { item } = Astro2.props;
  function isActive(item2, currentPath2) {
    return item2.text === "Home" && currentPath2 === "/" || item2.text === "Articles" && currentPath2.split("/")[2] !== void 0 && !Number.isNaN(Number(currentPath2.split("/")[2])) && Number(currentPath2.split("/")[2]) >= 1 || item2.text !== "Articles" && item2.text !== "Home" && currentPath2 === item2.href;
  }
  function formatHref(href) {
    return href === "/" ? "/" : `${href}`;
  }
  return renderTemplate`${maybeRenderHead()}<li> <a${addAttribute(formatHref(item.href), "href")}${addAttribute([
    "transition-colors duration-300  text-[1.1rem]  font-sans ",
    isActive(item, currentPath) ? "text-principal font-bold" : "text-gray-600"
  ], "class:list")}${addAttribute(item.text, "aria-label")}> ${item.text} </a> </li>`;
}, "/home/lara5tar/Escritorio/chavira/editorialch/astro/src/components/navbar/NavBarItem.astro", void 0);

function createSvgComponent({ meta, attributes, children }) {
  const Component = createComponent((_, props) => {
    const normalizedProps = normalizeProps(attributes, props);
    return renderTemplate`<svg${spreadAttributes(normalizedProps)}>${unescapeHTML(children)}</svg>`;
  });
  return Object.assign(Component, meta);
}
const ATTRS_TO_DROP = ["xmlns", "xmlns:xlink", "version"];
const DEFAULT_ATTRS = {};
function dropAttributes(attributes) {
  for (const attr of ATTRS_TO_DROP) {
    delete attributes[attr];
  }
  return attributes;
}
function normalizeProps(attributes, props) {
  return dropAttributes({ ...DEFAULT_ATTRS, ...attributes, ...props });
}

const logoScased = createSvgComponent({"meta":{"src":"/assets/site-logo-scased.Ci8HCEyg.svg","width":92,"height":43,"format":"svg"},"attributes":{"id":"Capa_1","x":"0px","y":"0px","viewBox":"0 0 92 43","style":"enable-background:new 0 0 92 43;","xml:space":"preserve"},"children":"\n<style type=\"text/css\">\n\t.st0{fill:#D1ECEB;}\n\t.st1{fill:#AED9DA;}\n\t.st2{fill:#81C3DB;}\n\t.st3{fill:#63ACDA;}\n\t.st4{fill:#6388C5;}\n\t.st5{fill:#4371B5;}\n\t.st6{fill:#4064AC;}\n\t.st7{fill:#305DA7;}\n\t.st8{fill:#274E9C;}\n\t.st9{fill:#223F94;}\n\t.st10{fill:#25397B;}\n\t.st11{fill:#2A2B6C;}\n\t.st12{font-family:'DFGothic-EB';}\n\t.st13{font-size:7.1446px;}\n</style>\n<path class=\"st0\" d=\"M18.1,1c1.4-0.4,1.7,0.1,0.7,0.7c-1.2,0.7-2.7,0.9-2.1,0.2C16.9,1.6,17.5,1.2,18.1,1\" />\n<path class=\"st0\" d=\"M17.8,2.6c1.5-0.5,1.8,0.1,0.8,0.8c-1.1,0.8-2.7,1.1-2.2,0.2C16.6,3.3,17.1,2.8,17.8,2.6\" />\n<path class=\"st0\" d=\"M17.7,4.5c1.4-0.6,1.8,0.1,1.1,0.9c-0.9,1-2.5,1.4-2.3,0.5C16.5,5.4,17,4.8,17.7,4.5\" />\n<path class=\"st1\" d=\"M14.5,2.5c1.2-0.6,1.4-0.1,0.6,0.6c-1,1-2.4,1.5-2,0.6C13.3,3.4,13.9,2.9,14.5,2.5\" />\n<path class=\"st1\" d=\"M14.1,4.4c1.2-0.8,1.6-0.2,0.9,0.7c-0.9,1.1-2.3,1.8-2.1,0.7C12.9,5.5,13.5,4.8,14.1,4.4\" />\n<path class=\"st1\" d=\"M14.1,6.6c1.2-0.9,1.7-0.2,1.1,0.8c-0.7,1.2-2.1,1.9-2.1,0.8C13.1,7.8,13.6,7.1,14.1,6.6\" />\n<path class=\"st2\" d=\"M11.2,4.6c1.1-0.8,1.2-0.2,0.5,0.7C10.8,6.6,9.6,7.3,10,6.2C10.2,5.7,10.7,5.1,11.2,4.6\" />\n<path class=\"st2\" d=\"M10.9,6.9c1-0.9,1.4-0.3,0.8,0.8c-0.7,1.4-1.9,2.1-1.8,1C10,8.2,10.4,7.4,10.9,6.9\" />\n<path class=\"st2\" d=\"M11.2,9.4c0.9-1,1.5-0.4,1.2,0.7c-0.3,1.4-1.5,2.4-1.8,1.3C10.4,10.9,10.7,10,11.2,9.4\" />\n<path class=\"st3\" d=\"M8.4,7.2c0.9-0.9,1-0.2,0.4,0.9c-0.7,1.4-1.6,2.1-1.4,1C7.5,8.6,8,7.7,8.4,7.2\" />\n<path class=\"st3\" d=\"M8.3,9.9c0.8-1,1.2-0.4,0.9,0.7c-0.4,1.5-1.4,2.6-1.5,1.4C7.5,11.4,7.8,10.5,8.3,9.9\" />\n<path class=\"st3\" d=\"M8.9,12.7c0.7-1.1,1.3-0.5,1.3,0.6c0,1.5-1,2.6-1.5,1.5C8.4,14.3,8.5,13.3,8.9,12.7\" />\n<path class=\"st4\" d=\"M6.2,10C6.9,9.1,7,9.8,6.7,11c-0.4,1.5-1.2,2.5-1.2,1.3C5.5,11.7,5.8,10.6,6.2,10\" />\n<path class=\"st4\" d=\"M6.3,13.2c0.6-1.1,1-0.4,0.9,0.9c-0.1,1.5-0.8,2.7-1.2,1.5C5.8,14.9,5.9,13.8,6.3,13.2\" />\n<path class=\"st4\" d=\"M7.3,16.2c0.5-1.2,1.2-0.6,1.3,0.6c0.2,1.5-0.5,2.8-1.2,1.6C7.1,17.9,7,16.9,7.3,16.2\" />\n<path class=\"st5\" d=\"M4.6,13C5,12,5.2,12.9,5,14.2c-0.2,1.6-0.7,2.5-0.9,1.2C4.1,14.7,4.3,13.6,4.6,13\" />\n<path class=\"st5\" d=\"M4.9,16.5c0.4-1,0.8-0.4,0.9,0.9C6.1,19,5.5,20.3,5,19C4.7,18.3,4.7,17.2,4.9,16.5\" />\n<path class=\"st5\" d=\"M6.3,19.8c0.2-1.1,1-0.6,1.4,0.5c0.6,1.5,0.1,2.9-0.8,1.9C6.4,21.6,6.2,20.5,6.3,19.8\" />\n<path class=\"st6\" d=\"M3.5,15.9c0.3-0.8,0.4,0,0.5,1.3c0,1.7-0.3,2.6-0.6,1.3C3.3,17.7,3.3,16.5,3.5,15.9\" />\n<path class=\"st6\" d=\"M4.2,19.7c0.2-0.9,0.7-0.2,1,1.1c0.4,1.6,0.1,2.7-0.5,1.6C4.3,21.7,4.1,20.4,4.2,19.7\" />\n<path class=\"st6\" d=\"M5.9,23.3c0.1-1,0.9-0.5,1.4,0.7C8.1,25.4,8,26.7,7,25.8C6.4,25.2,5.9,24,5.9,23.3\" />\n<path class=\"st7\" d=\"M2.9,18.5c0.1-0.7,0.3,0.3,0.5,1.6c0.2,1.7,0,2.4-0.3,1C2.9,20.2,2.8,19,2.9,18.5\" />\n<path class=\"st7\" d=\"M3.9,22.7c0-0.8,0.6,0.1,1.1,1.4c0.6,1.6,0.5,2.5-0.3,1.2C4.2,24.5,3.9,23.3,3.9,22.7\" />\n<path class=\"st7\" d=\"M4.2,10.4c0.2-0.5-0.2,0.4-0.6,1.5c-0.5,1.4-0.6,1.9-0.3,0.8C3.6,12,4.1,10.9,4.2,10.4\" />\n<path class=\"st7\" d=\"M3.1,14.3c0.2-0.6,0.1,0.4-0.1,1.7c-0.2,1.6-0.3,2.2-0.3,0.9C2.7,16,2.9,14.8,3.1,14.3\" />\n<path class=\"st7\" d=\"M6.1,26.5c-0.1-0.9,0.8-0.2,1.6,0.9c1,1.4,0.9,2.5-0.2,1.5C6.7,28.3,6.1,27.1,6.1,26.5\" />\n<path class=\"st7\" d=\"M9.2,29.5c-0.2-1,0.9-0.7,1.9,0.2c1.3,1.2,1.4,2.4,0,1.8C10.3,31.1,9.4,30.2,9.2,29.5\" />\n<path class=\"st8\" d=\"M2.7,20.7c0-0.6,0.3,0.6,0.5,1.9c0.4,1.6,0.3,2.1-0.1,0.8C2.9,22.4,2.7,21.1,2.7,20.7\" />\n<path class=\"st8\" d=\"M4,25.1c-0.1-0.6,0.6,0.4,1.2,1.7C6,28.4,5.9,28.9,5,27.6C4.5,26.7,4.1,25.6,4,25.1\" />\n<path class=\"st8\" d=\"M2.7,16.2c0.1-0.5-0.1,0.7-0.1,1.9c0,1.6-0.1,2-0.1,0.6C2.5,17.9,2.6,16.6,2.7,16.2\" />\n<path class=\"st8\" d=\"M6.5,29.1c-0.1-0.7,0.8,0.1,1.6,1c1.2,1.4,1.3,2.3,0.1,1.3C7.4,30.8,6.6,29.7,6.5,29.1\" />\n<path class=\"st9\" d=\"M2.9,22.3c-0.1-0.4,0.2,0.9,0.5,2c0.5,1.6,0.6,2,0.2,0.6C3.2,24,2.9,22.7,2.9,22.3\" />\n<path class=\"st9\" d=\"M4.4,26.9c-0.1-0.4,0.6,0.8,1.2,1.8c0.9,1.5,1,1.9,0.1,0.6C5,28.4,4.5,27.2,4.4,26.9\" />\n<path class=\"st10\" d=\"M4.8,27.9C4.7,27.8,5.4,29,6.1,30c0.9,1.3,1,1.4,0.2,0.1C5.6,29.2,5,28,4.8,27.9\" />\n<path class=\"st9\" d=\"M7.1,31c-0.2-0.4,0.9,0.5,1.7,1.4c1.3,1.3,1.3,1.8,0.1,0.7C8.1,32.4,7.2,31.4,7.1,31\" />\n<path class=\"st8\" d=\"M10.1,32.3c-0.2-0.7,0.8-0.4,1.9,0.4c1.6,1.1,1.8,2.2,0.2,1.4C11.2,33.7,10.3,32.8,10.1,32.3\" />\n<path class=\"st7\" d=\"M13.1,31.3c-0.3-1,0.8-1.2,1.9-0.6c1.5,0.8,1.7,2.3,0.1,2.1C14.3,32.7,13.4,32,13.1,31.3\" />\n<path class=\"st0\" d=\"M4.9,20.9c-0.3,1.1,0.1,2.9,0.5,2.9c0.4-0.1,0.4-2.2,0-3C5.3,20.4,5.1,20.5,4.9,20.9\" />\n<path class=\"st0\" d=\"M6,24.2c-0.1,1.3,0.7,3,1,2.8c0.5-0.2,0.1-2.5-0.5-3.2C6.3,23.6,6,23.7,6,24.2\" />\n<path class=\"st0\" d=\"M7.7,27.3c0.1,1.3,1.2,2.8,1.6,2.7c0.5-0.2-0.2-2.5-1-3.2C8,26.5,7.7,26.7,7.7,27.3\" />\n<path class=\"st1\" d=\"M6.1,18.1c-0.5,1.1-0.4,2.6,0.1,2.6c0.6,0,1-2,0.7-2.8C6.7,17.6,6.4,17.6,6.1,18.1\" />\n<path class=\"st1\" d=\"M6.8,21c-0.5,1.2,0,2.8,0.5,2.6c0.6-0.2,0.8-2.4,0.3-3C7.4,20.3,7.1,20.4,6.8,21\" />\n<path class=\"st1\" d=\"M8.1,23.7c-0.3,1.4,0.5,2.9,0.9,2.6C9.7,25.8,9.6,23.6,9,23C8.7,22.8,8.3,23,8.1,23.7\" />\n<path class=\"st2\" d=\"M8,15.5c-0.8,0.9-0.8,2.3-0.2,2.2c0.7-0.1,1.6-1.8,1.2-2.4C8.8,15,8.4,15,8,15.5\" />\n<path class=\"st2\" d=\"M8.6,17.9c-0.8,1.1-0.5,2.5,0.1,2.3c0.8-0.3,1.5-2.1,1-2.6C9.4,17.2,9,17.4,8.6,17.9\" />\n<path class=\"st2\" d=\"M9.6,20.1C9,21.3,9.4,22.5,10,22.3c0.8-0.3,1.5-2.3,0.9-2.8C10.6,19.2,10,19.4,9.6,20.1\" />\n<path class=\"st3\" d=\"M10.5,13.3c-1,0.7-1,1.9-0.4,1.8c0.8,0,1.9-1.2,1.6-1.8C11.5,13,11,12.9,10.5,13.3\" />\n<path class=\"st3\" d=\"M11.1,15.3c-1,0.8-0.9,1.9-0.2,1.8c1-0.1,2.1-1.4,1.6-1.9C12.3,14.9,11.7,14.9,11.1,15.3\" />\n<path class=\"st3\" d=\"M12.2,17.1c-1,0.9-0.8,1.9,0,1.7c1.1-0.2,2.2-1.5,1.5-2C13.4,16.6,12.7,16.7,12.2,17.1\" />\n<path class=\"st4\" d=\"M13.4,11.8c-1,0.4-1.1,1.3-0.5,1.5c0.9,0.2,2.1-0.5,1.8-1.1C14.6,11.8,14,11.6,13.4,11.8\" />\n<path class=\"st4\" d=\"M14.2,13.7c-1.1,0.4-1,1.3-0.3,1.4c1,0.1,2.2-0.5,1.8-1.1C15.5,13.6,14.8,13.4,14.2,13.7\" />\n<path class=\"st4\" d=\"M15.3,15.4c-1.1,0.4-1,1.2-0.1,1.3c1.2,0.1,2.4-0.5,1.7-1C16.7,15.3,15.9,15.2,15.3,15.4\" />\n<path class=\"st5\" d=\"M16.4,11.2c-1,0.1-1.1,0.9-0.4,1.2c0.9,0.4,2,0.2,1.7-0.5C17.5,11.5,16.9,11.1,16.4,11.2\" />\n<path class=\"st5\" d=\"M17.2,13.1c-0.9,0-1,0.7-0.2,1.1c1,0.5,2.1,0.4,1.7-0.3C18.4,13.5,17.8,13.1,17.2,13.1\" />\n<path class=\"st5\" d=\"M18.5,15c-0.9-0.1-0.8,0.6,0,0.9c1.1,0.5,2.2,0.7,1.6,0C19.7,15.5,19.1,15,18.5,15\" />\n<path class=\"st6\" d=\"M19.1,11.3c-0.8-0.1-0.9,0.6-0.3,1.1c0.8,0.7,1.6,0.8,1.5,0C20.1,12,19.6,11.4,19.1,11.3\" />\n<path class=\"st6\" d=\"M19.9,13.5c-0.8-0.2-0.7,0.4-0.1,1c0.8,0.8,1.5,1.1,1.3,0.3C20.9,14.3,20.4,13.7,19.9,13.5\" />\n<path class=\"st6\" d=\"M21,15.7c-0.6-0.4-0.5,0.2,0.2,0.9c0.9,0.8,1.3,1.4,1,0.6C21.9,16.7,21.4,16,21,15.7\" />\n<path class=\"st7\" d=\"M21.3,12c-0.6-0.3-0.7,0.4-0.3,1.1c0.6,0.9,1.1,1.1,1.1,0.3C22,12.9,21.7,12.2,21.3,12\" />\n<path class=\"st7\" d=\"M21.8,14.5c-0.5-0.4-0.5,0.3-0.1,1.1c0.5,1,0.8,1.4,0.7,0.5C22.4,15.5,22.1,14.8,21.8,14.5\" />\n<path class=\"st7\" d=\"M20.6,7.7c-0.7-0.1-0.9,0.5-0.5,1c0.5,0.6,1.4,0.8,1.4,0.1C21.5,8.3,21.1,7.8,20.6,7.7\" />\n<path class=\"st7\" d=\"M20.9,9.7c-0.7-0.2-0.9,0.5-0.4,1.1c0.5,0.7,1.3,0.9,1.3,0.2C21.8,10.5,21.4,9.9,20.9,9.7\" />\n<path class=\"st7\" d=\"M22.4,17.2c-0.3-0.5-0.1,0.2,0.2,1c0.1,0.4,0-0.9,0.1,0C22.7,18.3,22.6,17.5,22.4,17.2\" />\n<path class=\"st7\" d=\"M22.4,17.2c0,0.6-0.3,0-0.6-0.9c-0.3-1.2,0.3-1.9,0.5-1C22.4,15.9,22.4,16.8,22.4,17.2\" />\n<path class=\"st8\" d=\"M22.9,13c-0.4-0.3-0.6,0.4-0.3,1.2c0.3,1,0.6,1.2,0.7,0.4C23.4,14.1,23.2,13.3,22.9,13\" />\n<path class=\"st8\" d=\"M22.9,15.8c-0.2-0.4-0.3,0.4-0.2,1.2c0.1,1.1,0.1,1.3,0.3,0.3C23.1,16.8,23.1,16,22.9,15.8\" />\n<path class=\"st8\" d=\"M22.9,10.5c-0.6-0.3-0.7,0.4-0.4,1.1c0.4,0.8,0.9,1.1,1,0.3C23.5,11.5,23.3,10.7,22.9,10.5\" />\n<path class=\"st8\" d=\"M22.8,18.5c0,0.2-0.1-0.4,0-1.2c0-1.1,0.6-1.5,0.4-0.6C23,17.4,22.8,18.2,22.8,18.5\" />\n<path class=\"st9\" d=\"M24.1,14.1c-0.3-0.3-0.5,0.5-0.5,1.1c0,1,0.1,1.2,0.4,0.5C24.2,15.2,24.3,14.4,24.1,14.1\" />\n<path class=\"st9\" d=\"M23.4,16.8c-0.1-0.3-0.3,0.6-0.5,1.2c0,0-0.2,0.6,0,0.3C23.2,17.8,23.4,17.1,23.4,16.8\" />\n<path class=\"st10\" d=\"M23.5,17.5c0-0.1-0.8,1.1-0.6,0.9c0.5-0.8,0.7-0.7,0.1,0C22.9,18.5,23.5,17.7,23.5,17.5\" />\n<path class=\"st9\" d=\"M23.2,17.5c-0.2,0.2,0-0.7,0.3-1.3c0.5-1,1.1-0.9,0.6,0C23.8,16.8,23.4,17.4,23.2,17.5\" />\n<path class=\"st8\" d=\"M23.1,15.5c-0.4,0.3-0.5-0.3-0.3-1.2c0.3-1.3,1.4-1.5,1.2-0.4C23.7,14.5,23.3,15.2,23.1,15.5\" />\n<path class=\"st7\" d=\"M21.6,14.4c-0.4,0.7-0.8,0.3-0.9-0.7c-0.2-1.4,1.2-2.3,1.3-1.2C22,13.1,21.8,13.9,21.6,14.4\" />\n<path class=\"st0\" d=\"M29.6,16c-0.8,0.2-1.6,1-1.3,1.3c0.3,0.3,1.7-0.2,1.8-0.9C30.1,16.1,29.9,15.9,29.6,16\" />\n<path class=\"st0\" d=\"M28.3,17.8c-0.9,0-1.9,0.5-1.7,0.7c0.3,0.3,1.9,0.2,2.2-0.3C28.8,18,28.7,17.8,28.3,17.8\" />\n<path class=\"st0\" d=\"M26.4,18.9c-1-0.2-2.1-0.1-2,0c0.1,0.2,1.9,0.7,2.4,0.4C27.1,19.2,26.9,19,26.4,18.9\" />\n<path class=\"st1\" d=\"M31.7,15.6c-0.8,0.2-1.4,1.1-1.1,1.5c0.3,0.5,1.7,0,1.7-0.9C32.4,15.8,32.1,15.5,31.7,15.6\" />\n<path class=\"st1\" d=\"M30.7,17.9c-0.9,0-1.8,0.6-1.6,1c0.2,0.5,1.9,0.4,2.2-0.4C31.4,18.2,31.2,17.9,30.7,17.9\" />\n<path class=\"st1\" d=\"M29.2,19.6c-1-0.2-2.1,0-1.9,0.4c0.2,0.5,2,0.9,2.4,0.3C29.8,20,29.6,19.7,29.2,19.6\" />\n<path class=\"st2\" d=\"M33.8,15.1c-0.8,0.3-1.2,1.4-0.9,1.9c0.4,0.6,1.7-0.2,1.6-1.2C34.5,15.2,34.2,15,33.8,15.1\" />\n<path class=\"st2\" d=\"M33.3,17.9c-0.9,0.1-1.7,0.9-1.4,1.5c0.3,0.7,1.9,0.3,2.1-0.7C34,18.2,33.7,17.9,33.3,17.9\" />\n<path class=\"st2\" d=\"M32,20.3c-1-0.2-2,0.3-1.9,0.8c0.1,0.7,1.9,1,2.4,0.2C32.7,20.8,32.5,20.4,32,20.3\" />\n<path class=\"st3\" d=\"M35.8,14.3c-0.7,0.4-0.9,1.7-0.5,2.2c0.5,0.7,1.5-0.3,1.3-1.5C36.5,14.5,36.2,14.1,35.8,14.3\" />\n<path class=\"st3\" d=\"M35.8,17.6c-0.8,0.2-1.4,1.3-1.2,1.9c0.3,0.8,1.8,0.2,1.9-1C36.5,17.9,36.2,17.5,35.8,17.6\" />\n<path class=\"st3\" d=\"M34.8,20.7c-1,0-1.9,0.8-1.8,1.4c0.2,0.9,1.9,0.8,2.4-0.4C35.6,21.2,35.3,20.8,34.8,20.7\" />\n<path class=\"st4\" d=\"M37.5,13.2c-0.5,0.5-0.5,1.9-0.1,2.5c0.5,0.7,1.3-0.4,1-1.7C38.2,13.2,37.8,12.9,37.5,13.2\" />\n<path class=\"st4\" d=\"M38,16.8c-0.7,0.4-1.1,1.8-0.8,2.5c0.4,0.8,1.6-0.1,1.6-1.5C38.7,17.1,38.4,16.6,38,16.8\" />\n<path class=\"st4\" d=\"M37.5,20.6c-0.9,0.3-1.7,1.4-1.6,2.2c0.2,1,1.9,0.2,2.2-1.1C38.3,20.9,38,20.5,37.5,20.6\" />\n<path class=\"st5\" d=\"M38.7,11.5c-0.3,0.7,0,2.2,0.4,2.8c0.5,0.7,0.9-0.8,0.4-2.1C39.2,11.4,38.8,11.1,38.7,11.5\" />\n<path class=\"st5\" d=\"M39.7,15.4c-0.5,0.7-0.6,2.2-0.4,2.8c0.4,1,1.3-0.5,1.1-2C40.4,15.3,40,15,39.7,15.4\" />\n<path class=\"st5\" d=\"M39.9,19.5c-0.7,0.6-1.3,2-1.2,2.8c0.2,1,1.6-0.2,1.8-1.8C40.6,19.6,40.3,19.2,39.9,19.5\" />\n<path class=\"st6\" d=\"M39.1,9.4c0,0.8,0.5,2.3,0.9,2.8c0.5,0.7,0.6-0.9-0.1-2.3C39.5,9.1,39.1,8.9,39.1,9.4\" />\n<path class=\"st6\" d=\"M40.8,13.2c-0.2,0.9,0,2.5,0.3,3.1c0.4,0.8,0.8-0.9,0.4-2.5C41.2,12.9,40.9,12.6,40.8,13.2\" />\n<path class=\"st6\" d=\"M41.6,17.4c-0.4,0.9-0.7,2.6-0.5,3.3c0.2,0.9,1.1-0.9,1.1-2.5C42.1,17.2,41.9,16.9,41.6,17.4\" />\n<path class=\"st7\" d=\"M38.6,7c0.3,0.9,1.1,2.3,1.5,2.7c0.5,0.5-0.1-1.2-0.9-2.4C38.7,6.6,38.4,6.4,38.6,7\" />\n<path class=\"st7\" d=\"M40.8,10.4c0.2,1,0.7,2.7,0.9,3.2c0.4,0.6,0.1-1.4-0.5-2.8C40.9,9.9,40.7,9.7,40.8,10.4\" />\n<path class=\"st7\" d=\"M33,2.1c0.5,0.5,1.6,1.4,2.1,1.7c0.6,0.3-0.2-0.8-1.2-1.5C33.1,1.8,32.7,1.7,33,2.1\" />\n<path class=\"st7\" d=\"M36,4.2c0.4,0.7,1.4,1.9,1.9,2.2c0.6,0.4-0.1-0.9-1.1-1.9C36.1,3.9,35.7,3.7,36,4.2\" />\n<path class=\"st7\" d=\"M42.2,14.4c0,1.2,0.1,3,0.3,3.5c0.2,0.6,0.4-1.6,0.1-3.2C42.4,13.7,42.2,13.6,42.2,14.4\" />\n<path class=\"st7\" d=\"M42.8,18.7c-0.2,1.3-0.6,3.2-0.6,3.7c0.1,0.6,0.7-1.7,0.8-3.4C43,18,42.9,17.9,42.8,18.7\" />\n<path class=\"st8\" d=\"M37.2,4.5c0.7,0.8,1.7,2.2,2,2.4c0.3,0.3-0.7-1.2-1.6-2.2C36.8,4,36.7,3.9,37.2,4.5\" />\n<path class=\"st8\" d=\"M39.6,7.3c0.6,1,1.4,2.6,1.6,2.9C41.4,10.6,40.4,8.6,39.6,7.3C39.2,6.7,39.2,6.6,39.6,7.3\" />\n<path class=\"st8\" d=\"M34.4,2.2c0.7,0.6,1.8,1.7,2.2,1.9c0.4,0.3-0.7-1-1.7-1.7C34.1,1.9,33.9,1.8,34.4,2.2\" />\n<path class=\"st8\" d=\"M41.4,10.7c0.5,1.3,1,3,1.1,3.4c0.2,0.6-0.5-1.7-1.1-3.2C41,9.9,41.1,9.8,41.4,10.7\" />\n<path class=\"st9\" d=\"M34.7,2.2c1,0.7,2.1,1.7,2.3,1.9c0.3,0.3-1.1-0.9-2.2-1.7C33.9,1.8,33.9,1.7,34.7,2.2\" />\n<path class=\"st9\" d=\"M37.1,4.4c1.1,0.9,2,2.2,2.1,2.4c0.2,0.4-1.4-1.3-2.3-2.3C36.2,3.8,36.4,3.8,37.1,4.4\" />\n<path class=\"st10\" d=\"M33.5,2.2c1.2,0.6,2.3,1.6,2.3,1.7c0,0.3-1.9-0.7-2.8-1.5C32.3,1.9,32.6,1.7,33.5,2.2\" />\n<path class=\"st9\" d=\"M39.1,7c1.1,1.2,1.8,2.6,1.8,2.9c0,0.4-1.5-1.7-2.3-2.9C38.1,6.3,38.4,6.3,39.1,7\" />\n<path class=\"st8\" d=\"M42.6,14.5c0.4,1.4,0.4,3.3,0.4,3.7c0,0.6-0.3-2.2-0.6-3.8C42.2,13.5,42.4,13.5,42.6,14.5\" />\n<path class=\"st7\" d=\"M42.3,23.2c-0.5,1.4-1.4,3.2-1.5,3.7c-0.1,0.6,1.2-2,1.6-3.7C42.7,22.4,42.7,22.4,42.3,23.2\" />\n<text transform=\"matrix(1 0 0 1 12.6116 40.8594)\" class=\"st11 st12 st13\">ScAsEd</text>\n"});

const $$Index$1 = createComponent(($$result, $$props, $$slots) => {
  return renderTemplate`${maybeRenderHead()}<nav class="container mx-auto relative"> <div class="flex items-center justify-between md:justify-around py-4"> <div class="w-48 md:w-64 py-2 md:py-5"> <a href="/" class="flex items-center"> <img${addAttribute(logoScased.src, "src")} alt="SCASED Logo" class="h-12 md:h-20"> </a> </div> <!-- Menú hamburguesa para móviles --> <button id="mobile-menu-button" class="md:hidden px-2 py-1"> <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path> </svg> </button> <!-- Menú para escritorio (siempre visible en md+) --> <div class="hidden md:flex md:flex-1 md:justify-center"> <ul class="menu menu-horizontal px-1 flex gap-4 md:gap-8"> ${NAVBAR_LINKS.map((item) => renderTemplate`${renderComponent($$result, "NavbarItem", $$NavBarItem, { "item": item })}`)} </ul> </div> <div class="hidden md:block md:w-64">  </div> </div> <!-- Menú móvil desplegable (oculto por defecto) --> <div id="mobile-menu" class="hidden absolute w-full bg-white shadow-md py-4 px-6 z-50"> <ul class="flex flex-col gap-4"> ${NAVBAR_LINKS.map((item) => renderTemplate`<li> <a${addAttribute(item.href, "href")}${addAttribute(item.target ?? "_self", "target")} class="block py-2 hover:text-blue-600"> ${item.text} </a> </li>`)} </ul> </div> </nav> ${renderScript($$result, "/home/lara5tar/Escritorio/chavira/editorialch/astro/src/components/navbar/index.astro?astro&type=script&index=0&lang.ts")}`;
}, "/home/lara5tar/Escritorio/chavira/editorialch/astro/src/components/navbar/index.astro", void 0);

const $$Astro$1 = createAstro();
const $$Hashtag = createComponent(($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro$1, $$props, $$slots);
  Astro2.self = $$Hashtag;
  const { width = "20", height = "20", size } = Astro2.props;
  return renderTemplate`${maybeRenderHead()}<svg${addAttribute(size ? size : width, "width")}${addAttribute(size ? size : height, "height")} viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd" class="fill-current"> <path d="M22.672 15.226l-2.432.811.841 2.515c.33 1.019-.209 2.127-1.23 2.456-1.15.325-2.148-.321-2.463-1.226l-.84-2.518-5.013 1.677.84 2.517c.391 1.203-.434 2.542-1.831 2.542-.88 0-1.601-.564-1.86-1.314l-.842-2.516-2.431.809c-1.135.328-2.145-.317-2.463-1.229-.329-1.018.211-2.127 1.231-2.456l2.432-.809-1.621-4.823-2.432.808c-1.355.384-2.558-.59-2.558-1.839 0-.817.509-1.582 1.327-1.846l2.433-.809-.842-2.515c-.33-1.02.211-2.129 1.232-2.458 1.02-.329 2.13.209 2.461 1.229l.842 2.515 5.011-1.677-.839-2.517c-.403-1.238.484-2.553 1.843-2.553.819 0 1.585.509 1.85 1.326l.841 2.517 2.431-.81c1.02-.33 2.131.211 2.461 1.229.332 1.018-.21 2.126-1.23 2.456l-2.433.809 1.622 4.823 2.433-.809c1.242-.401 2.557.484 2.557 1.838 0 .819-.51 1.583-1.328 1.847m-8.992-6.428l-5.01 1.675 1.619 4.828 5.011-1.674-1.62-4.829z"></path> </svg>`;
}, "/home/lara5tar/Escritorio/chavira/editorialch/astro/src/assets/svg/hashtag.astro", void 0);

const $$Index = createComponent(($$result, $$props, $$slots) => {
  return renderTemplate`${maybeRenderHead()}<footer class="text-negro py-8 mt-auto border-t border-gray-200"> <!-- <div class="h-[1px] bg-principal/20 w-full mb-10"></div> --> <div class="container mx-auto px-4 sm:px-6 lg:px-8"> <div class="flex flex-col gap-6"> <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8"> <!-- Información del sitio --> <div> <div class="flex items-center gap-2 mb-4"> ${renderComponent($$result, "Hashtag", $$Hashtag, {})} <h3 class="text-xl font-bold">${SITE["title"]}</h3> </div> <p class="text-negro mb-4"> ${SITE["description"]} </p> <p class="text-sm text-negro">
© ${(/* @__PURE__ */ new Date()).getFullYear()} ScAsEd. Todos los derechos
                        reservados.
</p> </div> <!-- Enlaces rápidos --> <div> <h3 class="text-lg font-semibold mb-4">Enlaces rápidos</h3> <nav class="grid grid-cols-1 sm:grid-cols-1 gap-2"> ${NAVBAR_LINKS.map(({ href, text, target }) => renderTemplate`<a${addAttribute(href, "href")} class="hover:text-principal transition-colors"${addAttribute(target ?? "_self", "target")}> ${text} </a>`)} </nav> </div> <!-- Contacto --> <div> <h3 class="text-lg font-semibold mb-4">Contacto</h3> <address class="not-italic text-negro"> <p class="mb-2">Universidad Autónoma de Chavira</p> <p class="mb-2">Ciudad Universitaria, México</p> <p class="mb-4">CP 12345</p> <p class="flex items-center gap-2 mb-2"> <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path> </svg> <a href="mailto:contacto@editorialchavira.edu.mx" class="hover:text-principal transition-colors">contacto@editorialchavira.edu.mx</a> </p> <p class="flex items-center gap-2"> <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-5 h-5"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path> </svg> <a href="tel:+525555123456" class="hover:text-principal transition-colors">+52 (55) 5512 3456</a> </p> </address> </div> </div> <!-- Redes sociales
            <div class="border-t border-negro pt-6">
                <div class="flex flex-wrap justify-center gap-6">
                    <a
                        href="#"
                        class="text-negro hover:text-[#847c74] transition-colors"
                    >
                        <span class="sr-only">Facebook</span>
                        <svg
                            class="h-6 w-6"
                            fill="currentColor"
                            viewBox="0 0 24 24"
                            aria-hidden="true"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </a>
                    <a
                        href="#"
                        class="text-negro hover:text-[#847c74] transition-colors"
                    >
                        <span class="sr-only">Twitter</span>
                        <svg
                            class="h-6 w-6"
                            fill="currentColor"
                            viewBox="0 0 24 24"
                            aria-hidden="true"
                        >
                            <path
                                d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"
                            ></path>
                        </svg>
                    </a>
                    <a
                        href="#"
                        class="text-negro hover:text-[#847c74] transition-colors"
                    >
                        <span class="sr-only">Instagram</span>
                        <svg
                            class="h-6 w-6"
                            fill="currentColor"
                            viewBox="0 0 24 24"
                            aria-hidden="true"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </a>
                </div>
            </div> --> </div> </div> </footer>`;
}, "/home/lara5tar/Escritorio/chavira/editorialch/astro/src/components/footer/index.astro", void 0);

const $$Astro = createAstro();
const $$BaseLayout = createComponent(($$result, $$props, $$slots) => {
  const Astro2 = $$result.createAstro($$Astro, $$props, $$slots);
  Astro2.self = $$BaseLayout;
  const { title } = Astro2.props;
  return renderTemplate`<html lang="es"> <head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><meta name="description" content="Editorial Chavira - Publicaciones académicas"><title>${title}</title><link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700;900&display=swap" rel="stylesheet">${renderSlot($$result, $$slots["head"])}${renderHead()}</head> <body class="font-sansflex flex-col"> <div class="flex-grow w-full"> ${renderComponent($$result, "NavBar", $$Index$1, {})} <main> ${renderSlot($$result, $$slots["default"])} </main> </div> ${renderComponent($$result, "Footer", $$Index, {})} </body></html>`;
}, "/home/lara5tar/Escritorio/chavira/editorialch/astro/src/layouts/BaseLayout.astro", void 0);

export { $$BaseLayout as $ };
