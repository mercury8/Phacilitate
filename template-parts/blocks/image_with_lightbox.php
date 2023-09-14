<?php

/**
 * Image With Lightbox Block.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'image_with_lightbox-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'image_with_lightbox';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$image = get_field('image');
?>
<?php if($image): ?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">    
    <div class="image_with_lightbox__inner">
        <div class="container">
            <div class="image_with_lightbox__wrapper">
                <div class="image" style="background-image: url(<?php echo $image['url']; ?>);">
                    <a href="<?php echo $image['url']; ?>" data-lity><img src="<?php echo get_template_directory_uri(); ?>/dist/images/692-351.png" alt="<?php echo $image['alt']; ?>" /></a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>