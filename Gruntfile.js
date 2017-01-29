module.exports = function( grunt ) {
	// Project configuration.
	grunt.initConfig({
		uglify: {
			all: {
				files: {
					'js/icon-picker.min.js': ['js/icon-picker.js']
				}
			}
		},
		cssmin: {
			main: {
				expand: true,
				cwd: 'css/',
				src: ['icon-picker.css'],
				dest: 'css/',
				ext: '.min.css'
			},
			types: {
				expand: true,
				cwd: 'css/types/',
				src: [ '*.css', '!*.min.css' ],
				dest: 'css/types/',
				ext: '.min.css'
			}
		},
		makepot: {
			target: {
				options: {
					mainFile: 'icon-picker.php',
					type: 'wp-plugin',
					exclude: ['tests']
				}
			}
		}
	});

	// Load tasks.
	grunt.loadNpmTasks( 'grunt-contrib-cssmin' );
	grunt.loadNpmTasks( 'grunt-contrib-uglify' );
	grunt.loadNpmTasks( 'grunt-wp-i18n' );

	// Register tasks.
	grunt.registerTask( 'i18n', [ 'cssmin', 'uglify', 'makepot' ]);
	grunt.registerTask( 'default', ['i18n']);
};
