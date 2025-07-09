/** @type {import('tailwindcss').Config} */

export default {
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
    'node_modules/preline/dist/*.js',
  ],
  darkMode: 'class',
  theme: {
    extend: {
      fontFamily: {
        leckerli: ['"Leckerli One"', 'cursive'],
        kaffeesatz: ['"Yanone Kaffeesatz"', 'sans-serif'],
      },
      colors: {
        whiteDark: '#F0F3F4',
        digirest: '#FAC122',
        digirestDark: '#e0aa00',
        digirestClear: 'rgb(252, 235, 188)',
      },
    },
  },
  plugins: [
    require('preline/plugin'),
  ],
};