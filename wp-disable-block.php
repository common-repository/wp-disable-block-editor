<?php 
/**
 * Plugin Name: WP Disable Block Editor
 * Plugin URI: https://wordpress.org/plugins/wp-disable-gutenberg-editor/
 * Text Domain: wp-disable-gutenberg-editor
 * Version: 1.0.1
 * Requires at least: 5.0
 * WC tested up to: 6.2.2
 * Author: WP Lovers
 * Author URI: https://www.iihglobal.com/
 * Description: This plugin will WP Disable Block Editor & enable the Classic Editor and original Edit Post screen (TinyMCE, meta boxes, etc all).
 *
 * License: GPLv2 or later.
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @author    IIH Global <info@iihglobal.com>
 * @license   GPLv2 or later
 * @package   WP Disable Block Editor
 */
/**
 * If this file is called directly, abort.
 **/

if (!defined('ABSPATH')) die();

if (!class_exists('WP_Disable_Gutenberg')) {
	
	class WP_Disable_Gutenberg {
		
		function __construct() {
			
			$this->plugin_setting_file_include();
			add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'WP_Disable_Gutenberg_action_links' );			
		}

		function plugin_setting_file_include(){
			require_once plugin_dir_path(__FILE__) .'inc/plugin_setting.php';
		}
		
			
		
	}
	
	$WP_Disable_Gutenberg = new WP_Disable_Gutenberg(); 
	
}
