<?php

/* REGISTER BLOCK PATTERNS USING WPE PATTERN MANAGER PLUGIN */

/* DISABLE DEFAULT PATTERNS */
add_action( 'after_setup_theme', 'remove_patterns' );
function remove_patterns() {
   remove_theme_support( 'core-block-patterns' );
}