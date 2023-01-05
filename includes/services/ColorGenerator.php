<?php


namespace WP_Palette\Services;


use WP_Palette\Helpers\Sanitize;

class ColorGenerator
{
	public function register()
	{
		add_action( 'wp_head', [ $this, 'generateColorsVars' ] );
	}

	private function getColors()
	{
		$wp_palette_data = get_option( 'wp_palette_data' );

		if ( $wp_palette_data ) {
			return $wp_palette_data['colors'];
		}

		return false;
	}

	public function generateColorsVars()
	{
		$colors = $this->getColors();

		if ( ! $colors ) {
			return;
		}

		echo "<style id='wp-palette-colors'>\n" .
		     ":root { \n";

		foreach ( $colors as $key => $color ) {
			$name = Sanitize::escapeSpecialChars( str_replace( ' ', '', strtolower( $color['name'] ) ) );
			echo "--wp-palette-color-{$key}-{$name}: " . $color['color'] . ";\n";
		}

		echo "}" .
		     "</style>\n";
	}
}