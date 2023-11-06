/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./**.{php,html,js}","./template-parts/*.{php,html,js}","./blocks/*/**.{php,html,js}"],
  theme: {
    extend: {
      screens: {
        'tablet': "1300px",
      },

      fontFamily: {
        'Open-sans': ['Open-sans','sans-serif'],
        'Milkstore': ['Milkstore','sans-serif']
      },

      colors: {
        "primary": "#EB6624",
        "secondary": "#18293E",
        "text": "#18293c99",
        "text-secondary": "#ffffff99" ,
      },
      height: {
 

      },
      fontSize: {
      },
      maxWidth:{
      }
    },
  },
  plugins: []
};
