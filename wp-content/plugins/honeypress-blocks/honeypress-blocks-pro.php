<?php
/**
 *
 * @link              https://spicethemes.com
 * @since             1.0
 * @package           Honeypress_Blocks_Pro
 * Plugin Name:       Honeypress Blocks Pro
 * Plugin URI:        https://spicethemes.com
 * Description:       Registers Post Addons for the Honeypress theme
 * Version:           1.0
 * Author:            Spicethemes
 * Author URI:        https://spicethemes.com
  * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       honeypress-blocks
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Set up and initialize
 */
class Honeypress_Blocks_Pro {
	private static $instance;

	/**
	 * Actions setup
	 */
	public function __construct() 
	{
		add_action( 'plugins_loaded', array( $this, 'constants' ), 2 );
		add_action( 'plugins_loaded', array( $this, 'includes' ), 4 );
		//Elementor actions
		add_action( 'elementor/widgets/widgets_registered', array( $this, 'elementor_includes' ), 4 );
		add_action( 'elementor/init', array( $this, 'elementor_category' ), 4 );
	}

	/**
	 * Constants
	 */
	function constants() {
		define( 'WT_DIR', trailingslashit( plugin_dir_path( __FILE__ ) ) );
		define( 'WBP_URI', trailingslashit( plugin_dir_url( __FILE__ ) ) );
	}

	/**
	 * Includes
	 */
	function includes() {
	require_once( WT_DIR . 'demo-content/setup.php' );
	}

	function elementor_includes() {
		if ( !version_compare(PHP_VERSION, '5.4', '<=') ) {
			require_once( WT_DIR . 'inc/elementor/block-posts.php' );		
		}
	}

	function elementor_category() {
		if ( !version_compare(PHP_VERSION, '5.4', '<=') ) {
			\Elementor\Plugin::$instance->elements_manager->add_category( 
				'honeypress-elements',
				[
					'title' => __( 'Honeypress Elements', 'honeypress-blocks' ),
					'icon' => 'fa fa-plug',
				],
				2
			);
		}
	} 

	static function install() {
		if ( version_compare(PHP_VERSION, '5.4', '<=') ) {
			wp_die( __( 'Honeypress Blocks Pro requires PHP 5.4. Please contact your host to upgrade your PHP. The plugin was <strong>not</strong> activated.', 'honeypress-blocks' ) );
		};
	}	



	/**
	 * Returns the instance.
	 */
	public static function get_instance() {

		if ( !self::$instance )
			self::$instance = new self;

		return self::$instance;
	}
}

function honeypress_blocks_pro_plugin() {
		return Honeypress_Blocks_Pro::get_instance();
}
add_action('plugins_loaded', 'honeypress_blocks_pro_plugin', 1);

//Does not activate the plugin on PHP less than 5.4
register_activation_hook( __FILE__, array( 'Honeypress_Blocks_Pro', 'install' ) );