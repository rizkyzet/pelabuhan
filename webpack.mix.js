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

mix.js("resources/js/app.js", "public/js").sass(
    "resources/sass/app.scss",
    "public/css"
);

// landing page
mix.styles(
    [
        "node_modules/bootstrap/dist/css/bootstrap.min.css",
        "resources/css/page.css"
    ],
    "public/css/landing-page.css"
).js(
    [
        "node_modules/jquery/dist/jquery.slim.min.js",
        "node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"
    ],
    "public/js/landing-page.js"
);

// auth
mix.styles(
    [
        "node_modules/bootstrap/dist/css/bootstrap.min.css",
        "resources/css/auth.css"
    ],
    "public/css/auth.css"
).js(
    [
        "node_modules/jquery/dist/jquery.slim.min.js",
        "node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"
    ],
    "public/js/auth.js"
);

// dashboard

mix.styles(["resources/coreui/css/style.css"], "public/css/dashboard.css")
    .js(
        [
            "resources/coreui/vendors/@coreui/coreui/js/coreui.bundle.min.js",
            "resources/coreui/vendors/@coreui/icons/js/svgxuse.min.js",
            "resources/js/dashboard.js"
        ],
        "public/js/dashboard.js"
    )
    .copyDirectory("resources/coreui/vendors/", "public/coreui/vendors")
    .copy("node_modules/jquery/dist/jquery.min.js", "public/js");
