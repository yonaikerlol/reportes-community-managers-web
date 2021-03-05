const mix = require("laravel-mix");

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

mix.js("resources/js/app.js", "public/js/dist")
    .js("resources/js/lazyload.js", "public/js/dist")
    .js("resources/js/ckeditor.js", "public/js/dist")
    .postCss("resources/css/app.css", "public/css/dist", [
        require("autoprefixer")
    ])
    .postCss("resources/css/home.css", "public/css/dist", [
        require("autoprefixer")
    ])
    .postCss("resources/css/automatic-report.css", "public/css/dist", [
        require("autoprefixer")
    ]);
