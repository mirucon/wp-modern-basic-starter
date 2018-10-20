/*
 |--------------------------------------------------------------------------
 | Browser-sync config file
 |--------------------------------------------------------------------------
 |
 | For up-to-date information about the options:
 |   http://www.browsersync.io/docs/options/
 |
 | There are more options than you see here, these are just the ones that are
 | set internally. See the website for more info.
 |
 */

/**
 * To use Browser Sync with Webpack, please create a new file named "bs-config.js" and set up the proxy target.
 */

module.exports = {
  proxy: {
    target: 'http://localhost:6400/'
  }
}
