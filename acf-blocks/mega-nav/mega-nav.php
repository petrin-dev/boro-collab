<?php

$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

$className = 'meganav';
// Create class attribute allowing for custom "className" and "align" values.
if ( ! empty( $block['className'] ) ) {
    $className .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $className .= ' align' . $block['align'];
}

// Set the background color classnames
if ( ! empty( $block['backgroundColor'] ) ) {
    $className .= ' has-background';
    $className .= ' has-' . $block['backgroundColor'] . '-background-color';
}

// Set the text color classnames
if ( ! empty( $block['textColor'] ) ) {
    $className .= ' has-text-color';
    $className .= ' has-' . $block['textColor'] . '-color';
}

?>
<div <?php echo $anchor; ?> class="<?php echo $className; ?>">
    <? 
         // Check rows exists.
        if( have_rows('navigation_item','option') ):

            // Loop through rows.
            while( have_rows('navigation_item','option') ) : the_row();

                // Load sub field value.
                $nav_item_text = get_sub_field('navigation_item_text','option');
                $nav_item_page = get_sub_field('navigation_item_page','option');
                $nav_item_classes = get_sub_field('css_class','option');
                $has_children = get_sub_field('has_children','option');
                echo "<div class='meganav-parent " . esc_attr($nav_item_classes) . "'>";
                echo "<a href=" . esc_url($nav_item_page) . ">" . $nav_item_text . "</a>";
                if( $has_children ):

                    if( have_rows('navigation_submenu','option') ) :

                      while( have_rows('navigation_submenu','option') ) : the_row();
                            $meganav_title = get_sub_field('meganav_title','option');
                            $meganav_description = get_sub_field('meganav_description','option');
                            $meganav_button_text = get_sub_field('meganav_button_text','option');
                            $meganav_button_link = get_sub_field('meganav_button_link','option');
                            echo "<div class='meganav-subnav-toggle'></div>";
                            echo "<div class='meganav-subnav'>";
                                echo "<div class='meganav-subnav-inside'>";
                                echo "<div class='meganav-content'>";
                                if ($meganav_title) {
                                    echo "<div class='meganav-content-text'>";
                                    echo "<p class='meganav-content-title'>" . $meganav_title . "</p>";
                                    echo "<p class='meganav-content-description'>" . $meganav_description . "</p>";
                                    echo "</div>";
                                    echo "<div class='wp-block-buttons is-style-hover-dark'>";
                                    echo "<div class='wp-block-button is-style-hover-dark meganav-button'>";
                                    echo "<a class='wp-block-button__link wp-element-button' title='Visit'" . $meganav_title . "' href='" . esc_url($meganav_button_link) . " '>";
                                    echo "$meganav_button_text";
                                    echo "</a>";
                                    echo "</div>";
                                    echo "</div>";
                                }
                                    echo "</div>";
                                    echo "<div class='meganav-submenu'>";
                                        if( have_rows('child_menu_item','option') ) :
                                            while( have_rows('child_menu_item','option') ) : the_row();
                                                $child_menu_item_text = get_sub_field('child_menu_item_text','option');
                                                $child_menu_item_page = get_sub_field('child_menu_item_page','option');
                                                $has_grandchildren = get_sub_field('has_children','option');
                                                $grandchild_menu_item = get_sub_field('grandchild_menu_item','option');
                                                echo "<a href='" . esc_url($child_menu_item_page) . " '>" . $child_menu_item_text . "</a>";

                                                    if( have_rows('grandchild_menu_item','option')) :  
                                                        echo "<div class='meganav-grandchildren'>";
                                                        
                                                        while( have_rows('grandchild_menu_item','option') ) : the_row();
                                                            $grandchild_menu_item_text = get_sub_field('grandchild_menu_item_text','option');
                                                            $grandchild_menu_item_page = get_sub_field('grandchild_menu_item_page','option');
                                                            $indented = get_sub_field('indented','option');
                                                            echo "<a class='meganav-grandchild";
                                                            if( $indented ) :  
                                                                echo " indented-grandchild";
                                                            endif;
                                                            echo "' href='" . $grandchild_menu_item_page . "'>";
                                                            echo $grandchild_menu_item_text;
                                                            echo "</a>";
                                                        endwhile;
                                                        
                                                        echo "</div>";
                                                    endif;

                                            endwhile;
                                        endif;
                                    echo "</div>";
                                echo "</div>";
                            echo "</div>";

                        endwhile;

                    endif;
                    
                endif;
                echo "</div>";

            endwhile;

        endif;

    ?>
</div>