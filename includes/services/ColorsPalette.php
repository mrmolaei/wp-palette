<?php


namespace WP_Palette\Services;


class ColorsPalette
{
	public function register() {
		add_filter( 'block_editor_settings_all', array( $this, 'addColorsToEditorSettings' ) );
	}

	public function getColors() {
		$wp_palette_data = get_option('wp_palette_data');

		if ($wp_palette_data) {
			return $wp_palette_data['colors'];
		}

		return false;
	}

	public function addColorsToEditorSettings($settings)
	{
		$colors = $this->getColors();

		if (!$colors) {
			return;
		}

		$colorPalette = [];
		$themeColors = $settings['__experimentalFeatures']['color']['palette']['theme'];

		foreach ( $colors as $key => $color )
		{
			$colorPalette[] = [
				'name'  => $color['name'],
				'slug'  => "wp-palette-color-{$key}-{$color['name']}",
				'color' => $color['color'],
			];
		}


		$settings['__experimentalFeatures']['color']['palette']['custom'] = $colorPalette;

		return $settings;
	}
}