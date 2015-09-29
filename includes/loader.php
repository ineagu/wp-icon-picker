<?php

/**
 * Icon Picker Loader
 *
 * @package Icon_Picker
 * @author  Dzikri Aziz <kvcrvt@gmail.com>
 */

final class Icon_Picker_Loader {

	/**
	 * Icon_Picker_Loader singleton
	 *
	 * @access protected
	 * @since  0.1.0
	 * @var    Icon_Picker_Loader
	 */
	protected static $instance;

	/**
	 * Script IDs
	 *
	 * @since  0.1.0
	 * @access protected
	 * @var    array
	 */
	protected $script_ids = array();

	/**
	 * Stylesheet IDs
	 *
	 * @since  0.1.0
	 * @access protected
	 * @var    array
	 */
	protected $style_ids = array();


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
	 * @return Icon_Picker_Loader
	 */
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}


	/**
	 * Constructor
	 *
	 * @since  0.1.0
	 * @access protected
	 */
	protected function __construct() {
		$this->register_assets();

		/**
		 * Fires when Icon Picker loader is ready
		 *
		 * @since 0.1.0
		 * @param Icon_Picker $this Icon_Picker_loader instance.
		 */
		do_action( 'icon_picker_loader_init', $this );
	}


	/**
	 * Add script
	 *
	 * @since  0.1.0
	 * @param  string $script_id Script ID.
	 * @return bool
	 */
	public function add_script( $script_id ) {
		if ( wp_script_is( $script_id, 'registered' ) ) {
			$this->script_ids[] = $script_id;

			return true;
		}

		return false;
	}


	/**
	 * Add stylesheet
	 *
	 * @since  0.1.0
	 * @param  string $script_id Script ID.
	 * @return bool
	 */
	public function add_style( $style_id ) {
		if ( wp_style_is( $style_id, 'registered' ) ) {
			$this->style_ids[] = $style_id;

			return true;
		}

		return false;
	}


	/**
	 * Register scripts & styles
	 *
	 * @since  0.1.0
	 * @access protected
	 * @return void
	 */
	protected function register_assets() {
		$icon_picker = Icon_Picker::instance();

		if ( defined( 'ICON_PICKER_SCRIPT_DEBUG' ) && ICON_PICKER_SCRIPT_DEBUG ) {
			foreach ( array( 'model', 'view', 'controller', 'frame' ) as $part ) {
				$script_id = "icon-picker-{$part}";

				wp_register_script(
					$script_id,
					"{$icon_picker->url}/js/media/{$part}.js",
					array( 'media-views' ),
					$icon_picker->VERSION
				);
				$this->add_script( $script_id );
			}

			wp_register_script(
				'icon-picker',
				"{$icon_picker->url}/js/utils.js",
				array( 'media-views' ),
				$icon_picker->VERSION
			);
			$this->add_script( 'icon-picker' );
		} else {
			$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

			wp_register_script(
				'icon-picker',
				"{$icon_picker->url}/js/icon-picker{$suffix}.js",
				array( 'media-views' ),
				$icon_picker->VERSION
			);
			$this->add_script( $script_id );
		}
	}
}
