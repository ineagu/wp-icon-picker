/* jshint node:true */
module.exports = function( grunt ) {

	// Project configuration
	grunt.initConfig( {
		pkg:    grunt.file.readJSON( 'package.json' ),
		jshint: {
			all: [
				'Gruntfile.js',
				'js/*.js',
				'js/media/.js',
				'!js/*.min.js'
			],
			options: {
				curly:   true,
				eqeqeq:  true,
				immed:   true,
				latedef: true,
				newcap:  true,
				noarg:   true,
				sub:     true,
				undef:   true,
				boss:    true,
				eqnull:  true,
				globals: {
					window: true,
					exports: true,
					wp: true,
					jQuery: true,
					_: true,
					Backbone: true,
					iconPicker: true
				}
			}
		},
		concat: {
			options: {
				separator: '\n'
			},
			dist: {
				src: [ 'js/media/model.js', 'js/media/view.js', 'js/media/controller.js', 'js/media/frame.js' ],
				dest: 'js/icon-picker.js'
			}
		},
		uglify: {
			all: {
				files: {
					'js/icon-picker.min.js': [ 'js/icon-picker.js' ]
				}
			}
		},
		cssmin: {
			minify: {
				expand: true,
				cwd: 'css/',
				src: [
					'icon-picker.css'
				],
				dest: 'css/',
				ext: '.min.css'
			}
		},
		watch:  {
			styles: {
				files: [
					'css/icon-picker.css'
				],
				tasks: [ 'cssmin' ],
				options: {
					debounceDelay: 500
				}
			},
			scripts: {
				files: [
					'js/*.js',
					'js/media/*.js'
				],
				tasks: [ 'jshint' ],
				options: {
					debounceDelay: 500
				}
			}
		},
		clean: {
			main: [ 'release/<%= pkg.version %>' ]
		},
		copy: {

			// Copy the plugin to a versioned release directory
			main: {
				src:  [
					'**',
					'!node_modules/**',
					'!release/**',
					'!.git/**',
					'!.sass-cache/**',
					'!Gruntfile.js',
					'!package.json',
					'!.gitattributes',
					'!.gitignore',
					'!.gitmodules',
					'!readme.md'
				],
				dest: 'release/<%= pkg.version %>/'
			}
		},
		compress: {
			main: {
				options: {
					mode: 'zip',
					archive: './release/icon-picker.<%= pkg.version %>.zip'
				},
				expand: true,
				cwd: 'release/<%= pkg.version %>/',
				src: [ '**/*' ],
				dest: 'icon-picker/'
			}
		},
		makepot: {
			target: {
				options: {
					mainFile: 'icon-picker.php',
					type: 'wp-plugin'
				}
			}
		}
	} );

	// Load other tasks
	grunt.loadNpmTasks( 'grunt-contrib-jshint' );
	grunt.loadNpmTasks( 'grunt-contrib-uglify' );
	grunt.loadNpmTasks( 'grunt-contrib-cssmin' );

	grunt.loadNpmTasks( 'grunt-contrib-watch' );
	grunt.loadNpmTasks( 'grunt-contrib-clean' );
	grunt.loadNpmTasks( 'grunt-contrib-concat' );
	grunt.loadNpmTasks( 'grunt-contrib-copy' );
	grunt.loadNpmTasks( 'grunt-contrib-compress' );

	grunt.loadNpmTasks( 'grunt-wp-i18n' );

	// Default task.
	grunt.registerTask( 'css', [ 'cssmin' ] );
	grunt.registerTask( 'js', [ 'concat', 'jshint', 'uglify' ] );
	grunt.registerTask( 'i18n', [ 'makepot' ] );
	grunt.registerTask( 'default', [ 'css', 'js', 'i18n' ] );

	grunt.registerTask( 'build', [ 'default', 'clean', 'copy', 'compress' ] );

	grunt.util.linefeed = '\n';
};
