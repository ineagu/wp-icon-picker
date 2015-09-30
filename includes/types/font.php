<?php
/**
 * Base font icon handler
 *
 * @package Icon_Picker
 * @author Dzikri Aziz <kvcrvt@gmail.com>
 */

require_once dirname( __FILE__ ) . '/base.php';

/**
 * Generic handler for icon fonts
 *
 */
abstract class Icon_Picker_Type_Font extends Icon_Picker_Type {

	/**
	 * JS Controller
	 *
	 * @since 0.1.0
	 * @access protected
	 * @var    string
	 */
	protected $controller = 'Font';


	/**
	 * Get icons
	 *
	 * @since  0.1.0
	 * @return array
	 */
	abstract function get_items();


	/**
	 * Register assets
	 *
	 * @since  0.1.0
	 * @action icon_picker_loaded
	 * @return void
	 */
	public function register_assets() {}


	/**
	 * Constructor
	 *
	 * @since 0.1.0
	 */
	public function __construct() {
		add_action( 'icon_picker_loaded', array( $this, 'register_assets' ) );
		parent::__construct();
	}
}
