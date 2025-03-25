/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                'serif': ['Merriweather', 'serif'],
                'sans': ['Source Sans Pro', 'sans-serif'],
                'mono': ['Source Code Pro', 'monospace'],
            },
        },
    },
    plugins: [],
}