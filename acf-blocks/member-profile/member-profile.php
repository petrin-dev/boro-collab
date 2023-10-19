<?php

$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

$className = 'expanding-bio-block';
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

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"className":"expanding-bio-container","layout":{"type":"constrained"}} -->
<div <?php echo $anchor; ?> class="<?php echo $className; ?>">
<div class="wp-block-group expanding-bio-container">

<?php echo the_field('biography_text'); ?>

</div>
<!-- /wp:group -->

<!-- wp:buttons -->
<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-plus-button expanding-bio-toggle"} -->
<div class="wp-block-button expanding-bio-toggle"><a class="wp-block-button__link wp-element-button">Read More</a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons -->
</div>