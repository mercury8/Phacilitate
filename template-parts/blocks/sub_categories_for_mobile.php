<?php

/**
 * Sub Categories For Mobile Block.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'sub_categories_for_mobile-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'sub_categories_for_mobile';
if (!empty($block['className'])) {
    $className .= ' ' . $block['className'];
}
if (!empty($block['align'])) {
    $className .= ' align' . $block['align'];
}

$term = get_field('select_category');
$term_name = $term->name;

if(empty($defaultPostPerPage)) {
    $defaultPostPerPage = 6;
}

?>


<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="sub_categories_for_mobile_main">
        <div class="container">
            <div class="sub_categories">
                <?php
                $term_id = $term->term_id;
                $categories = get_categories(array('parent' => $term_id));
                ?>
                <div class="sub_categories_list sub_categories_list_slider">
                    <?php foreach ($categories as $c) {  ?>
                        <div class="sub_categories_list_item"><a href="<?php echo esc_attr(esc_url(get_category_link($c->term_id))) ?>"><?php echo $c->cat_name; ?></a></div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
