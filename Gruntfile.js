/* jshint node:true */
module.exports = function( grunt ) {

	// Project configuration
	grunt.initConfig( {
		browserify: {
			admin: {
				files: {
					'js/src/media.js': 'js/src/media/manifest.js'
				}
			}
		},
		concat: {
			options: {
				separator: '\n'
			},
			dist: {
				src: [ 'js/src/media.js', 'js/src/field.js' ],
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
			main: {
				expand: true,
				cwd: 'css/',
				src: [ 'icon-picker.css' ],
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
		_watch:  {
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
					'js/src/media/**/*.js',
					'js/src/field.js'
				],
				tasks: [ 'js' ],
				options: {
					debounceDelay: 500,
					interval: 2000
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
					'!dev-lib/**',
					'!node_modules/**',
					'!release/**',
					'!tests/**',
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
					type: 'wp-plugin',
					exclude: [ 'tests' ]
				}
			}
		}
	} );

	// Load other tasks
	grunt.loadNpmTasks( 'grunt-browserify' );
	grunt.loadNpmTasks( 'grunt-contrib-jshint' );
	grunt.loadNpmTasks( 'grunt-contrib-concat' );
	grunt.loadNpmTasks( 'grunt-contrib-uglify' );
	grunt.loadNpmTasks( 'grunt-contrib-cssmin' );
	grunt.loadNpmTasks( 'grunt-contrib-watch' );
	grunt.loadNpmTasks( 'grunt-contrib-clean' );
	grunt.loadNpmTasks( 'grunt-contrib-copy' );
	grunt.loadNpmTasks( 'grunt-contrib-compress' );
	grunt.loadNpmTasks( 'grunt-wp-i18n' );

	grunt.renameTask( 'watch', '_watch' );
	grunt.registerTask( 'watch', function() {
		if ( ! this.args.length || this.args.indexOf( 'browserify' ) > - 1 ) {
			grunt.config( 'browserify.options', {
				browserifyOptions: {
					debug: true
				},
				watch: true
			});

			grunt.task.run( 'browserify' );
		}

		grunt.task.run( '_' + this.nameArgs );
	});

	grunt.registerTask( 'css', ['cssmin']);
	grunt.registerTask( 'js', [ 'browserify', 'concat', 'uglify' ] );
	grunt.registerTask( 'i18n', ['makepot']);
	grunt.registerTask( 'default', [ 'css', 'js' ]);
	grunt.registerTask( 'build', [ 'default', 'clean', 'copy', 'compress' ]);

	grunt.util.linefeed = '\n';
};
