<?php

$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

$className = 'flex-divider';
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

<div <?php echo $anchor; ?> class="<?php echo $className; ?>"></div>