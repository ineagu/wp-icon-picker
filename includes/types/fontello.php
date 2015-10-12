<?php
/**
 * Fontello Pack
 *
 * @package Icon_Picker
 * @author  Dzikri Aziz <kvcrvt@gmail.com>
 * @author  Joshua F. Rountree <joshua@swodev.com>
 */


require_once dirname( __FILE__ ) . '/font.php';

/**
 * Icon type: Fontello
 *
 * @version 0.1.0
 */
class Icon_Picker_Type_Fontello extends Icon_Picker_Type_Font {

	/**
	 * Icon pack ID
	 *
	 * @since  0.1.0
	 * @access protected
	 * @var    string
	 */
	protected $id = '';

	/**
	 * Icon pack name
	 *
	 * @since  0.1.0
	 * @access protected
	 * @var    string
	 */
	protected $name = '';

	/**
	 * Icon pack version
	 *
	 * @since  0.1.0
	 * @access protected
	 * @var    string
	 */
	protected $version = '';

	/**
	 * Icon pack directory path
	 *
	 * @since  0.1.0
	 * @access protected
	 * @var    string
	 */
	protected $dir;

	/**
	 * Icon pack directory url
	 *
	 * @since  0.1.0
	 * @access protected
	 * @var    string
	 */
	protected $url;

	/**
	 * Groups
	 *
	 * @since  0.1.0
	 * @access protected
	 * @var    array
	 */
	protected $groups;

	/**
	 * Items
	 *
	 * @since  0.1.0
	 * @access protected
	 * @var    array
	 */
	protected $items;


	/**
	 * Register assets
	 *
	 * @since  0.1.0
	 * @action icon_picker_loader_init
	 * @param  Icon_Picker_Loader      $loader Icon_Picker_Loader instance.
	 * @return void
	 */
	public function register_assets( Icon_Picker_Loader $loader ) {
		wp_register_style(
			$this->id,
			"{$this->url}/css/{$this->id}.css",
			false,
			$this->version
		);

		$loader->add_style( $this->id );
	}
}
