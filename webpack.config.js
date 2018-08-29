const path = require('path')
const BrowserSyncPlugin = require('browser-sync-webpack-plugin')
const MiniCssExtractPlugin = require('mini-css-extract-plugin')
const UglifyJsPlugin = require('uglifyjs-webpack-plugin')
const OptimizeCssAssetsPlugin = require('optimize-css-assets-webpack-plugin')

module.exports = (env, argv) => {
  const isDevMode = argv.mode === 'development'
  let isBrowserSyncActive = isDevMode

  let bsConfig = {}
  if (isBrowserSyncActive) {
    try {
      const bsConfigJs = require('./bs-config')

      const defaultBsConfig = {
        notify: false,
        host: 'localhost',
        port: 4000,
        logLevel: 'silent',
        files: ['assets/js/*.js', 'assets/scss/*.scss', '**/*.php']
      }
      bsConfig = { ...defaultBsConfig, ...bsConfigJs }
    } catch (e) {
      isBrowserSyncActive = false
    }
  }

  const entries = {
    'js/script': './assets/js/script.js',
    'css/style': './assets/js/style.js'
  }

  return {
    mode: 'development',
    entry: entries,
    output: {
      filename: '[name].js',
      path: path.join(__dirname, 'public/')
    },
    devtool: isDevMode ? 'source-map' : 'none',
    optimization: {
      minimizer: [
        new UglifyJsPlugin({
          cache: true,
          parallel: true,
          sourceMap: true
        }),
        new OptimizeCssAssetsPlugin({
          assetNameRegExp: /\.css$/,
          cssProcessor: require('cssnano'),
          cssProcessorPluginOptions: {
            preset: ['default', { discardComments: { removeAll: true } }]
          }
        })
      ]
    },
    plugins: [
      new MiniCssExtractPlugin({
        fileName: '[name].css'
      }),
      isDevMode && isBrowserSyncActive && new BrowserSyncPlugin(bsConfig)
    ].filter(Boolean),
    module: {
      rules: [
        {
          test: /\.js$/,
          exclude: /node_modules/,
          use: [
            {
              loader: 'babel-loader',
              options: {
                presets: [['env', { modules: false }]]
              }
            }
          ]
        },
        {
          test: /\.(sc|sa|c)ss$/,
          exclude: /node_modules/,
          use: [
            {
              loader: MiniCssExtractPlugin.loader,
              options: {
                publicPath: './public'
              }
            },
            {
              loader: 'css-loader',
              options: {
                url: false
              }
            },
            'postcss-loader',
            'sass-loader'
          ]
        }
      ]
    }
  }
}
