module.exports = function(grunt) {

  grunt.initConfig({

    sass: {
			dist: {
				files: {
					'app/styles/app.css' : 'app/styles/sass/app.scss'
				}
			}
		},

    cssmin: {
      options: {
        shorthandCompacting: false,
        roundingPrecision: -1
      },
      target: {
        files: {
          'app/styles/app.min.css': ['app/styles/app.css']
        }
      }
    },

    watch: {
      files: ['app/styles/sass/*.scss'],
      tasks: ['sass', 'cssmin']
    }
  });

  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-cssmin');

  grunt.registerTask('dev', ['sass', 'cssmin']);
  grunt.registerTask('default', ['watch']);

};
