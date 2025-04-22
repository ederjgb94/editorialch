// @ts-check
import { defineConfig } from 'astro/config';
import tailwindcss from "@tailwindcss/vite";
import vue from '@astrojs/vue';

// https://astro.build/config
export default defineConfig({
  outDir: '../public/astro',

  // Enable server-side rendering
  output: 'server',

  build: {
    // Asegurarnos de que los assets también vayan a la carpeta correcta
    assets: 'assets'
  },

  vite: {
    plugins: [tailwindcss()],
  },

  integrations: [vue()],
});