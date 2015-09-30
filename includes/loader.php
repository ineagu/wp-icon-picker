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
	 * @static
	 * @since  0.1.0
	 * @access protected
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
	 * Setter magic
	 *
	 * @since  0.1.0
	 * @param  string $name Property name.
	 * @return bool
	 */
	public function __isset( $name ) {
		return isset( $this->$name );
	}


	/**
	 * Getter magic
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
		 * @param Icon_Picker_Loader $this Icon_Picker_Loader instance.
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
					$icon_picker->VERSION,
					true
				);
				$this->add_script( $script_id );
			}

			wp_register_script(
				'icon-picker',
				"{$icon_picker->url}/js/utils.js",
				array( 'media-views' ),
				$icon_picker->VERSION,
				true
			);
			$this->add_script( 'icon-picker' );
		} else {
			$suffix = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

			wp_register_script(
				'icon-picker',
				"{$icon_picker->url}/js/icon-picker{$suffix}.js",
				array( 'media-views' ),
				$icon_picker->VERSION,
				true
			);
			$this->add_script( $script_id );
		}

		wp_localize_script(
			'icon-picker',
			'iconPicker',
			array(
				'types' => $icon_picker->registry->get_all_props(),
			)
		);
	}


	/**
	 * Load admin functionalities
	 *
	 * @since  0.1.0
	 * @return void
	 */
	public function load() {
		add_filter( 'media_view_strings', array( $this, '_media_view_strings' ) );
		add_action( 'admin_enqueue_scripts', array( $this, '_enqueue_assets' ) );
	}


	/**
	 * Filter media view strings
	 *
	 * @since  0.1.0
	 * @filter media_view_strings
	 * @param  array              $strings Media view strings.
	 * @return array
	 */
	public function _media_view_strings( $strings ) {
		$strings['iconPicker'] = array(
			'frameTitle' => __( 'Icon Picker', 'icon-picker' ),
		);

		return $strings;
	}


	/**
	 * Enqueue scripts & styles
	 *
	 * @since  0.1.0
	 * @action admin_enqueue_scripts
	 * @return void
	 */
	public function _enqueue_assets() {
		$icon_picker = Icon_Picker::instance();

		// Some pages don't call this by default, so let's make sure.
		wp_enqueue_media();

		foreach ( $this->script_ids as $script_id ) {
			wp_enqueue_script( $script_id );
		}

		foreach ( $this->style_ids as $style_id ) {
			wp_enqueue_style( $style_id );
		}

		/**
		 * Fires when admin functionality is loaded
		 *
		 * @since 0.1.0
		 * @param Icon_Picker $icon_picker Icon_Picker instance.
		 */
		do_action( 'icon_picker_admin_loaded', $icon_picker );
	}
}
