const { mix } = require('laravel-mix');
const path = require('path');
let webpackPlugins = require('laravel-mix').plugins;
let SWPrecacheWebpackPlugin = require('sw-precache-webpack-plugin');
/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.webpackConfig({
  output: {
    publicPath: "/",
    chunkFilename: 'js/[name].[chunkhash].js'
  },
  resolve: {
    alias: {
      'config': 'assets/js/config',
      'lang': 'assets/js/lang',
      'plugins': 'assets/js/plugins',
      'vendor': 'assets/js/vendor',
      'dashboard': 'assets/js/dashboard',
      'home': 'assets/js/home',
      'js': 'assets/js',
    },
    modules: [
      'node_modules',
      path.resolve(__dirname, "resources")
    ]
  },

  plugins: [
    new SWPrecacheWebpackPlugin({
      cacheId: 'pwa',
      filename: 'service-worker.js',
      staticFileGlobs: ['public/**/*.{css,eot,svg,ttf,woff,woff2,js,html}'],
      minify: true,
      stripPrefix: 'public/',
      handleFetch: true,
      dynamicUrlToDependencies: {
        '/': ['resources/views/layouts/app.blade.php'],
        // '/articles': ['resources/views/article/index.blade.php']
      },
      staticFileGlobsIgnorePatterns: [/\.map$/, /mix-manifest\.json$/, /manifest\.json$/, /service-worker\.js$/],
      runtimeCaching: [
        {
          urlPattern: /^https:\/\/fonts\.googleapis\.com\//,
          handler: 'cacheFirst'
        },
        {
          urlPattern: /^https:\/\/www\.thecocktaildb\.com\/images\/media\/drink\/(\w+)\.jpg/,
          handler: 'cacheFirst'
        }
      ],
      // importScripts: ['./js/push_message.js']
    })
  ]
});

let themes = [
  'resources/assets/sass/themes/default-theme.scss',
  'resources/assets/sass/themes/gray-theme.scss',
];


themes.forEach((item) => {
  mix.sass(item, 'public/css/themes').version();
})

mix.js('resources/assets/js/app.js', 'public/js')
  .sass('resources/assets/sass/app.scss', 'public/css')
  .js('resources/assets/js/home.js', 'public/js')
  .js('resources/assets/js/main.js', 'public/js')
  .sass('resources/assets/sass/home.scss', 'public/css')
  .version();
