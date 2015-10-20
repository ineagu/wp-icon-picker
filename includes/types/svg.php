<?php
/**
 * SVG icon handler
 *
 * @package Icon_Picker
 * @author  Dzikri Aziz <kvcrvt@gmail.com>
 */

require_once dirname( __FILE__ ) . '/image.php';

/**
 * Image icon
 *
 */
class Icon_Picker_Type_Svg extends Icon_Picker_Type_Image {

	/**
	 * Icon type ID
	 *
	 * @since  0.1.0
	 * @access protected
	 * @var    string
	 */
	protected $id = 'svg';

	/**
	 * Template ID
	 *
	 * @since  0.1.0
	 * @access protected
	 * @var    string
	 */
	protected $template_id = 'svg';

	/**
	 * Mime type
	 *
	 * @since  0.1.0
	 * @access protected
	 * @var    string
	 */
	protected $mime_type = 'image/svg+xml';


	/**
	 * Constructor
	 *
	 * @since 0.1.0
	 * @param array $args Misc. arguments.
	 */
	public function __construct( $args = array() ) {
		$this->name = __( 'SVG', 'icon-picker' );

		parent::__construct( $args );
		add_filter( 'upload_mimes', array( $this, '_add_mime_type' ) );
	}


	/**
	 * Add SVG support
	 *
	 * @since   0.8.0
	 * @access  protected
	 * @filter  upload_mimes
	 * @link    https://codex.wordpress.org/Plugin_API/Filter_Reference/upload_mimes
	 * @by      Ethan Clevenger (GitHub: ethanclevenger91; email: ethan.c.clevenger@gmail.com)
	 * @return  array
	 */
	public function _add_mime_type( array $mimes ) {
		if ( ! isset( $mimes['svg'] ) ) {
			$mimes['svg'] = $this->mime_type;
		}

		return $mimes;
	}


	/**
	 * Get properties
	 *
	 * @since  0.1.0
	 * @return array
	 */
	public function get_props() {
		$props = array(
			'id'         => $this->id,
			'name'       => $this->name,
			'controller' => $this->controller,
			'data'       => array(
				'mimeTypes'  => array( $this->mime_type ),
			),
		);

		/**
		 * Filter icon type properties
		 *
		 * @since 0.1.0
		 * @param array $props Icon type properties.
		 */
		$props = apply_filters( 'icon_picker_svg_props', $props );

		return $props;
	}


	/**
	 * Media templates
	 *
	 * @since  0.1.0
	 * @return array
	 */
	public function get_templates() {
		$icon      = '<img src="{{ data.url }}" alt="{{ data.alt }}" class="_icon _{{data.type}}"%s />';
		$icon_item = sprintf( $icon, '' );
		$templates = array(
			'item' => sprintf(
				'<div class="attachment-preview js--select-attachment svg-icon">
					<div class="thumbnail">
						<div class="centered">%s</div>
					</div>
				</div>
				<a class="check" href="#" title="%s"><div class="media-modal-icon"></div></a>',
				$icon_item,
				esc_attr__( 'Deselect', 'menu-icons' )
			),
		);

		/**
		 * Filter media templates
		 *
		 * @since 0.1.0
		 * @param array $templates Media templates.
		 */
		$templates = apply_filters( 'icon_picker_svg_media_templates', $templates );

		return $templates;
	}
}
