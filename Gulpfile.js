'use strict';

var gulp = require('gulp'),
    pkg = require('./package.json'),
    toolkit = require('gulp-wp-toolkit');

require('gulp-stats')(gulp);

toolkit.extendConfig({
    theme: {
        name: "Genesis Starter Theme",
        homepage: pkg.homepage,
        description: pkg.description,
        author: pkg.author,
        version: pkg.version,
        license: pkg.license,
        textdomain: pkg.name
    }
});

toolkit.extendTasks(gulp, { /* gulp task overrides */ });
