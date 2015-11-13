#Genesis Starter Reloaded

This is my starter theme for creating custom websites using the Genesis Framework.

Initial setup uses Bower to load front end dependencies (initially loading only Bourbon and Neat into the /vendor/ directory) and I would typically use Gulp to automate tasks such as compiling SCSS, optimizing images, linting and concatenation scripts, adding languages .pot files, you get the idea. I haven't included the Gulp tasks within the theme, as they're [in another repository](https://github.com/craigsimps/gulp-build-tasks/).

## Installation

Clone the repository to your WordPress `/themes/` directory. It won't work straight out of the box, because there's no compiled stylesheet held within the repository. You'll need to hook up your preferred task runner and output everything in `/assets/` to the theme root. [I use Gulp for this](https://github.com/craigsimps/gulp-build-tasks/).

## Theme Functions File

In an effort to move away from a disorganised and length `functions.php`, I've moved theme specific code to a sub folder called `functions` and am using a loader to include these files within my theme. This way, when theme functionality is added, it can be placed in an appropriately named file, and referenced easily. To add or remove a file, simple edit the `$includes` array within `functions.php`.

## Templates / Views

Custom page templates will be held within the `templates` folder. I will also typically abstract out markup (such as single entries from a custom loop) into small files held within the `/templates/views/` folder. In order to reference these files easily I have defined a `CHILD_THEME_VIEWS` constant within the theme `functions.php` file, which can be used like: `include CHILD_THEME_VIEWS . 'filename.php'` within templates.