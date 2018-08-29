module.exports = {
  root: true,
  parser: 'babel-eslint',
  globals: {
    module: false,
    window: false,
    location: false,
    require: false
  },
  extends: ['eslint:recommended', 'prettier'],
  plugins: ['prettier'],
  rules: {
    'prettier/prettier': [
      'error',
      {
        singleQuote: true,
        semi: false,
        tabWidth: 2
      }
    ],
    'no-extra-semi': 0
  }
}
