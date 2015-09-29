<?php

class Icon_Picker_Test_Plugin extends WP_UnitTestCase {
	function setUp() {
		$this->icon_picker = Icon_Picker::instance();
		parent::setUp();
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
}
