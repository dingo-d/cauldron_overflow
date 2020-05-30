module.exports = {
  theme: {
    container: {
      padding: {
        default: '1rem',
        sm: '2rem',
        lg: '4rem',
        xl: '5rem',
      },
    },
    screens: {
      sm: '640px',
      md: '768px',
      lg: '1024px',
      xl: '1280px',
    },
    linearGradientDirections: { // defaults to these values
      't': 'to top',
      'tr': 'to top right',
      'r': 'to right',
      'br': 'to bottom right',
      'b': 'to bottom',
      'bl': 'to bottom left',
      'l': 'to left',
      'tl': 'to top left',
    },
    linearGradientColors: { // defaults to {}
      'red': '#ED7458',
      'red-blue': ['#ED7458', '#333D51'],
      'red-green-blue': ['#ED7458', '#3D9970', '#333D51'],
      'black-white-with-stops': ['#000', '#000 45%', '#fff 55%', '#fff'],
    },
    radialGradientShapes: { // defaults to this value
      'default': 'ellipse',
    },
    radialGradientSizes: { // defaults to this value
      'default': 'closest-side',
    },
    radialGradientPositions: { // defaults to these values
      'default': 'center',
      't': 'top',
      'tr': 'top right',
      'r': 'right',
      'br': 'bottom right',
      'b': 'bottom',
      'bl': 'bottom left',
      'l': 'left',
      'tl': 'top left',
    },
    radialGradientColors: { // defaults to {}
      'red': '#ED7458',
      'red-blue': ['#ED7458', '#333D51'],
      'red-green-blue': ['#ED7458', '#3D9970', '#333D51'],
      'black-white-with-stops': ['#000', '#000 45%', '#fff 55%', '#fff'],
    },
    conicGradientStartingAngles: { // defaults to this value
      'default': '0',
    },
    conicGradientPositions: { // defaults to these values
      'default': 'center',
      't': 'top',
      'tr': 'top right',
      'r': 'right',
      'br': 'bottom right',
      'b': 'bottom',
      'bl': 'bottom left',
      'l': 'left',
      'tl': 'top left',
    },
    conicGradientColors: { // defaults to {}
      'red': '#ED7458',
      'red-blue': ['#ED7458', '#333D51'],
      'red-green-blue': ['#ED7458', '#3D9970', '#333D51'],
      'checkerboard': ['white 90deg', 'black 90deg 180deg', 'white 180deg 270deg', 'black 270deg'],
    },
    repeatingLinearGradientDirections: theme => theme('linearGradientDirections'), // defaults to this value
    repeatingLinearGradientColors: theme => theme('linearGradientColors'), // defaults to {}
    repeatingLinearGradientLengths: { // defaults to {}
      'sm': '25px',
      'md': '50px',
      'lg': '100px',
    },
    repeatingRadialGradientShapes: theme => theme('radialGradientShapes'), // defaults to this value
    repeatingRadialGradientSizes: { // defaults to this value
      'default': 'farthest-corner',
    },
    repeatingRadialGradientPositions: theme => theme('radialGradientPositions'), // defaults to this value
    repeatingRadialGradientColors: theme => theme('radialGradientColors'), // defaults to {}
    repeatingRadialGradientLengths: { // defaults to {}
      'sm': '25px',
      'md': '50px',
      'lg': '100px',
    },
    repeatingConicGradientStartingAngles: theme => theme('conicGradientStartingAngles'), // defaults to this value
    repeatingConicGradientPositions: theme => theme('conicGradientPositions'), // defaults to this value
    repeatingConicGradientColors: { // defaults to {}
      'red': '#ED7458',
      'red-blue': ['#ED7458', '#333D51'],
      'red-green-blue': ['#ED7458', '#3D9970', '#333D51'],
      'starburst': ['white 0 5deg', 'blue 5deg'],
    },
    repeatingConicGradientLengths: { // defaults to {}
      'sm': '10deg',
      'md': '20deg',
      'lg': '40deg',
    },
  },
  variants: {
    backgroundImage: ['responsive'], // this is for the "bg-none" utility
    linearGradients: ['responsive'],
    radialGradients: ['responsive'],
    conicGradients: ['responsive'],
    repeatingLinearGradients: ['responsive'],
    repeatingRadialGradients: ['responsive'],
    repeatingConicGradients: ['responsive'],
  },
  plugins: [
    require('tailwindcss-gradients'),
  ],
}
