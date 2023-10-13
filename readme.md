# Blox Starter Theme
**License:** [MIT](https://opensource.org/licenses/MIT)

Gutenberg-focused WordPress starter theme.

Plugin prerequisites
* ACF Pro
* WPE Pattern Manager (Dev Only)
* SVG Support

Install dependencies → ```npm i```
* SCSS
    * sass
    * postcss, postcss-cli, cssnano, autoprefixer
* JS
    * browserify, watchify
* Watch processes (for all but SCSS) via nodemon


Processes to monitor assets (run all three) →
* SCSS compile to CSS ```npm run watch```
    * Files are in ```/scss```
    * Compile from ```/scss/main.scss```
* SCSS prefix, map, minify ```npm run autoprefix```
    * Uses ```nodemon``` and ```postcss```
* SCSS compile for blocks only ```npm run blocks```
* JS file bundling ```npm run autobundle```
    * Files are in ```/js```
    * SRC files in ```/js/src```
    * SRC files logged in ```/js/bundler.js```
    * SRC files compile to ```/js/main.js``` using ```watchify```
        * Previously used ```nodemon``` which provided continual dialogs for no reason
        * Versus ```watchify``` which has no logging whatsoever