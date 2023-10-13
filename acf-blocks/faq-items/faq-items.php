<?php

$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

$className = 'faq-section';
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

// Get the "faq_items" repeater field value
$faq_items_repeater = get_field('faq_items');

// Check if the repeater field has values
if ($faq_items_repeater) {

?>

<div <?php echo $anchor; ?> class="<?php echo $className; ?>">

<!-- Category Filter-->
<div class="wp-block-group faq-category-container is-nowrap is-layout-flex wp-container-19 wp-block-group-is-layout-flex">
    <p class="has-heading-3-font-size faq-category-active" style="text-transform:uppercase" id="faq-show-all">All</p>
    <?php
        // Loop through each "faq_items" repeater item
        foreach ($faq_items_repeater as $faq_item) {
            // Output the value of the "category" subfield
            $category = $faq_item['category'];
            echo '<p class="has-heading-3-font-size" style="text-transform:uppercase">' . $category . '</p>';
        }
    ?>
</div>

<!-- wp:spacer {"height":"4rem","className":"desktop-only"} -->
<div style="height:4rem" aria-hidden="true" class="wp-block-spacer desktop-only"></div>
<!-- /wp:spacer -->

<?php
// START BLOCK LOOP
    // Loop through each "faq_items" repeater item
    foreach ($faq_items_repeater as $faq_item) {
        // Output the value of the "category" subfield
        $category = $faq_item['category'];
        // Get the "item" repeater field value for the current "faq_items" item
        $item_repeater = $faq_item['item'];
?>

<!-- wp:group {"className":"faq-category-block","layout":{"type":"constrained","contentSize":"100%"}} -->
<div class="wp-block-group faq-category-block visible">
   <!-- wp:heading {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|20"}}},"className":"faq-category-heading"} -->
   <h2 class="wp-block-heading faq-category-heading" style="margin-bottom:var(--wp--preset--spacing--20)"><?php echo $category; ?></h2>
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

      <!-- wp:group {"className":"faq-item","layout":{"type":"constrained","contentSize":"100%"}} -->
      <div class="wp-block-group faq-item">
         <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","right":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50"}}},"className":"faq-text","layout":{"type":"constrained","contentSize":"100%"}} -->
         <div class="wp-block-group faq-text" style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)">
            <!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|50"}}},"className":"faq-question","layout":{"type":"constrained","contentSize":"100%"}} -->
            <div class="wp-block-group faq-question" style="padding-right:var(--wp--preset--spacing--50)">
                <p style="text-transform:uppercase" style="font-size: 1rem;"><?php echo $question_text; ?></p>
                <!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|50"}}},"className":"faq-toggle","layout":{"type":"constrained","contentSize":"100%"}} -->
                <div class="wp-block-group faq-toggle" style="padding-right:var(--wp--preset--spacing--50)">
                    <div class="faq-toggle-button"></div>
                </div>
                <!-- /wp:group -->
            </div>
            <!-- /wp:group -->
            <!-- wp:group {"style":{"spacing":{"padding":{"right":"0"}}},"className":"faq-answer","layout":{"type":"constrained","contentSize":"100%"}} -->
            <div class="wp-block-group faq-answer" style="padding-right:0">
               <?php echo $answer_text; ?>
            </div>
            <!-- /wp:group -->
         </div>
         <!-- /wp:group -->
         <!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","right":"var:preset|spacing|50","bottom":"var:preset|spacing|30","left":"var:preset|spacing|60"}}},"className":"faq-separator","layout":{"type":"constrained"}} -->
         <div class="wp-block-group faq-separator" style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--50)">
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

</div>