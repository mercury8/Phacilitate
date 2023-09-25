<?php

/**
 * Quote Text Block.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'quote-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'quote';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$text = get_field('text');
$name = get_field('name');
$designation = get_field('designation');
$image = get_field('image');
$position_image = get_field('position_image');
$desktop_pattern_image = get_field('desktop_pattern_image');
$mobile_pattern_image = get_field('mobile_pattern_image');
?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>__main quote__main image__<?php echo $position_image; ?>">    
    <div class="quote__inner" style=" background-image: url('<?php echo $desktop_pattern_image; ?>')<?php if( $mobile_pattern_image ): ?>, url('<?php echo $mobile_pattern_image; ?>')<?php endif; ?>;">
        <div class="container">
            <div class="quote__wrapper">
                <div class="quote__left">
                    <?php if( $text ): ?>
                        <div class="quote">
                            <svg width="77" height="54" viewBox="0 0 77 54" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M71.5 54H55L44 32.4V0H77V32.4H60.5L71.5 54ZM27.5 54H11L0 32.4V0H33V32.4H16.5L27.5 54Z" fill="#95C11E"/>
                            </svg>
                            <span><?php echo $text; ?></span>
                        </div>
                    <?php endif; ?>
                    <?php if( $name ): ?><div class="name"><?php echo $name; ?></div><?php endif; ?>
                    <?php if( $designation ): ?><div class="designation"><?php echo $designation; ?></div><?php endif; ?>
                </div>
                <div class="quote__right">                    
                    <?php if( $image ): ?><div class="image"><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" /></div><?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>