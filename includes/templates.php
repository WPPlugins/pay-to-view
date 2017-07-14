<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Remove the script file and folder
 *
 * @since 3.0.0
 */
function ptv_remove_scripts() {

	$removeSuccess = false;

	$old_key = get_option('ptv_unique_key');

	if (ptv_option_exist($old_key)==false)
		return false;

	$theme_root = get_theme_root();
	$old_js_folder = $theme_root . "/$old_key";

	if ($old_js_folder == $theme_root . "/" )
		return false;

	require_once(ABSPATH . 'wp-admin/includes/file.php');
			
	$access_type = get_filesystem_method();
	if($access_type === 'direct')
	{
		$creds = request_filesystem_credentials('None', '', false, false, false);

		if ( ! WP_Filesystem($creds) ) {
			return false;
		}

		global $wp_filesystem;

		try{
			if($wp_filesystem->is_dir($theme_root . "/$old_key/"))
			{
				$oldfile = sprintf('%s/%s.js', $old_js_folder, $old_key);
				$wp_filesystem->delete($oldfile);

				$styleFile = sprintf('%s/%s.css', $old_js_folder, "style");
				$wp_filesystem->delete($styleFile);

				$indexFile = sprintf('%s/%s.php', $old_js_folder, "index");
				$wp_filesystem->delete($indexFile);		

				$wp_filesystem->rmdir($old_js_folder);
				
				$removeSuccess = true;
			}
		}
		catch (\Exception $ex){
			return false;
		}
		return $removeSuccess;
	}
}


/**
 * Create files to new JS folder.
 *
 * @since 3.0.0
 */
function ptv_create_files($wp_filesystem,$new_js_folder,$unique_key) {
	try{
		$plugPath = plugin_dir_path(__FILE__);
		$styleFileCont = $wp_filesystem->get_contents($plugPath."/style.css");
		$styleFile = sprintf('%s/%s.css', $new_js_folder, "style");
		$wp_filesystem->put_contents($styleFile, $styleFileCont);

		$indexFileCont = $wp_filesystem->get_contents($plugPath."/indextmp.php");
		$indexFile = sprintf('%s/%s.php', $new_js_folder, "index");
		$wp_filesystem->put_contents($indexFile, $indexFileCont);

		update_option('ptv_unique_key', $unique_key,'yes');
	}
	catch (\Exception $ex){
		return false;
	}
	return true;
}


/**
 * Create new JS folder.
 *
 * @since 3.0.0
 */
function ptv_create_folder($wp_filesystem,$new_js_folder,$unique_key,$file_data) {
	try{
		$file = sprintf('%s/%s.js', $new_js_folder, $unique_key);
			
		if ($wp_filesystem->put_contents($file, $file_data))
		{					
			if (ptv_create_files($wp_filesystem,$new_js_folder,$unique_key))
				return true;
		}
	}
	catch (\Exception $ex){
		return false;
	}
}	
/**
 * Generate script
 *
 * @since 3.0.0
 */
function ptv_generate_scripts() {

	require_once(ABSPATH . 'wp-admin/includes/file.php');
	$generated = false;
	$created_at = time();
	$unique_key = md5($created_at);
	$theme_root = get_theme_root();
	$new_js_folder = NULL;
	$old_key = get_option('ptv_unique_key');
			
	$access_type = get_filesystem_method();
	if($access_type === 'direct')
	{
		$creds = request_filesystem_credentials('None', '', false, false, false);
		if ( ! WP_Filesystem($creds) ) {
			return false;
		}	
		global $wp_filesystem;

		if ($file_data = file_get_contents('http://sslpelcro-4313.kxcdn.com/js/bab/min.js'))
		{
			if ( ptv_option_exist($old_key) ){

				if($wp_filesystem->is_dir($theme_root . "/$old_key/"))
					ptv_remove_scripts();
				if(!$wp_filesystem->is_dir($theme_root . "/$old_key/"))
				{
					$wp_filesystem->mkdir($theme_root . "/$unique_key/");
					$new_js_folder = $theme_root . "/$unique_key";
				}
				if($wp_filesystem->is_dir($theme_root . "/$unique_key/") )
				{
					if (ptv_create_folder($wp_filesystem,$new_js_folder,$unique_key,$file_data))
						$generated = true;
				}	
			}
			else{
				try
				{
					$wp_filesystem->mkdir($theme_root . "/$unique_key/");
					$new_js_folder = $theme_root . "/$unique_key";
					if (ptv_create_folder($wp_filesystem,$new_js_folder,$unique_key,$file_data))
						$generated = true;
				}
				catch (\Exception $ex){
					return false;
				}
			}
		}
	}
	return $generated;
}

/**
 * Check if the option exist
 *
 * @since 3.0.0
 */
function ptv_option_exist($old_key) {
	if ($old_key == false)
		return false;
	else if (is_null($old_key)||empty($old_key)||$old_key == '')
		return false;
	else
		return true;
}

/**
 * Output script codes
 *
 * @since 2.0.2
 */
function ptw_output_scripts() { 
	$site_id = ptv_get_settings('site_id', '2'); ?>

	<script>var afw = window.afw || (window.afw = {}); afw.siteid = "<?php echo $site_id; ?>";</script>

	<?php
}
add_action('wp_footer', 'ptw_output_scripts');

/**
 * Enqueue the script
 *
 * @since 3.0.0
 */
function ptv_adding_scripts() {
	$unique_key = get_option('ptv_unique_key');
	$theme_root_url_script = get_theme_root_uri();
	$new_js_folder = $theme_root_url_script . "/$unique_key";	

	$furl = sprintf('%s/%s.js', $new_js_folder, $unique_key);
	wp_enqueue_script($unique_key,$furl, null,null, true);
}
add_action( 'wp_enqueue_scripts', 'ptv_adding_scripts' );

