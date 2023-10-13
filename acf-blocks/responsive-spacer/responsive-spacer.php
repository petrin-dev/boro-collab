<?php

$desktop = get_field('desktop_height');
$stack_point = get_field('responsive_stack_width');
$responsive = get_field('responsive_height');

function generateRandomClassName($length = 10) {
    $characters = 'abcdefghijklmnopqrstuvwxyz';
    $className = '';
    
    for ($i = 0; $i < $length; $i++) {
        $randomIndex = rand(0, strlen($characters) - 1);
        $className .= $characters[$randomIndex];
    }
    
    return $className;
}

// Example usage:
$randomClass = generateRandomClassName(10);

?>

<!-- wp:spacer -->
<div style="height: var(--wp--custom--mobile-stack)" class="wp-block-spacer <?php echo $randomClass; ?>"></div>
<!-- /wp:spacer -->

<style>
    @media (max-width: var(--wp--custom--mobile-stack)) {
        <?php echo '.' . $randomClass; ?> {
            height: <?php echo $responsive . 'px'; ?> !important;
        }
    }
    @media (min-width: var(--wp--custom--mobile-stack)) {
        <?php echo '.' . $randomClass; ?> {
            background: green !important;
        }
    }
</style>