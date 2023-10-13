<ul class="category-list" style="    display: flex;
    flex-wrap: wrap;
    padding: 0;
    list-style-type: none;
    gap: 2rem;">
  <li class="category-filter active" id="reset-filters" role="button">All</li>
<?php
// Get the selected categories from the ACF field
$categories = get_field('categories');

// Get the category objects for the selected categories
$category_objects = get_terms(array(
  'taxonomy' => 'category',
  'include' => $categories,
  'hide_empty' => false,
  'number' => 100, // Increase this number if you have more than 100 categories
));

// Loop through each category object and display its name and ID
foreach ($category_objects as $category) {
  $category_id = $category->term_id;
  $category_name = $category->name;
  echo '<li class="category-filter" role="button" title="' . $category_id . '">' . $category_name . ' (' . $category_id . ')</li>';
}
?>
</ul>