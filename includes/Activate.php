<?php
/**
 * @package Myplygun
 */

namespace WP_Palette;


class Activate
{
	public static function activate()
	{
		$wp_palette_data = get_option('wp_palette_data');

		if (!isset($wp_palette_data['colors'])) {
			update_option('wp_palette_data', [
				'colors' => []
			]);
		}
	}
}