<?php

/**
 * Left Data With Right 5 Images Block.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'left_data_with_right_5images-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'left_data_with_right_5images';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$heading = get_field('heading');
$tagline = get_field('tagline');
$short_description = get_field('short_description');
$button = get_field('button');
$image = get_field('image');
$desktop_pattern_image = get_field('desktop_pattern_image');
$mobile_pattern_image = get_field('mobile_pattern_image');
$enable_background = get_field('enable_background');
$for_mobile = get_field('for_mobile_set_image_then_text');
?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?> <?php if($enable_background == 1): ?>enable_background<?php endif; ?> <?php if($for_mobile == 1): ?>mobile_image_first<?php endif; ?>">    
    <div class="left_data_with_right_5images__inner d-flex align-items-center" style=" background-image: url('<?php echo $desktop_pattern_image; ?>')<?php if( $mobile_pattern_image ): ?>, url('<?php echo $mobile_pattern_image; ?>')<?php endif; ?>;">
        <div class="container">
            <div class="left_data_with_right_5images__container d-flex align-items-center">
                <div class="left_data_with_right_5images__left">
                    <?php if( $tagline ): ?><div class="tagline desktop"><h6><?php echo $tagline; ?></h6></div><?php endif; ?>
                    <h2 class="heading h1 desktop"><?php echo $heading; ?></h2>
                    <?php if( $short_description ): ?><div class="description"><?php echo $short_description; ?></div><?php endif; ?>
                    <?php if($button && $button['title']): ?>
                        <div class="btn_box"><a href="<?php echo $button['url']; ?>" class="btn" <?php echo ($button['target'])?'target="_blank"':''; ?> ><?php echo $button['title']; ?></a>	</div>
                    <?php endif; ?>
                </div>
                <div class="left_data_with_right_5images__right"> 
                    <?php if( $tagline ): ?><div class="tagline mobile"><h6><?php echo $tagline; ?></h6></div><?php endif; ?>
                    <h2 class="heading h1 mobile"><?php echo $heading; ?></h2>                   
                    <div class="image"><img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" /></div>
                </div>
            </div>
        </div>
    </div>
</div>