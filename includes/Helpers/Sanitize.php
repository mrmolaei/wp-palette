<?php


namespace WP_Palette\Helpers;


class Sanitize
{
	public static function sanitizeColor($input) : string
	{
		// Remove any spaces and special characters before and after the string
		$color = trim( $input );

		// Remove any trailing '#' symbols from the color value
		$color = str_replace( '#', '', $color );

		// If the string is 6 characters long then use it in pairs.
		if ( 3 == strlen( $color ) ) {
			$color = substr( $color, 0, 1 ) . substr( $color, 0, 1 ) . substr( $color, 1, 1 ) . substr( $color, 1, 1 ) . substr( $color, 2, 1 ) . substr( $color, 2, 1 );
		}

		$substr = array();
		for ( $i = 0; $i <= 5; $i++ ) {
			$default    = ( 0 == $i ) ? 'F' : ( $substr[$i-1] );
			$substr[$i] = substr( $color, $i, 1 );
			$substr[$i] = ( false === $substr[$i] || ! ctype_xdigit( $substr[$i] ) ) ? $default : $substr[$i];
		}
		$hex = implode( '', $substr );

		return '#' . $hex;
	}

	public static function escapeSpecialChars($string) {
		$string = str_replace(' ', '-', $string); // Replaces spaces with hyphens.
		return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
	}
}