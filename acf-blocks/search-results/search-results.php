<?php

$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

$className = 'search-results';
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
<?php
$s=get_search_query();
$args = array(
                's' =>$s
            );
    // The Query
$the_query = new WP_Query( $args );
if ( $the_query->have_posts() ) {
        while ( $the_query->have_posts() ) {
           $the_query->the_post();

?>


<div>
<h2 style="font-weight: 700;"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
<!-- wp:spacer {"className":"desktop-only"} -->
<div style="height:0.5rem" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->
<div class="search-excerpt"><?php the_excerpt(); ?></div>
</div>
<!-- wp:spacer {"className":"desktop-only"} -->
<div style="height:1rem" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->



                 <?php
        }
    }else{
?>
        <h2>Nothing Found</h2>
        <div class="alert alert-info">
          <p>Sorry, but nothing matched your search criteria. Please try again with some different keywords.</p>
        </div>
<?php } ?>
    </div>