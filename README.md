#Genesis Starter Reloaded

This is my starter theme for creating custom websites using the Genesis Framework.

Initial setup uses Bower to load front end dependencies (initially loading only Bourbon and Neat into the /vendor/ directory) and Gulp to perform automated tasks including compiling SCSS, concatenating JS, and optimizing images held within the `/assets/` directory.

Browsersync is also included - edit the `url` variable included at the top of `Gulpfile.js` to let BrowserSync know the local vhost in use, then use `gulp serve` to initialize.

When running `gulp` or `gulp serve`, changes to the `/assets/` directory will be immediately picked up and the files dealt with in the following ways:

* Changes to .scss files (including partials) will result in a `style.css` file and `style.css.map` being generated in the theme folder.
* Changes to .js files will trigger concatenation and sourcemap generation, resulting in a `theme.js` file being output inside the `/js/` directory.
* Changes to images (any format) will result in image optimization and output inside the `/images/` folder in the theme root.

## Installation

Clone the repository to your WordPress `/themes/` directory. It won't work straight out of the box, because there's no compiled  stylesheet held within the theme. You'll need to `cd` into the theme to run `npm install && bower install`. Once this has completed, run `gulp` (or `gulp serve` to using BrowserSync too) and then save the `style.scss` file within the `assets` directory. From there you'll be able to work as normal.

## Theme Functions File

In an effort to move away from a disorganised and length `functions.php`, I've moved theme specific code to a sub folder called `functions` and am using a loader to include these files within my theme. This way, when theme functionality is added, it can be placed in an appropriately named file, and referenced easily. To add or remove a file, simple edit the `$includes` array within `functions.php`.

## Templates / Views

Custom page templates will be held within the `templates` folder. I will also typically abstract out markup (such as single entries from a custom loop) into small files held within the `/templates/views/` folder. In order to reference these files easily I have defined a `CHILD_THEME_VIEWS` constant within the theme `functions.php` file, which can be used like: `include CHILD_THEME_VIEWS . 'filename.php'` within templates.