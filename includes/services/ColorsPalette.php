<?php


namespace WP_Palette\Services;


use WP_Palette\Helpers\Sanitize;

class ColorsPalette
{
	protected $colors;

	public function __construct() {
		$this->colors = $this->getColors();
	}

	public function register()
	{
		if ( $this->colors && count( $this->colors ) ) {
			add_filter( 'block_editor_settings_all', array( $this, 'addColorsToEditorSettings' ) );
		}
	}

	public function getColors()
	{
		$wp_palette_data = get_option( 'wp_palette_data' );

		if ( $wp_palette_data ) {
			return $wp_palette_data['colors'];
		}

		return false;
	}

	public function addColorsToEditorSettings( $settings )
	{
		$colors = $this->getColors();

		$colorPalette = [];
		$themeColors  = $settings['__experimentalFeatures']['color']['palette']['theme'];

		foreach ( $colors as $key => $color ) {
			$name           = Sanitize::escapeSpecialChars( str_replace( ' ', '', strtolower( $color['name'] ) ) );
			$colorPalette[] = [
				'name'  => $color['name'],
				'slug'  => "wp-palette-color-{$key}-{$name}",
				'color' => $color['color'],
			];
		}


		$settings['__experimentalFeatures']['color']['palette']['custom'] = $colorPalette;

		return $settings;
	}
}