#Genesis Starter Reloaded

This is my starter theme for creating custom websites using the Genesis Framework.

Initial setup uses Bower to load front end dependencies (initially loading only Bourbon and Neat into the /vendor/ directory) and Gulp to perform automated tasks including compiling SCSS, concatenating JS, and optimizing images held within the `assets` directory.

Browsersync is also included - edit the `url` variable included at the top of Gulpfile.js to let BrowserSync know the local vhost in use, then use `gulp serve` to initialize.

When running `gulp` or `gulp serve`, changes to the `/assets/` directory will be immediately picked up and the files dealt with in the following ways:

* Changes to .scss files (including partials) will result in a `style.css` file and `style.css.map` being generated in the theme folder.
* Changes to .js files will trigger concatenation and sourcemap generation, resulting in a `theme.js` file being output inside the `/js/` directory.
* Changes to images (any format) will result in image optimization and output inside the `/images/` folder in the theme root.
