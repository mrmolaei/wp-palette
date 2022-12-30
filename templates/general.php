<div class="wrap">
	<h1><?php _e('WP Palette', WP_PALETTE_TEXT_DOMAIN); ?></h1>
	<form method="post" action="options.php">
		<?php
		settings_fields( 'wp_palette_data' );
		do_settings_sections( 'wp_palette_options' );
		submit_button();
		?>
	</form>
</div>