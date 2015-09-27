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
	 * Get icon names
	 *
	 * @since  0.1.0
	 * @return array
	 */
	abstract function get_names();
}
