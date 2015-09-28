<?php
/**
 * Icon type handler
 *
 * @package Icon_Picker
 * @author  Dzikri Aziz <kvcrvt@gmail.com>
 */


/**
 * Base icon type class
 */
class Icon_Picker_Type {

	/**
	 * Icon type ID
	 *
	 * @since  0.1.0
	 * @access protected
	 * @var    string
	 */
	protected $id = '';

	/**
	 * Icon type name
	 *
	 * @since  0.1.0
	 * @access protected
	 * @var    string
	 */
	protected $name = '';

	/**
	 * Icon type version
	 *
	 * @since  0.1.0
	 * @access protected
	 * @var    string
	 */
	protected $version = '';


	/**
	 * Constructor
	 *
	 * Supplied $args override class property defaults.
	 *
	 * @since  0.1.0
	 * @param array  $args Optional. Arguments to override class property defaults.
	 */
	public function __construct( $args = array() ) {
		$keys = array_keys( get_object_vars( $this ) );

		foreach ( $keys as $key ) {
			if ( isset( $args[ $key ] ) ) {
				$this->$key = $args[ $key ];
			}
		}
	}


	/**
	 * __get() magic method
	 *
	 * @since  0.1.0
	 * @param  string $name Property name
	 * @return mixed  NULL if attribute doesn't exist.
	 */
	public function __get( $name ) {
		$vars = get_object_vars( $this );
		if ( isset( $vars[ $name ] ) ) {
			return $vars[ $name ];
		}

		$method = "get_{$name}";
		if ( method_exists( $this, $method ) ) {
			return call_user_func( array( $this, $method ) );
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
		return ( isset( $this->$name ) || method_exists( $this, "get_{$name}" ) );
	}
}
