<?php


namespace WP_Palette;

use WP_Palette\Helpers\Template;

class BaseClass
{
	/**
	 * Plugin's full path on current machine.
	 *
	 * @since    1.0.0
	 * @access   public
	 * @var      string $plugin_path
	 */
	public string $plugin_path;


	/**
	 * Plugin's folder URL.
	 *
	 * @since    1.0.0
	 * @access   public
	 * @var      string $plugin_url
	 */
	public string $plugin_url;


	/**
	 * Plugin's folder and main file.
	 *
	 * @since    1.0.0
	 * @access   public
	 * @var      string $plugin
	 */
	public string $plugin;


	/**
	 * The admin pages of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      array $pages
	 */
	private array $pages;

	public function __construct()
	{
		$this->plugin_path = plugin_dir_path( dirname( __FILE__, 1 ) );
		$this->plugin_url  = plugin_dir_url( dirname( __FILE__, 1 ) );
		$this->plugin      = plugin_basename( dirname( __FILE__, 2 ) ) . '/wp-palette.php';
	}

	protected function get_admin_pages()
	{
		return [
			[
				'parent_slug' => 'todoit',
				'page_title'  => __( 'WP Palette', WP_PALETTE_TEXT_DOMAIN ),
				'menu_title'  => __( 'WP Palette', WP_PALETTE_TEXT_DOMAIN ),
				'capability'  => 'manage_options',
				'menu_slug'   => 'wp_palette_options',
				'callback'    => function () {
					Template::loadTemplate( 'general.php' );
				},
			]
		];
	}
}