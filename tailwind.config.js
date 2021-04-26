module.exports = {
    purge: [

        './resources/**/*.blade.php',

        './resources/**/*.js',

        './resources/**/*.vue',

    ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
        transitionProperty: {
            DEFAULT: 'padding, box-shadow,background-color, border-color, color, fill, stroke, opacity, transform',
            'spacing': 'padding',
        },
    },
  },
    variants:  {
        placeholderColor: ['hover', 'focus', 'responsive'],
        padding: ['hover', 'focus', 'responsive'],
        cursor: ['hover', 'focus', 'responsive'],
    },
  plugins: [],
}
