<?php


namespace WP_Palette\Services;


use WP_Palette\Helpers\Sanitize;

class StyleGenerator extends ColorsPalette
{
	public function register()
	{
		if ( $this->colors && count( $this->colors ) ) {
			add_action( 'wp_head', [ $this, 'generateColorsStyles' ] );
		}
	}

	public function generateColorsStyles()
	{
		$colors = $this->colors;

		echo "<style id='wp-palette-styles'>\n";

		foreach ( $colors as $key => $color ) {
			$name = Sanitize::escapeSpecialChars( str_replace( ' ', '', strtolower( $color['name'] ) ) );
			echo ".has-wp-palette-color-{$key}-{$name}-color { \n" .
			     "color: var(--wp--preset--color--wp-palette-color-{$key}-{$name});\n } \n";

			echo ".has-wp-palette-color-{$key}-{$name}-background-color { \n" .
			     "background-color: var(--wp--preset--color--wp-palette-color-{$key}-{$name});\n } \n";
		}

		echo "</style>\n";
	}
}