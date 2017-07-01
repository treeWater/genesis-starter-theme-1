'use strict';

var gulp = require('gulp'),
    pkg = require('./package.json'),
    toolkit = require('gulp-wp-toolkit');

require('gulp-stats')(gulp);

toolkit.extendConfig({
    theme: {
        name: pkg.theme.name,
        homepage: pkg.homepage,
        description: pkg.theme.description,
        author: pkg.author,
        version: pkg.version,
        license: pkg.license,
        textdomain: pkg.name,
        template: "genesis"
    }
});

toolkit.extendTasks(gulp, { /* gulp task overrides */ });
