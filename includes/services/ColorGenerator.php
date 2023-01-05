<?php


namespace WP_Palette\Services;


use WP_Palette\Helpers\Sanitize;

class ColorGenerator extends ColorsPalette
{
	public function register()
	{
		if ( $this->colors && count( $this->colors ) ) {
			add_action( 'wp_head', [ $this, 'generateColorsVars' ] );
			add_action( 'admin_head', [ $this, 'generateColorsVars' ] );
		}
	}

	public function generateColorsVars()
	{
		$colors = $this->colors;

		if ( ! $colors || ! count( $colors ) ) {
			return null;
		}

		echo "<style id='wp-palette-colors'>\n" .
		     ":root { \n";

		foreach ( $colors as $key => $color ) {
			$name = Sanitize::escapeSpecialChars( str_replace( ' ', '', strtolower( $color['name'] ) ) );
			echo "--wp--preset--color--wp-palette-color-{$key}-{$name}: " . $color['color'] . ";\n";
		}

		echo "}" .
		     "</style>\n";
	}
}