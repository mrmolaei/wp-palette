<?php


namespace WP_Palette\Services;


class ColorsPalette
{
	public function register() {
		add_action( 'after_setup_theme', [ $this, 'addColorsToGutenberg' ], 20 );
	}

	public function getColors() {
		$wp_palette_data = get_option('wp_palette_data');
		return $wp_palette_data['colors'];

	}

	public function addColorsToGutenberg()
	{
		$themeColors = get_theme_support( 'editor-color-palette' );
		$colors = $this->getColors();

		$colorPalette = [];

		foreach ( $colors as $key => $color )
		{
			$colorPalette[] = [
				'name'  => $color['name'],
				'slug'  => "wp-palette-color-{$key}-{$color['name']}",
				'color' => $color['color'],
			];
		}

		// Merge if there are existing colors
		if ( isset( $themeColors[0] ) ) {
			$colorPalette = array_merge( $themeColors, $colorPalette );
		}

		add_theme_support( 'editor-color-palette', $colorPalette );
	}
}