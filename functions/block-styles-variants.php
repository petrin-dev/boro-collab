<?php

// Add Variations to Core Blocks
function block_variants() {
	wp_enqueue_script(
		'prefix-block-variations',
		get_template_directory_uri() . '/js/blocks/block-variants.js',
		array( 'wp-blocks' )
	);
}
add_action( 'enqueue_block_editor_assets', 'block_variants' );

// Add Block Styles to Core Blocks
function block_styles() {
    wp_enqueue_script(
        'myguten-script',
        get_stylesheet_directory_uri() . '/js/blocks/block-styles.js',
        array( 'wp-blocks', 'wp-dom-ready', 'wp-edit-post' ),
        get_template_directory_uri() . '/js/blocks/block-styles.js'
    );
}
add_action( 'enqueue_block_editor_assets', 'block_styles' );