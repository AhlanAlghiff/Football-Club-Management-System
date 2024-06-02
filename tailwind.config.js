const withMT = require("@material-tailwind/html/utils/withMT");

/** @type {import('tailwindcss').Config} */
module.exports = withMT({
  content: ["./src/**/*.{html,js,php}"],
  theme: {
    extend: {
      colors: {
        first: '#6CABDD',
        second: '#1C2C5B',
        third: '#00529F',
        fourth: '#FEBE10',
        fifth: '#01060f',
        sixth: '#e5e5e5',
      },
      fontFamily: {
        poppins: ["Poppins", 'sans-serif'],
        mukta: ["Mukta Malar", 'sans-serif']
      },
      plugins: [
        
      ],
    },
  },
  plugins: [],
});