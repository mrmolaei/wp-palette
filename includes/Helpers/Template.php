<?php


namespace WP_Palette\Helpers;

/**
 * Class Template
 * @package WP_Palette\Helpers
 */
class Template
{
	/**
	 * @param string $template_name
	 *
	 * @return void
	 */
	public static function load_template( string $template_name )
	{
		$template_file_name = self::check_template_name($template_name);

		if (gettype($template_file_name) != "boolean" && self::template_exists($template_file_name)) {
			require_once plugin_dir_path( dirname( __FILE__, 2 ) ) . "templates/$template_file_name";
		}
	}

	/**
	 * @param string $template_name
	 *
	 * @return false|string
	 */
	protected static function check_template_name(string $template_name) {
		$template_file_suffix = ".php";

		//@todo In PHP version 8.0.0 use str_ends_with() instead.
		$template_file_name = ( ( strlen( $template_name ) - ( strpos( $template_name, $template_file_suffix ) ) ) == 4
			? $template_name
			: $template_name . $template_file_suffix );

		return $template_file_name;
	}

	/**
	 * @param string $template_file_name
	 *
	 * @return bool
	 */
	protected static function template_exists(string $template_file_name)
	{
		return ( file_exists( plugin_dir_path( dirname( __FILE__, 2 ) ) . "templates/$template_file_name" ) );
	}
}