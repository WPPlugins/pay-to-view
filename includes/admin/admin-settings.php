<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

class PTV_Admin_Settings {

	private $page_slug = 'pay-to-view';
	private $page_settings = array();

	/**
	 * Constructor
	 *
	 * @since 2.0.2
	 */
	public function __construct() {
		add_action('admin_menu', array($this, 'register_menu'));
		add_action('admin_init', array($this, 'register_settings'));
	}

	/**
	 * Register admin menu
	 *
	 * @since 2.0.2
	 */
	public function register_menu() {
        add_options_page(
            __('Pay-to-view Settings', 'pay-to-view'), 
            __('Pay-to-view', 'pay-to-view'), 
            'manage_options', 
            $this->page_slug, 
            array($this, 'output_settings')
        );
	}

	/**
	 * Output settings page
	 *
	 * @since 2.0.2
	 */
	public function output_settings() { 
		$this->page_settings = ptv_get_settings(); ?>

		<div class="wrap">
			<h2><?php _e('Pay-to-view Settings', 'pay-to-view'); ?></h2>

			<form method="post" action="options.php">
				<?php settings_fields('ptv_settings'); ?>
				<?php do_settings_sections($this->page_slug); ?>
				<?php submit_button(); ?>
			</form>
		</div>

		<?php
	}

	/**
	 * Register admin settings
	 *
	 * @since 2.0.2
	 */
	public function register_settings() {
		register_setting(
			'ptv_settings',
			'ptv_settings',
			array($this, 'sanitize_settings')
		);

		# General Settings

		add_settings_section(
			'ptv_general_setings',
			__('General Settings', 'pay-to-view'),
			array($this, 'output_section_field'),
			$this->page_slug
		);

		add_settings_field(
			'site_id',
			__('Site ID', 'pay-to-view'),
			array($this, 'output_site_id_field'),
			$this->page_slug,
			'ptv_general_setings'
		);
	}

	/**
	 * Sanitize setting fields
	 *
	 * @since 2.0.2
	 * @param mixed $input
	 * @return mixed $input
	 */
	public function sanitize_settings($input) {

		if (isset($input['site_id'])) {
			$input['site_id'] = sanitize_text_field($input['site_id']);
		}

		return $input;
	}

	/**
	 * Output setting section field
	 *
	 * @since 2.0.2
	 */
	public function output_section_field() {
		printf('');
	}

	/**
	 * Output "Site ID" setting field
	 *
	 * @since 2.0.2
	 */
	public function output_site_id_field() { ?>
		<?php printf(
			'<input type="text" class="regular-text" name="ptv_settings[site_id]" value="%s" />',
			isset($this->page_settings['site_id']) && $this->page_settings['site_id'] ? $this->page_settings['site_id'] : ''
		); ?>

		<a target="_blank" href="//www.pelcro.com/auth/register" class="button">
			<?php _e('Customize Popup', 'pay-to-view'); ?>
		</a>

		<p class="description">
			<?php _e('Please enter your "Site ID" code.', 'pay-to-view'); ?>
		</p>

		<?php
	}
}

if (is_admin()) {
	return new PTV_Admin_Settings();
}