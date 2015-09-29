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
		$this->assertContainsOnlyInstancesOf( 'Icon_Picker_Type', $instance->registry->types );
	}


	public function test_loader() {
		$instance = Icon_Picker::instance();

		$this->assertInstanceOf( 'Icon_Picker_Loader', $instance->loader );

		$this->assertNotEmpty( $instance->loader->script_ids );
		foreach ( $instance->loader->script_ids as $script_id ) {
			$this->assertTrue( wp_script_is( $script_id, 'registered' ) );
		}

		foreach ( $instance->loader->style_ids as $style_id ) {
			$this->assertTrue( wp_style_is( $style_id, 'registered' ) );
		}
	}
}
