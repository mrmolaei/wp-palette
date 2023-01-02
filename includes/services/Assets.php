<?php


namespace WP_Palette\Services;


use WP_Palette\BaseClass;

class Assets extends BaseClass
{

	public function register()
	{
		add_action( 'admin_enqueue_scripts', [ $this, 'adminAssets' ] );
	}

	public function adminAssets()
	{
		if ( is_admin() && isset( $_REQUEST['page'] ) && ( substr( $_REQUEST['page'], 0, 10 ) == "wp_palette" ) ) {
			wp_enqueue_script( 'wp-palette-iro-library', $this->plugin_url . 'assets/js/iro.min.js' );
			wp_enqueue_script( 'wp-palette-admin-scripts', $this->plugin_url . 'assets/js/scripts.js' );
			wp_enqueue_style( 'wp-palette-admin-styles', $this->plugin_url . 'assets/css/main.css' );
		}
	}
}