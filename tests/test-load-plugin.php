<?php

class Icon_Picker_Test_Plugin extends WP_UnitTestCase {

	protected $fa_stylesheet_uri = 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css';

	function setUp() {
		$this->icon_picker = Icon_Picker::instance();

		add_filter( 'icon_picker_default_types', array( $this, '_filter_default_types' ) );
		add_filter( 'icon_picker_icon_type_stylesheet_uri', array( $this, '_filter_font_awesome_from_stylesheet_uri' ), 10, 3 );

		parent::setUp();
	}

	/**
	 * Filter default icon types
	 *
	 * This adds an unrecognized type
	 *
	 * @param  array $default_types Default icon types.
	 * @return array
	 */
	public function _filter_default_types( $default_types ) {
		$default_types[] = 'random';

		return $default_types;
	}

	public function _filter_font_awesome_from_stylesheet_uri( $stylesheet_uri, $icon_type_id, $icon_type ) {
		if ( 'fa' === $icon_type_id ) {
			$stylesheet_uri = $this->fa_stylesheet_uri;
		}

		return $stylesheet_uri;
	}

	/**
	 * @covers Icon_Picker::instance()
	 */
	public function test_init() {
		$this->assertInstanceOf( 'Icon_Picker', $this->icon_picker );
		$this->assertEquals( WP_PLUGIN_DIR . '/icon-picker', $this->icon_picker->dir );
		$this->assertEquals( WP_PLUGIN_URL . '/icon-picker', $this->icon_picker->url );
	}

	public function test_registry() {
		$this->assertInstanceOf( 'Icon_Picker_Types_Registry', $this->icon_picker->registry );
		$this->assertGreaterThan( 0, did_action( 'icon_picker_types_registry_init' ) );
		$this->assertNotEmpty( $this->icon_picker->registry->types );
		$this->assertContainsOnlyInstancesOf( 'Icon_Picker_Type', $this->icon_picker->registry->types );
		$this->assertGreaterThan( 0, did_action( 'icon_picker_types_registry_ready' ) );
	}

	public function test_loader() {
		$this->assertInstanceOf( 'Icon_Picker_Loader', $this->icon_picker->loader );

		$this->assertNotEmpty( $this->icon_picker->loader->script_ids );
		foreach ( $this->icon_picker->loader->script_ids as $script_id ) {
			$this->assertTrue( wp_script_is( $script_id, 'registered' ) );
		}

		foreach ( $this->icon_picker->loader->style_ids as $style_id ) {
			$this->assertTrue( wp_style_is( $style_id, 'registered' ) );
		}
	}

	/**
	 * @covers Icon_Picker::register_default_types()
	 */
	public function test_register_default_types() {
		$default_types_ids           = array_keys( $this->icon_picker->default_types );
		$registered_type_ids         = wp_list_pluck( $this->icon_picker->registry->types, 'id' );
		$registered_default_type_ids = array_values( array_intersect( $registered_type_ids, $default_types_ids ) );

		$this->assertSame( $registered_default_type_ids, $default_types_ids );
		$this->assertFalse( isset( $registered_default_type_ids['random'] ) );
	}

	/**
	 * @covers Icon_Picker_Type_Svg::__construct()
	 */
	public function test_type_svg() {
		$allowed_mime_types = get_allowed_mime_types();

		$this->assertArrayhasKey( 'svg', $allowed_mime_types );
	}

	/**
	 * @covers Icon_Picker_Type_Font::get_stylesheet_uri()
	 */
	public function test_font_awesome_css_from_cdn() {
		$this->assertEquals(
			$this->icon_picker->registry->types['fa']->stylesheet_uri,
			$this->fa_stylesheet_uri
		);
	}
}
