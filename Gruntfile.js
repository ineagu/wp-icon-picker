module.exports = function( grunt ) {
	// Project configuration.
	grunt.initConfig({
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
	grunt.loadNpmTasks( 'grunt-wp-i18n' );

	// Register tasks.
	grunt.registerTask( 'i18n', ['makepot']);
	grunt.registerTask( 'default', ['i18n']);
};
