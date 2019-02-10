module.exports = function(grunt) {

  grunt.initConfig({
  	express: {
        all: {
            options: {
                port: 9000,
                hostname: "0.0.0.0",
                bases: ["app", "bower_components"]
            }
        }
    },

    watch: {
		  all: {
		    files: '**/*.js',
		    options: {
		      livereload: true,
		    }
		  },
		}
  });

  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-express');

  grunt.registerTask('default', ['express', 'watch']);

};