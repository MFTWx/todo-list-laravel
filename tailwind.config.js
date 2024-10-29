/** @type {import('tailwindcss').Config} */
export default {
  content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      colors : {
        custom1 : '#222831',
        custom2 : '#393E46',
        custom3 : '#00ADB5',
        custom4 : '#EEEEEE',
      },
    },
  },
  plugins: [],
}

