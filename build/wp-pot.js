const wpPot = require('wp-pot')
const mkdirp = require('mkdirp')

mkdirp('languages/', err => {
  if (err) {
    console.error(err)
  }
})

wpPot({
  destFile: 'languages/modern-basic.pot',
  domain: 'modern-basic',
  package: 'Modern Basic',
  src: [
    '*.php',
    'inc/**.php',
  ],
  team: 'Toshihiro Kanai <i@miruc.co>'
})
