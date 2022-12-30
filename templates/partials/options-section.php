<?php
$palette_data = get_option( 'wp_palette_data' );
$colors       = isset( $palette_data['colors'] ) && $palette_data['colors'] ? $palette_data['colors'] : [
	[
		'name'  => 'Color Name',
		'color' => '#fff'
	]
];
?>
<div class="c-grid">
    <div class="c-grid__col">
        <h3><?php _e( 'Colors', WP_PALETTE_TEXT_DOMAIN ); ?></h3>
        <div class="c-card">
            <table class="c-table s-table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Color</th>
                    <th class="has-input">RGB</th>
                    <th class="has-input">HSL</th>
                </tr>
                </thead>
                <tbody>
				<?php foreach ( $colors as $key => $color ) { ?>
                    <tr>
                        <td>
                            <input name="wp_palette_data[colors][<?php echo $key; ?>][name]"
                                   value="<?php echo $color['name']; ?>">
                        </td>
                        <td>
                            <input name="wp_palette_data[colors][<?php echo $key; ?>][color]"
                                   value="<?php echo $color['color']; ?>" class="js-color-picker-toggle c-color-input"
                                   style="background-color: <?php echo $color['color']; ?>" type="text" readonly/>
                        </td>
                        <td>
                            <input class="js-color-picker-rgb c-color-input c-color-input--data" value="<?php echo \WP_Palette\Helpers\Color::hexToRgb($color['color']) ?>" type="text" readonly/>
                        </td>
                        <td>
                            <input class="js-color-picker-hsl c-color-input c-color-input--data" value="<?php echo \WP_Palette\Helpers\Color::hexToHSL($color['color']) ?>" type="text" readonly/>
                        </td>
                    </tr>
				<?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="c-grid__col">
        <h3><?php _e( 'Gradients', WP_PALETTE_TEXT_DOMAIN ); ?></h3>
        <div class="c-card">
            COl2
        </div>
    </div>
</div>

<div class="c-color-picker js-color-picker-box">
    <div class="js-color-picker"></div> <!-- Color Picker -->
</div>
