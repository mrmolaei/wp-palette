<?php

namespace WP_Palette\Services;

use WP_Palette\BaseClass;
use WP_Palette\Helpers\Template;

class Settings extends BaseClass
{

	/**
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      array $settings
	 */
	private array $settings;


	/**
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      array $sections
	 */
	private array $sections;


	/**
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      array $fields
	 */
	private array $fields;

	public function __construct()
	{
		parent::__construct();
		$this->settings = $this->get_settings();
		$this->sections = $this->get_sections();
		$this->fields   = $this->get_fields( $this->sections[0] );
	}

	public function register()
	{
		add_action( 'admin_init', array( $this, 'setup_settings' ) );
		add_action( 'admin_init', array( $this, 'setup_sections' ) );
		add_action( 'admin_init', array( $this, 'setup_fields' ) );
	}

	public function setup_settings()
	{
		foreach ( $this->settings as $setting ) {
			register_setting( $setting['option_group'], $setting['option_name'], $setting['callback'] );
		}
	}

	public function get_settings()
	{
		return [
			[
				'option_group' => 'wp_palette_data',
				'option_name'  => 'wp_palette_data',
				'callback'     => 'WP_Palette\\Helpers\\Sanitize\\sanitizeColor',
			],
		];
	}


	public function setup_sections()
	{
		foreach ( $this->sections as $section ) {
			add_settings_section( $section['id'], $section['title'], $section['callback'], $section['page'] );
		}
	}

	public function get_sections()
	{
		return [
			[
				'id'       => 'wp_palette_section',
				'title'    => 'WP Palette Section',
				'callback' => function () {
					Template::loadTemplate( 'partials/options-section.php' );
				},
				'page'     => $this->page['menu_slug'],
				'args'     => []
			]
		];
	}


	public function setup_fields()
	{
		foreach ( $this->fields as $fields ) {
			add_settings_field( $fields['id'], $fields['title'], $fields['callback'], $fields['page'], $fields['section'], $fields['args'] );
		}
	}

	public function get_fields( array $section )
	{
		return [
			[
				'id'       => 'wp_palette_data',
				'title'    => 'Colors',
				'callback' => function () {
					Template::loadTemplate( 'inputs/text-input.php' );
				},
				'page'     => $this->page['menu_slug'],
				'section'  => $section['id'],
				'args'     => []
			]
		];
	}


}