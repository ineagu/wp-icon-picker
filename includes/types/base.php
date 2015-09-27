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
	 * Icon type stylesheet ID
	 *
	 * @since  0.1.0
	 * @access protected
	 * @var    string
	 */
	protected $stylesheet_id = '';

	/**
	 * JS Controller
	 *
	 * @since  0.1.0
	 * @access protected
	 * @var    string
	 */
	protected $controller = '';


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

		if ( empty( $this->stylesheet_id ) ) {
			$this->stylesheet_id = $this->id;
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
}
