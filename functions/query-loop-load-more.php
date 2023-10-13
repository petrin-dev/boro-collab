<?php
/**
 * Replace the pagination block with a "View More" button or a message.
 *
 * @param string $block_content Default pagination content.
 * @param array  $block Parsed block.
 * @return string
 */
function query_pagination_render_block($block_content, $block) {
    if ('core/query-pagination' === $block['blockName']) {
        // Check if there are more pages to load
        if (should_display_view_more_button()) {
            $block_content = sprintf(
                '<div class="view-more-container"><button class="view-more-query button">%s</button></div>',
                esc_html__('View More')
            );
        } else {
            $block_content = '<p class="no-more-posts">No more posts to load.</p>';
        }
    }

    return $block_content;
}
add_filter('render_block', 'query_pagination_render_block', 10, 2);

/**
 * Check if there's a specific reason to display the "View More" button.
 *
 * @return bool
 */
function should_display_view_more_button() {
    // Implement your specific criteria here
    // Return true to display the "View More" button if the criteria are met,
    // or false to display the "No More" message.
    // You might want to check if there are more posts available to load.
    return true; // Modify this condition based on your criteria.
}
