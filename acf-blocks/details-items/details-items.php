<?php
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

$className = 'wp-block-group detail-category-block visible';
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

// Get the "details_items" repeater field value
$details_items_repeater = get_field('details_items');

// Check if the repeater field has values
if ($details_items_repeater) {

?>

<?php
// START BLOCK LOOP
    // Loop through each "details_items" repeater item
    foreach ($details_items_repeater as $details_item) {
        // Output the value of the "category" subfield
        $category = $details_item['category'];
        // Get the "item" repeater field value for the current "details_items" item
        $item_repeater = $details_item['item'];
?>

<!-- wp:group {"className":"detail-category-block","layout":{"type":"constrained","contentSize":"100%"}} -->
<div <?php echo $anchor; ?> class="<?php echo $className; ?>">
   <!-- wp:heading {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|20"}}},"className":"detail-category-heading"} -->
   <h2 class="wp-block-heading detail-category-heading" style="margin-bottom:var(--wp--preset--spacing--20)"><?php echo $category; ?></h2>
   <!-- /wp:heading -->

<?php

        // Check if the "item" repeater field has values
        if ($item_repeater) {
            // Loop through each "item" repeater item
?>

   
   <!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained","contentSize":"100%"}} -->
   <div class="wp-block-group alignfull" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">


<?php
// START ITEM LOOP
            foreach ($item_repeater as $item) {
                // Get the values of "question_text" and "answer_text" subfields
                $question_text = $item['question_text'];
                $answer_text = $item['answer_text'];
?>

      <!-- wp:group {"className":"detail-item","layout":{"type":"constrained","contentSize":"100%"}} -->
      <div class="wp-block-group detail-item">
         <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","right":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50"}}}"className":"detail-text","layout":{"type":"constrained","contentSize":"100%"}} -->
         <div class="wp-block-group detail-text" style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)">
            <!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|50"}}},"className":"detail-question","layout":{"type":"constrained","contentSize":"100%"}} -->
            <div class="wp-block-group detail-question" style="padding-right:var(--wp--preset--spacing--50)">
                <p style="text-transform:uppercase" style="font-size: 1rem;"><?php echo $question_text; ?></p>
                <!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|50"}}},"className":"detail-toggle","layout":{"type":"constrained","contentSize":"100%"}} -->
                <div class="wp-block-group detail-toggle" style="padding-right:var(--wp--preset--spacing--50)">
                    <div class="detail-toggle-button"></div>
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
            <!-- wp:group {"style":{"spacing":{"padding":{"right":"0"}}},"className":"detail-answer","layout":{"type":"constrained","contentSize":"100%"}} -->
            <div class="wp-block-group detail-answer" style="padding-right:0">
               <?php echo $answer_text; ?>
            </div>
            <!-- /wp:group -->
         </div>
         <!-- /wp:group -->
         <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|50","bottom":"var:preset|spacing|30","left":"var:preset|spacing|60"}}},"className":"detail-separator","layout":{"type":"constrained"}} -->
         <div class="wp-block-group detail-separator" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--50)">
            <!-- wp:separator -->
            <hr class="wp-block-separator"/>
            <!-- /wp:separator -->
         </div>
         <!-- /wp:group -->
      </div>
      <!-- /wp:group -->

<?php
// END ITEM LOOP
            }

?>

</div>
    <!-- /wp:group -->

<?php
        }
    }

?>

</div>
<!-- /wp:group -->

<?php
// END BLOCK LOOP
}
?>