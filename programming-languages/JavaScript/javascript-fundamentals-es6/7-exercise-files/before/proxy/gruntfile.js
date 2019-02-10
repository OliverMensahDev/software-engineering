


module.exports = function(grunt) {

  grunt.initConfig({
    watch: {
		  all: {
				files: '**/*.js',
				options: {
				  livereload: true,
				},
	  	},
	  },
	  express: {
	    all: {
        options: {
          port: 9000,
          hostname: "0.0.0.0",
          bases: ["./"]
        }
	    }
		},
    open: {
      all: {
        path: 'http://localhost:9000/default.html'
      }
    }
		
  });

  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-express');
  grunt.loadNpmTasks('grunt-open');
  grunt.registerTask("default", ["express", "open", "watch"]);

};