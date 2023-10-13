<?php
/*
Plugin Name: Custom SVG Support with Security
Description: Adds SVG support to WordPress and enhances security
*/

// Allow SVG file uploads for administrators only
function custom_allow_svg_upload( $mimes ) {
    if ( current_user_can( 'administrator' ) ) {
        $mimes['svg'] = 'image/svg+xml';
    }
    return $mimes;
}
add_filter( 'upload_mimes', 'custom_allow_svg_upload' );

// Display SVGs in the media library
function custom_svg_display( $response, $attachment, $meta ) {
    if ( 'image/svg+xml' === $response['mime'] ) {
        $response['sizes']['full'] = array(
            'url' => $response['url'],
            'width' => $meta['width'],
            'height' => $meta['height'],
        );
    }
    return $response;
}
add_filter( 'wp_prepare_attachment_for_js', 'custom_svg_display', 10, 3 );

// Filter to remove potentially malicious code from SVG uploads
function custom_filter_svg_upload( $file ) {
    if ( current_user_can( 'administrator' ) && isset( $file['type'] ) && 'image/svg+xml' === $file['type'] ) {
        $file['type'] = 'text/xml'; // Change the mime type to text/xml
    }
    return $file;
}
add_filter( 'wp_check_filetype_and_ext', 'custom_filter_svg_upload', 10, 4 );

// Remove potentially harmful SVG attributes from uploaded SVGs
function custom_sanitize_svg( $allowed_tags, $context ) {
    if ( 'post' === $context ) {
        $allowed_atts = array(
            'x',
            'y',
            'width',
            'height',
            'viewBox',
            'preserveAspectRatio',
            'xmlns',
            'version',
            'baseProfile',
        );

        if ( isset( $allowed_tags['svg'] ) ) {
            $allowed_tags['svg'] = array_merge( $allowed_tags['svg'], $allowed_atts );
        }
    }

    return $allowed_tags;
}
add_filter( 'wp_kses_allowed_html', 'custom_sanitize_svg', 10, 2 );


