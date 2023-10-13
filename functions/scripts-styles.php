<?php

/* FRONT-END SCRIPTS & STYLES */
function add_theme_scripts() {
    wp_enqueue_style( 'style', get_stylesheet_uri() );
    wp_enqueue_style( 'theme', get_template_directory_uri() . '/theme.css', array(), '1.1', 'all');    
    wp_enqueue_script( 'script', get_template_directory_uri() . '/js/main.js', array (), 1.1, true);

}

/* BACK-END SCRIPTS & STYLES */
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );
function wpdocs_theme_add_editor_styles() {
    add_editor_style( 'theme.css' );
    wp_enqueue_script(  'main-js', get_stylesheet_directory_uri().'/js/main.js' );
}
add_action( 'admin_init', 'wpdocs_theme_add_editor_styles' );

/* ADD CSS TO GUTENBERG EDITOR VIEW (HIDE STUFF) */
function theme_styles() {
    add_editor_style( array( 'theme-editor.css' ) );
}
add_action( 'after_setup_theme', 'theme_styles', 99 );