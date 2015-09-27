<?php

class LoadPluginTest extends WP_UnitTestCase {
	/**
	 * @covers Icon_Picker::instance()
	 */
	public function test_init() {
		$instance = Icon_Picker::instance();

		$this->assertInstanceOf( 'Icon_Picker', $instance );
		$this->assertEquals( WP_PLUGIN_DIR . '/icon-picker', $instance->dir );
		$this->assertEquals( WP_PLUGIN_URL . '/icon-picker', $instance->url );
	}

	public function test_registry() {
		$instance = Icon_Picker::instance();

		$this->assertInstanceOf( 'Icon_Picker_Types_Registry', $instance->registry );
		$this->assertGreaterThan( 0, did_action( 'icon_picker_types_registry_init' ) );
		$this->assertNotEmpty( $instance->registry->types );
	}
}
