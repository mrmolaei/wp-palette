<?php
$palette_data = get_option( 'wp_palette_data' );
$colors       = isset( $palette_data['colors'] ) && $palette_data['colors'] ? $palette_data['colors'] : [
	[
		'name'  => 'Color Name',
		'color' => '#ffffff'
	]
];
?>
<div class="c-grid">
    <div class="c-grid__col">
        <h3><?php _e( 'Colors', WP_PALETTE_TEXT_DOMAIN ); ?></h3>
        <div class="c-card">
            <div class="c-table-wrapper">
                <table class="c-table s-table">
                    <thead>
                    <tr>
                        <th><?php _e('Name', WP_PALETTE_TEXT_DOMAIN); ?></th>
                        <th><?php _e('Color', WP_PALETTE_TEXT_DOMAIN); ?></th>
                        <th class="has-input"><?php _e('RGB', WP_PALETTE_TEXT_DOMAIN); ?></th>
                        <th class="has-input"><?php _e('HSL', WP_PALETTE_TEXT_DOMAIN); ?></th>
                    </tr>
                    </thead>
                    <tbody class="js-colors-table-body">
		            <?php foreach ( $colors as $key => $color ) { ?>
                        <tr data-tr-id="<?php echo $key; ?>">
                            <td>
                                <button class="c-btn c-btn--remove js-remove-color">
                                    <span class="dashicons dashicons-no-alt"></span>
                                </button>
                                <input class="c-color-name-input" name="wp_palette_data[colors][<?php echo $key; ?>][name]"
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
                    <tfoot>
                    <tr>
                        <td colspan="4">
                            <button class="js-add-color c-btn">
                                <span class="dashicons dashicons-plus-alt2"></span>
					            <?php _e('Add Color', WP_PALETTE_TEXT_DOMAIN); ?>
                            </button>
                        </td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <div class="c-grid__col">
        <h3><?php _e( 'Gradients', WP_PALETTE_TEXT_DOMAIN ); ?></h3>
        <div class="c-card" style="display: flex; align-items: center; justify-content: center; min-height: 150px;">
            <h3 style="margin: 8px 0 0;"><?php _e('Coming soon...', WP_PALETTE_TEXT_DOMAIN); ?></h3>
        </div>
    </div>
</div>

<div class="c-color-picker js-color-picker-box">
    <div class="js-color-picker"></div> <!-- Color Picker -->
</div>
