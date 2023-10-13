<?php

/* ADD IDENTIFIER CLASS TO FRONT-END */
function wp_body_classes( $classes ) {
    $classes[] = 'front-end';
     
    return $classes;
}
add_filter( 'body_class','wp_body_classes' );

/* DISABLE JQUERY MIGRATE */
function dequeue_jquery_migrate( $scripts ) {
    if ( ! is_admin() && ! empty( $scripts->registered['jquery'] ) ) {
        $scripts->registered['jquery']->deps = array_diff(
            $scripts->registered['jquery']->deps,
            [ 'jquery-migrate' ]
        );
    }
}
add_action( 'wp_default_scripts', 'dequeue_jquery_migrate' );

/* DISABLE COMMENTS */
// First, this will disable support for comments and trackbacks in post types
function df_disable_comments_post_types_support() {
    $post_types = get_post_types();
    foreach ($post_types as $post_type) {
       if(post_type_supports($post_type, 'comments')) {
          remove_post_type_support($post_type, 'comments');
          remove_post_type_support($post_type, 'trackbacks');
       }
    }
}
add_action('admin_init', 'df_disable_comments_post_types_support');
// Second, disable from the sidebar in WP Admin
function my_remove_admin_menus() {
    remove_menu_page( 'edit-comments.php' );
}
add_action( 'admin_init', 'my_remove_admin_menus' );

/* ADD REUSABLE BLOCKS TO WP ADMIN SIDEBAR */
// function reusable_blocks_admin_menu() {
//     add_menu_page( 'Reusable Blocks', 'Reusable Blocks', 'edit_posts', 'edit.php?post_type=wp_block', '', 'dashicons-editor-table', 22 );
// }
// add_action( 'admin_menu', 'reusable_blocks_admin_menu' );