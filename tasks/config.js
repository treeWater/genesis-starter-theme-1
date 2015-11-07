var sources = {
  code: "**/*.php",
  images: "assets/images/**/*",
  scripts: "assets/js/**/*.js",
  styles: "assets/scss/**/*.scss"
};

module.exports = {
  i18n: {
    src: sources.code,
    textdomain: "genesis-starter-theme",
    dest: "./languages/",
    message: "Internationalization tasks complete."
  },
  images: {
    src: sources.images,
    dest: "./images/",
    message: "Images task complete."
  },
  scripts: {
    src: sources.scripts,
    output: "theme.js",
    dest: "./js/",
    message: "Javascript tasks run."
  },
  server: {
    url: "localhost.dev"
  },
  styles: {
    src: sources.styles,
    output: "compressed",
    dest: "./",
    message: "Stylesheet compiled & saved."
  },
  watch: {
    code: sources.code,
    images: sources.images,
    scripts: sources.scripts,
    styles: sources.styles
  }
};