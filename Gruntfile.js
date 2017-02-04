module.exports = function( grunt ) {
	// Project configuration.
	grunt.initConfig({
		phpcs: {
			'default': {
				cmd: './vendor/bin/phpcs',
				args: [ '--standard=./phpcs.ruleset.xml', '-p', '-s', '-v', '--extensions=php', '.' ]
			}
		},
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
	grunt.registerMultiTask( 'phpcs', 'Runs PHP code sniffs.', function() {
		grunt.util.spawn({
			cmd: this.data.cmd,
			args: this.data.args,
			opts: { stdio: 'inherit' }
		}, this.async() );
	});

	grunt.registerTask( 'i18n', ['makepot']);
	grunt.registerTask( 'compress', [ 'cssmin', 'uglify' ]);
	grunt.registerTask( 'default', [ 'i18n', 'compress' ]);
};
