<?php

$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

$className = 'wp-block-group multi-gallery-wrap';
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

// Get the galleries repeater field values
$galleries = get_field('galleries');

if ($galleries) :
?>

    <!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"constrained"}} -->
    <div <?php echo $anchor; ?> class="<?php echo $className; ?>">
    <div style="height:var(--wp--preset--spacing--20)" aria-hidden="true" class="wp-block-spacer"></div>
    <!-- /wp:spacer -->

    <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"blockGap":"var:preset|spacing|20"}}} -->
    <div class="wp-block-buttons multi-gallery-toggle-wrap"
    <?php if (count($galleries) < 2) { echo "style='display: none;'"; } ?>
    >

        <?php
        foreach ($galleries as $gallery):
        $label = $gallery['label'];
        ?>

        <!-- wp:button {"style":{"border":{"width":"1px"}},"className":"is-style-hover-dark"} -->
        <div class="wp-block-button multi-gallery-toggle"><a class="wp-block-button__link wp-element-button" style="border-width:1px">
            <?echo $label; ?>
        </a></div>
        <!-- /wp:button -->

        <?php 
        endforeach; 
        ?>

    </div>
    <!-- /wp:buttons -->

    <!-- wp:group {"layout":{"type":"constrained"}} -->
    <div class="wp-block-group multi-gallery-main">


    <?php
    foreach ($galleries as $gallery):
        // Get the images gallery value
        $images = $gallery['images'];

        if ($images) :
    ?>

    <div class="single-gallery-wrap">
    <?php
    foreach ($images as $image) :
    // Get the image URL and alt text
    $image_url = $image['url'];
    $image_alt = $image['alt'];

    // Generate the link to the larger image
    $large_image_url = $image['sizes']['large']; // Change 'large' to the desired image size
    ?>

    <a download="<?php echo $large_image_url; ?>" target="_blank">
        <img src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>" loading="lazy">
    </a>

    <?php
    endforeach;
    ?>
    </div>
    <?php
    else :
    ?>
    <p>No images found.</p>
    <?php
    endif;
endforeach;
else :
?>
<p>No galleries found.</p>
<?php
endif;
?>

</div>
<!-- /wp:group --></div>
<!-- /wp:group -->
