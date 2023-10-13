<?php

/* THEME OPTIONS PAGE */
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page('Global Options');
}


/* ACF FIELD REGISTER FOR PAGE OPTIONS & TRACKING SCRIPTS */
if( function_exists('acf_add_local_field_group') ):

    // acf_add_local_field_group(array(
    //     'key' => 'group_63a5d958800fd',
    //     'title' => 'Page Options',
    //     'fields' => array(
    //         array(
    //             'key' => 'field_63a5d95811fb1',
    //             'label' => 'Show "Work With Us"?',
    //             'name' => 'show_work_with_us',
    //             'aria-label' => '',
    //             'type' => 'true_false',
    //             'instructions' => '',
    //             'required' => 0,
    //             'conditional_logic' => 0,
    //             'wrapper' => array(
    //                 'width' => '',
    //                 'class' => '',
    //                 'id' => '',
    //             ),
    //             'message' => '',
    //             'default_value' => 0,
    //             'ui' => 0,
    //             'ui_on_text' => '',
    //             'ui_off_text' => '',
    //         ),
    //     ),
    //     'location' => array(
    //         array(
    //             array(
    //                 'param' => 'post_type',
    //                 'operator' => '!=',
    //                 'value' => 'post',
    //             ),
    //             array(
    //                 'param' => 'post_type',
    //                 'operator' => '!=',
    //                 'value' => 'careers',
    //             ),
    //         ),
    //     ),
    //     'menu_order' => 0,
    //     'position' => 'side',
    //     'style' => 'default',
    //     'label_placement' => 'left',
    //     'instruction_placement' => 'label',
    //     'hide_on_screen' => '',
    //     'active' => true,
    //     'description' => '',
    //     'show_in_rest' => 0,
    // ));
    
    acf_add_local_field_group(array(
        'key' => 'group_6390ef4357a26',
        'title' => 'Tracking Scripts',
        'fields' => array(
            array(
                'key' => 'field_6390ef43fa026',
                'label' => 'Tracking scripts in HEAD',
                'name' => 'tracking_scripts_head',
                'aria-label' => '',
                'type' => 'textarea',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'maxlength' => '',
                'rows' => '',
                'placeholder' => '',
                'new_lines' => '',
            ),
            array(
                'key' => 'field_6390ef56fa027',
                'label' => 'Tracking scripts at opening BODY',
                'name' => 'tracking_scripts_opening_body',
                'aria-label' => '',
                'type' => 'textarea',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'maxlength' => '',
                'rows' => '',
                'placeholder' => '',
                'new_lines' => '',
            ),
            array(
                'key' => 'field_6390ef80fa028',
                'label' => 'Tracking scripts at closing BODY',
                'name' => 'tracking_scripts_closing_body',
                'aria-label' => '',
                'type' => 'textarea',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'maxlength' => '',
                'rows' => '',
                'placeholder' => '',
                'new_lines' => '',
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'options_page',
                    'operator' => '==',
                    'value' => 'acf-options-global-options',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
        'show_in_rest' => 0,
    ));
    
    endif;		

// Hook into opening head -- ACF field for scripts
function hook_meta() { echo the_field('tracking_scripts_head', 'option'); }
add_action('wp_head', 'hook_meta');
// Hook into opening body -- ACF field for scripts
add_action('wp_body_open', 'add_code_on_body_open');
function add_code_on_body_open() { echo the_field('tracking_scripts_opening_body', 'option'); }
// Hook into closing body -- ACF field for scripts
add_action('wp_footer', 'add_code_on_body_close');
function add_code_on_body_close() { echo the_field('tracking_scripts_closing_body', 'option'); }

/* HOOK INTO BODY CLASSES FOR ACF OPTIONS */

// EXAMPLE: Site-wide page option that adds body class based on true/false field
// add_filter( 'body_class', 'append_to_body' );
// function append_to_body( $classes ) {

//     if (get_field('show_work_with_us')) {
//         $classes[] = 'has-work-with-us';
//     }
//     return $classes;

// }

// Add ACF Fieldset for WP API Block
if( function_exists('acf_add_local_field_group') ):

    acf_add_local_field_group(array(
        'key' => 'group_63f3aa4c2867f',
        'title' => 'Category Filters',
        'fields' => array(
            array(
                'key' => 'field_63f3aa4cc0bbb',
                'label' => 'Categories',
                'name' => 'categories',
                'aria-label' => '',
                'type' => 'taxonomy',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'taxonomy' => 'category',
                'add_term' => 1,
                'save_terms' => 0,
                'load_terms' => 0,
                'return_format' => 'id',
                'field_type' => 'checkbox',
                'multiple' => 0,
                'allow_null' => 0,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'block',
                    'operator' => '==',
                    'value' => 'acf/wp-api-categories',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
        'show_in_rest' => 0,
    ));
    
endif;