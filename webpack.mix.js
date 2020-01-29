let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your application.
 |
 */

mix
    .setPublicPath('web')
    .js('assets/js/app.js', 'web/build')
    .sass('assets/scss/app.scss', 'web/build')
    .sourceMaps()
