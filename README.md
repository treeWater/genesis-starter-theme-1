#Genesis Starter Theme

This is my starter theme for creating custom websites using the Genesis Framework, using [Bourbon](http://bourbon.io/) and [Neat](http://neat.bourbon.io). It is intentionally minimal, there are only very basic styling cues included, taken from [Bourbon Bitters](http://bitters.bourbon.io/). 

Alongside my starter theme, I make heavy use of Gulp and have created a set of theme tasks which I use on every custom build. These Gulp tasks help to automate tasks such as compiling SCSS, optimizing images, linting and concatenation scripts, adding languages .pot files. They are available [in a separate repository](https://github.com/craigsimps/gulp-build-tasks/).

My theme is structured with a `/develop/` directory which houses uncompressed images, SCSS files and uncompiled JS. Gulp will then compile these files and output them to the `/assets/` directory.

In an effort to move away from a disorganised and lengthy `functions.php`, I've moved theme specific code into a sub folder called `functions` and include these files within my theme. This way, when theme functionality is added, it can be placed in an appropriately named file, and referenced easily.

Custom page templates will be held within the `templates` folder. I will also typically abstract out markup (such as single entries from a custom loop) into small files held within the `/views/` folder.

## Installation/ Setup

Clone the repository to your WordPress `/themes/` directory. It won't work straight out of the box, because there's no compiled stylesheet held within the repository. You'll need to hook up your preferred task runner and output everything in `/develop/` to the theme root and `/assets/` directory. [I use Gulp for this](https://github.com/craigsimps/gulp-build-tasks/).
