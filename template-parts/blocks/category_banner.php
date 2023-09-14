<?php
/**
 * Category Banner Block.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'category_banner-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'category_banner';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}


$show_category_banner = get_field('show_category_banner','option');	
$term = get_queried_object();
$term_name = $term->name;
$parent_id = $term->parent;
$parent  = get_term_by(  'id', $term->parent, get_query_var( 'taxonomy' ) );
$quantityTermName = $parent ->name;



?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div class="container">
        <div class="category_banner_inner">
            <div class="parent_category"><h6 class="heading h6"><?php echo $quantityTermName; ?><?php echo "&nbsp;/&nbsp;"; ?></h6></div>
            <div class="category_banner_heading">
                <h1 class="heading h2"><?php echo $term_name; ?></h1>
            </div>
		</div>
    </div>
</div>
