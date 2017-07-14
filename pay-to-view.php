<?php
/**
 * Plugin Name: Ad-free Monetization
 * Plugin URI: http://www.pelcro.com/
 * Description: A pay-to-view feature for your website.
 * Version: 3.0.2
 * Author: Pelcro
 * Author URI: http://www.pelcro.com/
 * Requires at least: 3.0
 * Tested up to: 4.7
 *
 * Text Domain: pay-to-view
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

define('PTV_DIR_PATH', trailingslashit(plugin_dir_path(__FILE__)));
define('PTV_DIR_URL', trailingslashit(plugin_dir_url(__FILE__)));

define('PTV_ADMIN_DIR_PATH', trailingslashit(PTV_DIR_PATH . 'includes/admin'));
define('PTV_ADMIN_DIR_URL', trailingslashit(PTV_DIR_URL . 'includes/admin'));

require_once(PTV_DIR_PATH . 'includes/functions.php');
require_once(PTV_DIR_PATH . 'includes/templates.php');

if (is_admin()) {
	require_once(PTV_ADMIN_DIR_PATH . 'admin-handler.php');
}

//Add a custom updating interval other than WP's default ones.
add_filter( 'cron_schedules', 'ptv_add_custom_schedule' );

/**
 * Create custom interval other than WP's default ones.
 *
 * @since 3.0.0
 */
function ptv_add_custom_schedule( $schedules ) {
	$schedules['ptv_custom_interval'] = array(
	'interval' => 90, //7 days * 24 hours * 60 minutes * 60 seconds
	'display' => __( 'PTV custom interval', 'pelcro.com' )
	);

	return $schedules;
}

/**
 * Register a WP cron job to update the JS file each day.
 *
 * @since 3.0.0
 */
function ptv_cdjs_schedule(){
	if ( ! wp_next_scheduled( 'ptv_cdjs' ) ) {
	    wp_schedule_event( time(), 'daily', 'ptv_cdjs' );
	}

	update_option('ptv_unique_key', NULL, 'yes');
	
	ptv_generate_scripts();
}

//Adds script generation function to the daily cron job.
add_action('ptv_cdjs', 'ptv_generate_scripts');

//Registers the cron job initialization function with the activation hook.
register_activation_hook( __FILE__, 'ptv_cdjs_schedule' );

//Registers the cron job deactivation function with the deactivation hook.
register_deactivation_hook( __FILE__, 'ptv_cdjs_remove_schedule' );

/**
 * Remove the cron job
 *
 * @since 3.0.0
 */
function ptv_cdjs_remove_schedule(){
  	wp_clear_scheduled_hook( 'ptv_cdjs' );
  	ptv_remove_scripts();
  	delete_option('ptv_unique_key');
}
