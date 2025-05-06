// @ts-check
import { defineConfig } from 'astro/config';
import tailwindcss from "@tailwindcss/vite";
import vue from '@astrojs/vue';
import node from '@astrojs/node';

// https://astro.build/config
export default defineConfig({
  outDir: '../public/astro',

  // Enable server-side rendering
  output: 'server',
  adapter: node({
    mode: 'standalone'
  }),

  build: {
    // Asegurarnos de que los assets también vayan a la carpeta correcta
    assets: 'assets'
  },

  vite: {
    plugins: [tailwindcss()],
  },

  integrations: [vue()],
});


// // @ts-check
// import { defineConfig } from 'astro/config';
// import vue from '@astrojs/vue';
// import node from '@astrojs/node';

// // https://astro.build/config
// export default defineConfig({
//   outDir: '../public/astro',

//   // Enable server-side rendering
//   output: 'server',
//   adapter: node({
//     mode: 'standalone'
//   }),

//   integrations: [vue()],
// });