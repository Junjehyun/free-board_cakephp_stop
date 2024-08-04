/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './templates/**/*.php',
        './src/**/*.php',
        './webroot/**/*.js',
    ],
    theme: {
        extend: {
            fontFamily: {
                'gowun-dodum': ['Gowun Dodum', 'sans-serif'],
            },
        },
    },
    plugins: [],
}

