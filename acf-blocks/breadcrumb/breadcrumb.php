<?php 

// Get the current page ID
$current_page_id = get_the_ID();
// Get the parent page ID
$parent_page_id = wp_get_post_parent_id($current_page_id);

// Check if the current page has a parent
if ($parent_page_id) {
    // Get the parent page title
    $parent_page_title = get_the_title($parent_page_id);
    
    // Get the parent page relative URL
    $parent_page_url = get_permalink($parent_page_id);
} else {
    $parent_page_title = 'Home';
    $parent_page_url = '/';
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

?>
<div class="breadcrumb-wrap">
    <div <?php echo $anchor; ?> class="<?php echo $className; ?>">
		<a href="<?php echo $parent_page_url; ?>"><?php echo $parent_page_title; ?></a>
	</div>
</div>