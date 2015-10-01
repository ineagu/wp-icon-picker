<?php

class Icon_Picker_Test_Loader_Admin extends WP_UnitTestCase {
	function setUp() {
		$this->icon_picker = Icon_Picker::instance();
		set_current_screen( 'nav-menus.php' );
		parent::setUp();
	}

	/**
	 * @covers Icon_Picker::load()
	 */
	function test_load_admin() {
		$this->icon_picker->load();

		$this->assertTrue( $this->icon_picker->is_admin_loaded );
		$this->assertEquals( 10, has_filter( 'media_view_strings', array( $this->icon_picker->loader, '_media_view_strings' ) ) );
		$this->assertEquals( 10, has_action( 'admin_enqueue_scripts', array( $this->icon_picker->loader, '_enqueue_assets' ) ) );
		$this->assertEquals( 10, has_action( 'print_media_templates', array( $this->icon_picker->loader, '_media_templates' ) ) );
	}

	/**
	 * @covers Icon_Picker_Loader::_enqueue_assets()
	 */
	function test_loader_enqueue_assets() {
		$this->icon_picker->loader->_enqueue_assets();

		$this->assertGreaterThan( 0, did_action( 'wp_enqueue_media' ) );

		foreach ( $this->icon_picker->loader->script_ids as $script_id ) {
			$this->assertTrue( wp_script_is( $script_id ) );
		}

		$this->assertGreaterThan( 0, did_action( 'icon_picker_admin_loaded' ) );
	}
}
