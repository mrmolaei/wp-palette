<?php
/**
 *
 * @link              https://mrmolaei.com
 * @since             1.0.0
 * @package           WP_Palette
 *
 * @wordpress-plugin
 * Plugin Name:       Palette
 * Plugin URI:        https://mrmolaei.com/plugins/wp-palette
 * Description:       Create colors and gradient presets for use in the Gutenberg block editor.
 * Version:           1.0.0
 * Author:            Mohammadreza Molaei
 * Author URI:        https://mrmolaei.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-palette
 * Domain Path:       /languages
 */

! defined( 'ABSPATH' ) && die;

define( 'WP_PALLETE_VERSION', '1.0.0' );



if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

define( 'WP_PALETTE_CLASS', 'WpPalette' );

if (class_exists('WP_Palette\\WpPalette')) {
	WP_Palette\WpPalette::register_services();

}

//register_activation_hook( __FILE__, 'Todo_It\\TodoIt::activate' );
//
//register_deactivation_hook( __FILE__, array( $todo_it_instance, 'deactivate' ) );
//
//register_uninstall_hook( __FILE__, array( WP_PALLETE_CLASS, 'uninstall' ) );