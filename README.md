# Genesis Starter Theme

This is my starter theme for creating custom websites using the Genesis Framework, using [Bourbon](http://bourbon.io/) and [Neat](http://neat.bourbon.io). It is intentionally minimal, there are only very basic styling cues included, taken from [Bourbon Bitters](http://bitters.bourbon.io/). 

## Using Gulp

Alongside my starter theme, I make heavy use of Gulp and have created a set of theme tasks which I use on every custom build. These Gulp tasks help to automate tasks such as compiling SCSS, optimizing images, linting and concatenation scripts, adding languages .pot files.

They are available as a standalone package, [`gulp-wp-toolkit`](https://github.com/craigsimps/wp-gulp-toolkit/) and are used within this theme.


## Structure 

This theme is structured with a `/develop/` directory which houses uncompressed images, SCSS files and uncompiled JS. Gulp will then compile these files and output them within folders in the theme directory.

Theme configuration is loaded within `functions.php`, however this is carried out using a `Setup` class (`/lib/classes/class-setup.php`), and `/lib/config.php` which holds all of our theme configuration. Other code and customisations are held within `/lib/components/`, and are loaded by adding the filename to our autoload function within `/lib/autoload.php`.

Custom page templates will be held within the `templates` folder. I will also typically abstract out markup (such as single entries from a custom loop) into small files held within the `/views/` folder.

## Installation/ Setup

Clone the repository to your WordPress `/themes/` directory. It won't work straight out of the box, because there's no compiled stylesheet held within the repository - run `npm install`, and then `gulp build` to get started.

From there, run `gulp build` or optionally `gulp serve` (if you want to see changes happen instantly in your browser using Browser Sync) and build a custom theme. More information about the available Gulp tasks can be found within the [`gulp-wp-toolkit`](https://github.com/craigsimps/wp-gulp-toolkit/) repository.
