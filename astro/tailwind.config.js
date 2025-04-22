/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./src/**/*.{astro,html,js,jsx,ts,tsx,vue,svelte}",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Source Sans Pro", "ui-sans-serif", "system-ui", "sans-serif", "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji"],
                serif: ["Source Serif 4 Variable", "ui-serif", "Georgia", "Cambria", "Times New Roman", "Times", "serif"],
            },
        },
    },
    plugins: [
        require('@tailwindcss/typography'),
        require('daisyui'),
    ],
    daisyui: {
        themes: ["light"],
        logs: false,
    },
};
