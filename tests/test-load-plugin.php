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
}
