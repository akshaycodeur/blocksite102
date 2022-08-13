<?php
/**
 * Block styles.
 *
 * @package blocksite102
 * @since 1.0.0
 */

/**
 * Register block styles
 *
 * @since 1.0.0
 *
 * @return void
 */
function blocksite102_register_block_styles() {

	register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
		'core/button',
		array(
			'name'  => 'blocksite102-flat-button',
			'label' => __( 'Flat button', 'blocksite102' ),
		)
	);

	register_block_style( // phpcs:ignore WPThemeReview.PluginTerritory.ForbiddenFunctions.editor_blocks_register_block_style
		'core/button',
		array(
			'name'  => 'blocksite102-shadow-button',
			'label' => __( 'Button with shadow', 'blocksite102' ),
		)
	);
}
add_action( 'init', 'blocksite102_register_block_styles' );
