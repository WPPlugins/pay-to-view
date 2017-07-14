<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

class PTV_Admin_Handler {

	/**
	 * Constructor
	 *
	 * @since 2.0.2
	 */
	public function __construct() {
		$this->setup_variables();
		$this->setup_includes();
		$this->setup_actions();
	}

	/**
	 * Setup variables
	 *
	 * @since 2.0.2
	 */
	public function setup_variables() {
		$this->dir_path = PTV_ADMIN_DIR_PATH;
		$this->dir_url = PTV_ADMIN_DIR_URL;
	}

	/**
	 * Setup included files
	 *
	 * @since 2.0.2
	 */
	public function setup_includes() {
		require_once($this->dir_path . 'admin-settings.php');
	}

	/**
	 * Setup actions
	 *
	 * @since 2.0.2
	 */
	public function setup_actions() {

	}
}

new PTV_Admin_Handler();