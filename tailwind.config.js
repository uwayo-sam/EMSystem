// tailwind.config.js
module.exports = {
  content: [
    "./*.php",          // All PHP files in root directory
    "./**/*.php",       // PHP files in any subdirectory
    "./**/*.html",      // HTML files if any
    "./**/*.js"         // JavaScript files
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}