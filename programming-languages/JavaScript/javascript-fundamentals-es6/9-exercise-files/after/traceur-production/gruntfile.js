module.exports = function(grunt) {

  grunt.initConfig({
  	traceur: {
      options: {
        experimental: true
      },
      custom: {
        files:[{
          expand: true,
          cwd: 'es6',
          src: ['**/*.js'],
          dest: 'es5',
          ext: '.js'
        }]
      },
    },
  });

	grunt.loadNpmTasks('grunt-traceur');

  grunt.registerTask('default', ['traceur']);

};