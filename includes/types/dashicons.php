<?php
/**
 * Dashicons
 *
 * @package Icon_Picker
 * @author Dzikri Aziz <kvcrvt@gmail.com>
 */


require_once dirname( __FILE__ ) . '/font.php';

/**
 * Icon type: Dashicons
 *
 * @since 0.1.0
 */
class Icon_Picker_Type_Dashicons extends Icon_Picker_Type_Font {

	/**
	 * Icon type ID
	 *
	 * @since  0.1.0
	 * @access protected
	 * @var    string
	 */
	protected $id = 'dashicons';

	/**
	 * Icon type name
	 *
	 * @since  0.1.0
	 * @access protected
	 * @var    string
	 */
	protected $name = 'Dashicons';

	/**
	 * Icon type version
	 *
	 * @since  0.1.0
	 * @access protected
	 * @var    string
	 */
	protected $version = '4.3.1';


	/**
	 * Icon names
	 *
	 * @since  0.1.0
	 * @return array
	 */
	public function get_names() {
		return array(
			array(
				'key'   => 'admin',
				'label' => __( 'Admin', 'icon-picker' ),
				'items' => array(
					'dashicons-admin-appearance' => __( 'Appearance', 'icon-picker' ),
					'dashicons-admin-collapse'   => __( 'Collapse', 'icon-picker' ),
					'dashicons-admin-comments'   => __( 'Comments', 'icon-picker' ),
					'dashicons-admin-customizer' => __( 'Customizer', 'icon-picker' ),
					'dashicons-dashboard'        => __( 'Dashboard', 'icon-picker' ),
					'dashicons-admin-generic'    => __( 'Generic', 'icon-picker' ),
					'dashicons-filter'           => __( 'Filter', 'icon-picker' ),
					'dashicons-admin-home'       => __( 'Home', 'icon-picker' ),
					'dashicons-admin-media'      => __( 'Media', 'icon-picker' ),
					'dashicons-menu'             => __( 'Menu', 'icon-picker' ),
					'dashicons-admin-multisite'  => __( 'Multisite', 'icon-picker' ),
					'dashicons-admin-network'    => __( 'Network', 'icon-picker' ),
					'dashicons-admin-page'       => __( 'Page', 'icon-picker' ),
					'dashicons-admin-plugins'    => __( 'Plugins', 'icon-picker' ),
					'dashicons-admin-settings'   => __( 'Settings', 'icon-picker' ),
					'dashicons-admin-site'       => __( 'Site', 'icon-picker' ),
					'dashicons-admin-tools'      => __( 'Tools', 'icon-picker' ),
					'dashicons-admin-users'      => __( 'Users', 'icon-picker' ),
				),
			),
			array(
				'key'   => 'post-formats',
				'label' => __( 'Post Formats', 'icon-picker' ),
				'items' => array(
					'dashicons-format-standard' => __( 'Standard', 'icon-picker' ),
					'dashicons-format-aside'    => __( 'Aside', 'icon-picker' ),
					'dashicons-format-image'    => __( 'Image', 'icon-picker' ),
					'dashicons-format-video'    => __( 'Video', 'icon-picker' ),
					'dashicons-format-audio'    => __( 'Audio', 'icon-picker' ),
					'dashicons-format-quote'    => __( 'Quote', 'icon-picker' ),
					'dashicons-format-gallery'  => __( 'Gallery', 'icon-picker' ),
					'dashicons-format-links'    => __( 'Links', 'icon-picker' ),
					'dashicons-format-status'   => __( 'Status', 'icon-picker' ),
					'dashicons-format-chat'     => __( 'Chat', 'icon-picker' ),
				),
			),
			array(
				'key'   => 'welcome-screen',
				'label' => __( 'Welcome Screen', 'icon-picker' ),
				'items' => array(
					'dashicons-welcome-add-page'      => __( 'Add page', 'icon-picker' ),
					'dashicons-welcome-comments'      => __( 'Comments', 'icon-picker' ),
					'dashicons-welcome-edit-page'     => __( 'Edit page', 'icon-picker' ),
					'dashicons-welcome-learn-more'    => __( 'Learn More', 'icon-picker' ),
					'dashicons-welcome-view-site'     => __( 'View Site', 'icon-picker' ),
					'dashicons-welcome-widgets-menus' => __( 'Widgets', 'icon-picker' ),
					'dashicons-welcome-write-blog'    => __( 'Write Blog', 'icon-picker' ),
				),
			),
			array(
				'key'   => 'image-editor',
				'label' => __( 'Image Editor', 'icon-picker' ),
				'items' => array(
					'dashicons-image-crop'            => __( 'Crop', 'icon-picker' ),
					'dashicons-image-filter'          => __( 'Filter', 'icon-picker' ),
					'dashicons-image-rotate'          => __( 'Rotate', 'icon-picker' ),
					'dashicons-image-rotate-left'     => __( 'Rotate Left', 'icon-picker' ),
					'dashicons-image-rotate-right'    => __( 'Rotate Right', 'icon-picker' ),
					'dashicons-image-flip-vertical'   => __( 'Flip Vertical', 'icon-picker' ),
					'dashicons-image-flip-horizontal' => __( 'Flip Horizontal', 'icon-picker' ),
					'dashicons-undo'                  => __( 'Undo', 'icon-picker' ),
					'dashicons-redo'                  => __( 'Redo', 'icon-picker' ),
				),
			),
			array(
				'key'   => 'text-editor',
				'label' => __( 'Text Editor', 'icon-picker' ),
				'items' => array(
					'dashicons-editor-bold'             => __( 'Bold', 'icon-picker' ),
					'dashicons-editor-italic'           => __( 'Italic', 'icon-picker' ),
					'dashicons-editor-ul'               => __( 'Unordered List', 'icon-picker' ),
					'dashicons-editor-ol'               => __( 'Ordered List', 'icon-picker' ),
					'dashicons-editor-quote'            => __( 'Quote', 'icon-picker' ),
					'dashicons-editor-alignleft'        => __( 'Align Left', 'icon-picker' ),
					'dashicons-editor-aligncenter'      => __( 'Align Center', 'icon-picker' ),
					'dashicons-editor-alignright'       => __( 'Align Right', 'icon-picker' ),
					'dashicons-editor-insertmore'       => __( 'Insert More', 'icon-picker' ),
					'dashicons-editor-spellcheck'       => __( 'Spell Check', 'icon-picker' ),
					'dashicons-editor-distractionfree'  => __( 'Distraction-free', 'icon-picker' ),
					'dashicons-editor-kitchensink'      => __( 'Kitchensink', 'icon-picker' ),
					'dashicons-editor-underline'        => __( 'Underline', 'icon-picker' ),
					'dashicons-editor-justify'          => __( 'Justify', 'icon-picker' ),
					'dashicons-editor-textcolor'        => __( 'Text Color', 'icon-picker' ),
					'dashicons-editor-paste-word'       => __( 'Paste Word', 'icon-picker' ),
					'dashicons-editor-paste-text'       => __( 'Paste Text', 'icon-picker' ),
					'dashicons-editor-removeformatting' => __( 'Clear Formatting', 'icon-picker' ),
					'dashicons-editor-video'            => __( 'Video', 'icon-picker' ),
					'dashicons-editor-customchar'       => __( 'Custom Characters', 'icon-picker' ),
					'dashicons-editor-indent'           => __( 'Indent', 'icon-picker' ),
					'dashicons-editor-outdent'          => __( 'Outdent', 'icon-picker' ),
					'dashicons-editor-help'             => __( 'Help', 'icon-picker' ),
					'dashicons-editor-strikethrough'    => __( 'Strikethrough', 'icon-picker' ),
					'dashicons-editor-unlink'           => __( 'Unlink', 'icon-picker' ),
					'dashicons-editor-rtl'              => __( 'RTL', 'icon-picker' ),
				),
			),
			array(
				'key'   => 'post',
				'label' => __( 'Post', 'icon-picker' ),
				'items' => array(
					'dashicons-align-left'   => __( 'Align Left', 'icon-picker' ),
					'dashicons-align-right'  => __( 'Align Right', 'icon-picker' ),
					'dashicons-align-center' => __( 'Align Center', 'icon-picker' ),
					'dashicons-align-none'   => __( 'Align None', 'icon-picker' ),
					'dashicons-lock'         => __( 'Lock', 'icon-picker' ),
					'dashicons-calendar'     => __( 'Calendar', 'icon-picker' ),
					'dashicons-calendar-alt' => __( 'Calendar', 'icon-picker' ),
					'dashicons-hidden'       => __( 'Hidden', 'icon-picker' ),
					'dashicons-visibility'   => __( 'Visibility', 'icon-picker' ),
					'dashicons-post-status'  => __( 'Post Status', 'icon-picker' ),
					'dashicons-post-trash'   => __( 'Post Trash', 'icon-picker' ),
					'dashicons-edit'         => __( 'Edit', 'icon-picker' ),
					'dashicons-trash'        => __( 'Trash', 'icon-picker' ),
				),
			),
			array(
				'key'   => 'sorting',
				'label' => __( 'Sorting', 'icon-picker' ),
				'items' => array(
					'dashicons-arrow-up'         => __( 'Arrow: Up', 'icon-picker' ),
					'dashicons-arrow-down'       => __( 'Arrow: Down', 'icon-picker' ),
					'dashicons-arrow-left'       => __( 'Arrow: Left', 'icon-picker' ),
					'dashicons-arrow-right'      => __( 'Arrow: Right', 'icon-picker' ),
					'dashicons-arrow-up-alt'     => __( 'Arrow: Up', 'icon-picker' ),
					'dashicons-arrow-down-alt'   => __( 'Arrow: Down', 'icon-picker' ),
					'dashicons-arrow-left-alt'   => __( 'Arrow: Left', 'icon-picker' ),
					'dashicons-arrow-right-alt'  => __( 'Arrow: Right', 'icon-picker' ),
					'dashicons-arrow-up-alt2'    => __( 'Arrow: Up', 'icon-picker' ),
					'dashicons-arrow-down-alt2'  => __( 'Arrow: Down', 'icon-picker' ),
					'dashicons-arrow-left-alt2'  => __( 'Arrow: Left', 'icon-picker' ),
					'dashicons-arrow-right-alt2' => __( 'Arrow: Right', 'icon-picker' ),
					'dashicons-leftright'        => __( 'Left-Right', 'icon-picker' ),
					'dashicons-sort'             => __( 'Sort', 'icon-picker' ),
					'dashicons-list-view'        => __( 'List View', 'icon-picker' ),
					'dashicons-exerpt-view'      => __( 'Excerpt View', 'icon-picker' ),
					'dashicons-grid-view'        => __( 'Grid View', 'icon-picker' ),
				),
			),
			array(
				'key'   => 'social',
				'label' => __( 'Social', 'icon-picker' ),
				'items' => array(
					'dashicons-share'        => __( 'Share', 'icon-picker' ),
					'dashicons-share-alt'    => __( 'Share', 'icon-picker' ),
					'dashicons-share-alt2'   => __( 'Share', 'icon-picker' ),
					'dashicons-twitter'      => 'Twitter',
					'dashicons-rss'          => __( 'RSS', 'icon-picker' ),
					'dashicons-email'        => __( 'Email', 'icon-picker' ),
					'dashicons-email-alt'    => __( 'Email', 'icon-picker' ),
					'dashicons-facebook'     => 'Facebook',
					'dashicons-facebook-alt' => 'Facebook',
					'dashicons-googleplus'   => 'Google+',
					'dashicons-networking'   => __( 'Networking', 'icon-picker' ),
				),
			),
			array(
				'key'   => 'jobs',
				'label' => __( 'Jobs', 'icon-picker' ),
				'items' => array(
					'dashicons-art'         => __( 'Art', 'icon-picker' ),
					'dashicons-hammer'      => __( 'Hammer', 'icon-picker' ),
					'dashicons-migrate'     => __( 'Migrate', 'icon-picker' ),
					'dashicons-performance' => __( 'Performance', 'icon-picker' ),
				),
			),
			array(
				'key'   => 'products',
				'label' => __( 'Internal/Products', 'icon-picker' ),
				'items' => array(
					'dashicons-wordpress'     => 'WordPress',
					'dashicons-wordpress-alt' => 'WordPress',
					'dashicons-pressthis'     => 'PressThis',
					'dashicons-update'        => __( 'Update', 'icon-picker' ),
					'dashicons-screenoptions' => __( 'Screen Options', 'icon-picker' ),
					'dashicons-info'          => __( 'Info', 'icon-picker' ),
					'dashicons-cart'          => __( 'Cart', 'icon-picker' ),
					'dashicons-feedback'      => __( 'Feedback', 'icon-picker' ),
					'dashicons-cloud'         => __( 'Cloud', 'icon-picker' ),
					'dashicons-translation'   => __( 'Translation', 'icon-picker' ),
				),
			),
			array(
				'key'   => 'taxonomies',
				'label' => __( 'Taxonomies', 'icon-picker' ),
				'items' => array(
					'dashicons-tag'      => __( 'Tag', 'icon-picker' ),
					'dashicons-category' => __( 'Category', 'icon-picker' ),
				),
			),
			array(
				'key'   => 'alerts',
				'label' => __( 'Alerts/Notifications', 'icon-picker' ),
				'items' => array(
					'dashicons-yes'         => __( 'Yes', 'icon-picker' ),
					'dashicons-no'          => __( 'No', 'icon-picker' ),
					'dashicons-no-alt'      => __( 'No', 'icon-picker' ),
					'dashicons-plus'        => __( 'Plus', 'icon-picker' ),
					'dashicons-minus'       => __( 'Minus', 'icon-picker' ),
					'dashicons-dismiss'     => __( 'Dismiss', 'icon-picker' ),
					'dashicons-marker'      => __( 'Marker', 'icon-picker' ),
					'dashicons-star-filled' => __( 'Star: Filled', 'icon-picker' ),
					'dashicons-star-half'   => __( 'Star: Half', 'icon-picker' ),
					'dashicons-star-empty'  => __( 'Star: Empty', 'icon-picker' ),
					'dashicons-flag'        => __( 'Flag', 'icon-picker' ),
				),
			),
			array(
				'key'   => 'media',
				'label' => __( 'Media', 'icon-picker' ),
				'items' => array(
					'dashicons-controls-skipback'    => __( 'Skip Back', 'icon-picker' ),
					'dashicons-controls-back'        => __( 'Back', 'icon-picker' ),
					'dashicons-controls-play'        => __( 'Play', 'icon-picker' ),
					'dashicons-controls-pause'       => __( 'Pause', 'icon-picker' ),
					'dashicons-controls-forward'     => __( 'Forward', 'icon-picker' ),
					'dashicons-controls-skipforward' => __( 'Skip Forward', 'icon-picker' ),
					'dashicons-controls-repeat'      => __( 'Repeat', 'icon-picker' ),
					'dashicons-controls-volumeon'    => __( 'Volume: On', 'icon-picker' ),
					'dashicons-controls-volumeoff'   => __( 'Volume: Off', 'icon-picker' ),
					'dashicons-media-archive'        => __( 'Archive', 'icon-picker' ),
					'dashicons-media-audio'          => __( 'Audio', 'icon-picker' ),
					'dashicons-media-code'           => __( 'Code', 'icon-picker' ),
					'dashicons-media-default'        => __( 'Default', 'icon-picker' ),
					'dashicons-media-document'       => __( 'Document', 'icon-picker' ),
					'dashicons-media-interactive'    => __( 'Interactive', 'icon-picker' ),
					'dashicons-media-spreadsheet'    => __( 'Spreadsheet', 'icon-picker' ),
					'dashicons-media-text'           => __( 'Text', 'icon-picker' ),
					'dashicons-media-video'          => __( 'Video', 'icon-picker' ),
					'dashicons-playlist-audio'       => __( 'Audio Playlist', 'icon-picker' ),
					'dashicons-playlist-video'       => __( 'Video Playlist', 'icon-picker' ),
				),
			),
			array(
				'key'   => 'misc',
				'label' => __( 'Misc./Post Types', 'icon-picker' ),
				'items' => array(
					'dashicons-album'        => __( 'Album', 'icon-picker' ),
					'dashicons-analytics'    => __( 'Analytics', 'icon-picker' ),
					'dashicons-awards'       => __( 'Awards', 'icon-picker' ),
					'dashicons-backup'       => __( 'Backup', 'icon-picker' ),
					'dashicons-building'     => __( 'Building', 'icon-picker' ),
					'dashicons-businessman'  => __( 'Businessman', 'icon-picker' ),
					'dashicons-camera'       => __( 'Camera', 'icon-picker' ),
					'dashicons-carrot'       => __( 'Carrot', 'icon-picker' ),
					'dashicons-chart-pie'    => __( 'Chart: Pie', 'icon-picker' ),
					'dashicons-chart-bar'    => __( 'Chart: Bar', 'icon-picker' ),
					'dashicons-chart-line'   => __( 'Chart: Line', 'icon-picker' ),
					'dashicons-chart-area'   => __( 'Chart: Area', 'icon-picker' ),
					'dashicons-desktop'      => __( 'Desktop', 'icon-picker' ),
					'dashicons-forms'        => __( 'Forms', 'icon-picker' ),
					'dashicons-groups'       => __( 'Groups', 'icon-picker' ),
					'dashicons-id'           => __( 'ID', 'icon-picker' ),
					'dashicons-id-alt'       => __( 'ID', 'icon-picker' ),
					'dashicons-images-alt'   => __( 'Images', 'icon-picker' ),
					'dashicons-images-alt2'  => __( 'Images', 'icon-picker' ),
					'dashicons-index-card'   => __( 'Index Card', 'icon-picker' ),
					'dashicons-layout'       => __( 'Layout', 'icon-picker' ),
					'dashicons-location'     => __( 'Location', 'icon-picker' ),
					'dashicons-location-alt' => __( 'Location', 'icon-picker' ),
					'dashicons-products'     => __( 'Products', 'icon-picker' ),
					'dashicons-portfolio'    => __( 'Portfolio', 'icon-picker' ),
					'dashicons-book'         => __( 'Book', 'icon-picker' ),
					'dashicons-book-alt'     => __( 'Book', 'icon-picker' ),
					'dashicons-download'     => __( 'Download', 'icon-picker' ),
					'dashicons-upload'       => __( 'Upload', 'icon-picker' ),
					'dashicons-clock'        => __( 'Clock', 'icon-picker' ),
					'dashicons-lightbulb'    => __( 'Lightbulb', 'icon-picker' ),
					'dashicons-money'        => __( 'Money', 'icon-picker' ),
					'dashicons-palmtree'     => __( 'Palm Tree', 'icon-picker' ),
					'dashicons-phone'        => __( 'Phone', 'icon-picker' ),
					'dashicons-search'       => __( 'Search', 'icon-picker' ),
					'dashicons-shield'       => __( 'Shield', 'icon-picker' ),
					'dashicons-shield-alt'   => __( 'Shield', 'icon-picker' ),
					'dashicons-slides'       => __( 'Slides', 'icon-picker' ),
					'dashicons-smartphone'   => __( 'Smartphone', 'icon-picker' ),
					'dashicons-smiley'       => __( 'Smiley', 'icon-picker' ),
					'dashicons-sos'          => __( 'S.O.S.', 'icon-picker' ),
					'dashicons-sticky'       => __( 'Sticky', 'icon-picker' ),
					'dashicons-store'        => __( 'Store', 'icon-picker' ),
					'dashicons-tablet'       => __( 'Tablet', 'icon-picker' ),
					'dashicons-testimonial'  => __( 'Testimonial', 'icon-picker' ),
					'dashicons-tickets-alt'  => __( 'Tickets', 'icon-picker' ),
					'dashicons-thumbs-up'    => __( 'Thumbs Up', 'icon-picker' ),
					'dashicons-thumbs-down'  => __( 'Thumbs Down', 'icon-picker' ),
					'dashicons-unlock'       => __( 'Unlock', 'icon-picker' ),
					'dashicons-vault'        => __( 'Vault', 'icon-picker' ),
					'dashicons-video-alt'    => __( 'Video', 'icon-picker' ),
					'dashicons-video-alt2'   => __( 'Video', 'icon-picker' ),
					'dashicons-video-alt3'   => __( 'Video', 'icon-picker' ),
					'dashicons-warning'      => __( 'Warning', 'icon-picker' ),
				),
			),
		);
	}
}
