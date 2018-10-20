module.exports = {
  root: true,
  parser: 'babel-eslint',
  globals: {
    module: false,
    window: false,
    document: false,
    location: false,
    require: false,
    console: false,
    jQuery: false,
    __dirname: false
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
    'no-extra-semi': 0,
    'no-console': 0
  }
}
