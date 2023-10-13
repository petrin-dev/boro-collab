<?php 

// Check if the block style metadata exists
if (isset($block['style'])) {
    $block_style = $block['style'];

    // Output the block style information using print_r
    echo 'Block Style Information:';
    echo '<pre>';
    print_r($block_style);
    echo '</pre>';
} else {
    echo 'No Block Style metadata found.';
}

$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

$className = 'breadcrumb-link';
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

$default_blocks = array(
    array('core/heading', array(
		'level' => 1,
		'placeholder' => 'This is a placeholder heading',
        'className'   => 'hero-heading'
	))
);

$allowed_blocks = ['core/heading', 'core/paragraph', 'acf/breadcrumb'];

?>
<div class="nested-wrap">
    <InnerBlocks
        template="<?php echo esc_attr( wp_json_encode( $default_blocks ) ); ?>"
        allowedBlocks="<?php echo esc_attr( wp_json_encode( $allowed_blocks ) ); ?>"
        className="hero-inner-blocks"
    />
</div>