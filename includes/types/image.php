<?php
/**
 * Image icon handler
 *
 * @package Icon_Picker
 * @author Dzikri Aziz <kvcrvt@gmail.com>
 */

require_once dirname( __FILE__ ) . '/base.php';

/**
 * Image icon
 *
 */
class Icon_Picker_Type_Image extends Icon_Picker_Type {

	/**
	 * Icon type ID
	 *
	 * @since  0.1.0
	 * @access protected
	 * @var    string
	 */
	protected $id = 'image';

	/**
	 * JS Controller
	 *
	 * @since  0.1.0
	 * @access protected
	 * @var    string
	 */
	protected $controller = 'Img';

	/**
	 * Template ID
	 *
	 * @since  0.1.0
	 * @access protected
	 * @var    string
	 */
	protected $template_id = 'image';


	/**
	 * Constructor
	 *
	 * @since 0.1.0
	 * @param array $args Misc. arguments.
	 */
	public function __construct( $args = array() ) {
		if ( empty( $this->name ) ) {
			$this->name = __( 'Image', 'icon-picker' );
		}

		parent::__construct( $args );
	}


	/**
	 * Get extra properties data
	 *
	 * @since  0.1.0
	 * @access protected
	 * @return array
	 */
	protected function get_props_data() {
		return array(
			'mimeTypes' => $this->get_image_mime_types(),
		);

		return $props;
	}


	/**
	 * Get image mime types
	 *
	 * @since  0.1.0
	 * @return array
	 */
	protected function get_image_mime_types() {
		$mime_types = get_allowed_mime_types();

		foreach ( $mime_types as $id => $type ) {
			if ( false === strpos( $type, 'image/' ) ) {
				unset( $mime_types[ $id ] );
			}
		}

		/**
		 * Filter image mime types
		 *
		 * @since 0.1.0
		 * @param array $mime_types Image mime types.
		 */
		$mime_types = apply_filters( 'icon_picker_image_mime_types', $mime_types );

		// We need to exclude image/svg*.
		unset( $mime_types['svg'] );

		return $mime_types;
	}
}
