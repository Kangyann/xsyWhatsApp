/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    colors: {
      'v-primary': '#6096B4',
      'v-secondary': '#7BD3EA',
      'v-accent': '#B2A4FF',
    },
    fontFamily: {
      'inter' : ['Inter']
    },
    extend: {},
  },
  plugins: [require('daisyui')],
}