<?php


namespace WP_Palette\Helpers;


class Color
{
	public static function hexToRgb( $hex )
	{
		// Convert hex to RGB
		if ( strlen( $hex ) == 7 ) {
			$rgb = array_map( 'hexdec', str_split( ltrim( $hex, '#' ), 2 ) );
		} else {
			$hex = '#' . implode( "", array_map( function ( $digit ) {
					return str_repeat( $digit, 2 );
				}, str_split( ltrim( $hex, '#' ), 1 ) ) );
			$rgb = array_map( 'hexdec', str_split( ltrim( $hex, '#' ), 2 ) );
		}

		$output = 'rgb(' . implode( ", ", $rgb ) . ')';

		return $output;
	}

	public static function hexToHsl( $hex )
	{
		// Convert hex to RGB
		if ( strlen( $hex ) == 7 ) {
			$rgb = array_map( 'hexdec', str_split( ltrim( $hex, '#' ), 2 ) );
		} else {
			$hex = '#' . implode( "", array_map( function ( $digit ) {
					return str_repeat( $digit, 2 );
				}, str_split( ltrim( $hex, '#' ), 1 ) ) );
			$rgb = array_map( 'hexdec', str_split( ltrim( $hex, '#' ), 2 ) );
		}

		// Convert RGB to HSL
		$hsl = self::rgbToHsl( $rgb[0], $rgb[1], $rgb[2] );

		$hsl[0] = round( $hsl[0], 1 );
		$hsl[1] = round( $hsl[1] ) * 100 . "%";
		$hsl[2] = round( $hsl[2] * 100 ) . "%";

		$output = 'hsl(' . implode( ", ", $hsl ) . ')';

		return $output;
	}

	public static function rgbToHsl( $r, $g, $b )
	{
		// Normalize the RGB values
		$r /= 255;
		$g /= 255;
		$b /= 255;

		// Find the minimum and maximum RGB values
		$min = min( $r, $g, $b );
		$max = max( $r, $g, $b );

		// Calculate the hue
		if ( $max == $min ) {
			$h = 0;
		} else if ( $max == $r ) {
			$h = 60 * ( $g - $b ) / ( $max - $min );
		} else if ( $max == $g ) {
			$h = 60 * ( $b - $r ) / ( $max - $min ) + 120;
		} else {
			$h = 60 * ( $r - $g ) / ( $max - $min ) + 240;
		}

		// Normalize the hue to be between 0 and 360
		if ( $h < 0 ) {
			$h += 360;
		} else if ( $h > 360 ) {
			$h -= 360;
		}

		// Calculate the saturation
		if ( $max == 0 ) {
			$s = 0;
		} else {
			$s = ( $max - $min ) / $max;
		}

		// Calculate the lightness
		$l = ( $max + $min ) / 2;

		// Return the HSL values as an array
		return array( $h, $s, $l );

	}

}