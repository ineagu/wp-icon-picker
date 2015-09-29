<?php
/**
 * Icon types registry
 *
 * @package Icon_Picker
 * @author  Dzikri Aziz <kvcrvt@gmail.com>
 */

final class Icon_Picker_Types_Registry {

	/**
	 * Icon_Picker_Types_Registry singleton
	 *
	 * @since  0.1.0
	 * @access protected
	 * @var    Icon_Picker_Types_Registry
	 */
	protected static $instance;

	/**
	 * Base type class name
	 *
	 * @access protected
	 * @since  0.1.0
	 * @var    string
	 */
	protected $base_class = 'Icon_Picker_Type';

	/**
	 * All types
	 *
	 * @access protected
	 * @since  0.1.0
	 * @var    array
	 */
	protected $types = array();


	/**
	 * Get instance
	 *
	 * @since  0.1.0
	 * @param  array $args Arguments.
	 * @return Icon_Picker_Types_Registry
	 */
	public static function instance( $args = array() ) {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self( $args );
		}

		return self::$instance;
	}


	/**
	 * Get class property
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
	 * __isset() magic method
	 *
	 * @since  0.1.0
	 * @return bool
	 */
	public function __isset( $name ) {
		return isset( $this->$name );
	}


	/**
	 * Constructor
	 *
	 * @since  0.1.0
	 * @access protected
	 * @return Icon_Picker_Types_Registry
	 */
	protected function __construct() {
		/**
		 * Fires when Icon Picker types registry is ready
		 *
		 * @since 0.1.0
		 * @param Icon_Picker $this Icon_Picker instance.
		 */
		do_action( 'icon_picker_types_registry_init', $this );
	}


	/**
	 * Register icon type
	 *
	 * @since  0.1.0
	 * @param  Icon_Picker_Type $instance Icon type instance.
	 * @return void
	 */
	public function add( Icon_Picker_Type $instance ) {
		if ( $this->is_valid_type( $instance ) ) {
			$this->types[ $instance->id ] = $instance;
		}
	}


	/**
	 * Get icon type instance
	 *
	 * @since  0.1.0
	 * @param  string $id Icon type ID.
	 * @return mixed  Icon type instance or NULL if it's not registered.
	 */
	public function get( $id ) {
		if ( isset( $this->types[ $id ] ) ) {
			return $this->types[ $id ];
		}

		return null;
	}


	/**
	 * Check if icon type instance is valid
	 *
	 * @since  0.1.0
	 * @param  Icon_Picker_Type $instance Icon type instance.
	 * @return bool
	 */
	protected function is_valid_type( Icon_Picker_Type $instance ) {
		foreach ( array( 'id', 'controller' ) as $var ) {
			$value = $instance->$var;

			if ( empty( $value ) ) {
				trigger_error( esc_html( sprintf( 'Icon Picker: "%s" cannot be empty.', $var ) ) );
				return false;
			}
		}

		if ( isset( $this->types[ $instance->id ] ) ) {
			trigger_error( esc_html( sprintf( 'Icon Picker: Icon type %s is already registered. Please use a different ID.', $instance->id ) ) );
			return false;
		}

		return true;
	}
}
