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
 * Description: Pick an icon of your choice.
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
	 * Icon_Picker singleton
	 *
	 * @access protected
	 * @since  0.1.0
	 * @var    Icon_Picker
	 */
	protected static $instance;

	/**
	 * Plugin directory path
	 *
	 * @access protected
	 * @since  0.1.0
	 * @var    array
	 */
	protected $dir;

	/**
	 * Plugin directory url path
	 *
	 * @access protected
	 * @since  0.1.0
	 * @var    array
	 */
	protected $url;

	/**
	 * Icon types registry
	 *
	 * @access protected
	 * @since  0.1.0
	 * @var    Icon_Picker_Types_Registry
	 */
	protected $registry;

	/**
	 * Loader
	 *
	 * @access protected
	 * @since  0.1.0
	 * @var    Icon_Picker_Loader
	 */
	protected $loader;

	/**
	 * Whether the functionality is loaded on admin
	 *
	 * @access protected
	 * @since  0.1.0
	 * @var    bool
	 */
	protected $is_admin_loaded = false;


	/**
	 * __isset() magic method
	 *
	 * @since  0.1.0
	 * @param  string $name Property name.
	 * @return bool
	 */
	public function __isset( $name ) {
		return isset( $this->$name );
	}


	/**
	 * __get() magic method
	 *
	 * @since  0.1.0
	 * @param  string $name Property name.
	 * @return mixed  NULL if attribute doesn't exist.
	 */
	public function __get( $name ) {
		if ( isset( $this->$name ) ) {
			return $this->$name;
		}

		return null;
	}


	/**
	 * Get instance
	 *
	 * @since  0.1.0
	 * @param  array $args Arguments {@see Icon_Picker::__construct()}.
	 * @return Icon_Picker
	 */
	public static function instance( $args = array() ) {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self( $args );
		}

		return self::$instance;
	}


	/**
	 * Constructor
	 *
	 * @since  0.1.0
	 * @access protected
	 * @param  array $args {
	 *     Optional. Arguments to override class property defaults.
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

		$args = wp_parse_args( $args, $defaults );
		$keys = array_keys( get_object_vars( $this ) );

		// Disallow
		unset( $args['registry'] );
		unset( $args['loader'] );
		unset( $args['is_admin_loaded'] );

		foreach ( $keys as $key ) {
			if ( isset( $args[ $key ] ) ) {
				$this->$key = $args[ $key ];
			}
		}

		add_action( 'wp_loaded', array( $this, 'init' ) );
	}


	/**
	 * Register icon types
	 *
	 * @since  0.1.0
	 * @action wp_loaded
	 * @return void
	 */
	public function init() {
		// Setup icon types registry
		require_once "{$this->dir}/includes/registry.php";
		$this->registry = Icon_Picker_Types_Registry::instance();

		if ( empty( $registry->types ) ) {
			$this->register_default_types();
		}

		// Setup loader
		require_once "{$this->dir}/includes/loader.php";
		$this->loader = Icon_Picker_Loader::instance();

		/**
		 * Fires when Icon Picker is ready
		 *
		 * @since 0.1.0
		 * @param Icon_Picker $this Icon_Picker instance.
		 */
		do_action( 'icon_picker_init', $this );
	}


	/**
	 * Register default icon types
	 *
	 * @since  0.1.0
	 * @access protected
	 * @return void
	 */
	protected function register_default_types() {
		require_once "{$this->dir}/includes/types/dashicons.php";
		$this->registry->add( new Icon_Picker_Type_Dashicons() );
	}


	/**
	 * Load icon picker functionality on an admin page
	 *
	 * @since  0.1.0
	 * @return void
	 */
	public function load() {
		if ( true === $this->is_admin_loaded ) {
			return;
		}

		if ( ! is_admin() ) {
			_doing_it_wrong(
				__METHOD__,
				'It should only be called on admin pages.',
				esc_html( self::VERSION )
			);

			return;
		}

		if ( ! did_action( 'icon_picker_loader_init' ) ) {
			_doing_it_wrong(
				__METHOD__,
				sprintf(
					'It should not be called until the %s hook.',
					'<code>icon_picker_loader_init</code>'
				),
				esc_html( self::VERSION )
			);

			return;
		}

		$this->loader->load();
		$this->is_admin_loaded = true;
	}
}
add_action( 'plugins_loaded', array( 'Icon_Picker', 'instance' ), 7 );
