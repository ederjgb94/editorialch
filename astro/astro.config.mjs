// @ts-check
import { defineConfig } from 'astro/config';
import tailwindcss from "@tailwindcss/vite";

// https://astro.build/config
export default defineConfig({
  outDir: '../public/astro',

  // Cambiar a static para generar archivos estáticos
  output: 'static',

  build: {
    // Asegurarnos de que los assets también vayan a la carpeta correcta
    assets: 'assets'
  },

  vite: {
    plugins: [tailwindcss()],
  },

});