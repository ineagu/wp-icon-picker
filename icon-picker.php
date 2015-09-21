<?php

/**
 * Icon Picker
 *
 * @package Icon_Picker
 * @version 0.1.0
 * @author Dzikri Aziz <kvcrvt@gmail.com>
 *
 *
 * Plugin Name: Icon Picker
 * Plugin URI: http://kucrut.org/
 * Description: Pick and icon of your choice.
 * Version: 0.1.0
 * Author: Dzikri Aziz
 * Author URI: http://kucrut.org/
 * License: GPLv2
 * Text Domain: icon-picker
 * Domain Path: /languages
 */

final class Icon_Picker {

	const VERSION = '0.1.0';

	/**
	 * Instance
	 *
	 * @access protected
	 * @since  0.1.0
	 * @var    Icon_Picker
	 */
	protected static $instance;

	/**
	 * Holds plugin data
	 *
	 * @access protected
	 * @since  0.1.0
	 * @var    array
	 */
	protected $data;


	/**
	 * Get plugin data
	 *
	 * @since  0.1.0
	 * @param  string $name Property name.
	 * @return mixed
	 */
	public function __get( $name ) {
		if ( isset( $this->data[ $name ] ) ) {
			return $this->data[ $name ];
		}

		return null;
	}


	/**
	 * Get instance
	 *
	 * @since  0.1.0
	 * @param  array $args {Arguments {@see Icon_Picker::__construct()}.
	 * @return Icon_Picker
	 */
	public static function instance( $args = array() ) {
		if ( is_null( self::$instance ) ) {
			self::$instance = new Icon_Picker( $args );
		}

		return self::$instance;
	}


	/**
	 * Constructor
	 *
	 * @since  0.1.0
	 * @param  array $args {
	 *     Optional arguments.
	 *
	 *     @type string $dir Plugin directory path (without trailing slash).
	 *     @type string $url Plugin directory url path (without trailing slash).
	 * }
	 * @return Icon_Picker
	 */
	protected function __construct( $args = array() ) {
		$defaults = array(
			'dir' => untrailingslashit( plugin_dir_path( __FILE__ ) ),
			'url' => untrailingslashit( plugin_dir_url( __FILE__ ) ),
		);

		$this->data = wp_parse_args( $args, $defaults );

		return $this;
	}
}
add_action( 'plugins_loaded', array( 'Icon_Picker', 'instance' ), 7 );
